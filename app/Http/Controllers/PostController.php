<?php

namespace App\Http\Controllers;

use App\Models\Attach;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Transformers\PostTransformer;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Image;
use Response;
use Storage;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    public function index(Request $request)
    {
    	if (Cache::has('postList')) {
            return Cache::get('postList');
    	} else {
            $post = Post::where('user_id', $request->user()->id)->get();
            $fractal = fractal()
                ->collection($post)
                ->parseIncludes(['user.userProfile', 'attaches', ])
                ->transformWith(new PostTransformer)
                ->toArray();

            Cache::put('postList', $fractal, 1);

            return $fractal;
        }
    }

    /**
     * @param PostRequest $request
     * @return array
     */
    public function add(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user()->associate($request->user());
        $post->save();

        foreach (Attach::find($request->attach) as $attach) {
            $post->attaches()->save($attach);
        }

        return fractal()
            ->item($post)
            ->parseIncludes(['user', 'attaches'])
            ->transformWith(new PostTransformer)
            ->toArray();
    }

    public function fileUpload(Request $request)
    {
        $photoIds = [];
        //dd($request->allFiles());
        if ( !empty($request->file('file')) ) {
            foreach ($request->file('file') as $file) {
                /** @var UploadedFile $file */
                list($width, $height) = getimagesize($file);
                Storage::put('uploads/images/' . $file->getClientOriginalName(), file_get_contents($file));

                // make photo to a instagram
                $img = Image::make($file);
                $img->fit(640, 640);
                $payload = (string) $img->encode();
                Storage::put('uploads/images/' . 'instagram_' . $file->getClientOriginalName(), $payload);

                $image = new Attach;
                $image->name = $file->getClientOriginalName();
                $image->instagram_name = 'instagram_' . $file->getClientOriginalName();
                $image->user()->associate($request->user());
                $image->width = $width;
                $image->height = $height;
                $image->save();

                $photoIds[] = $image->id;

                unset($width, $height);
            }

            return Response::json(['success' => true, 'data' => $photoIds]);
        }
        return Response::json(['success' => false, 'data' => $photoIds]);

    }

}
