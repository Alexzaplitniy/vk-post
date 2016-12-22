<?php
namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user', 'attaches'];

    public function transform(Post $post)
    {
        return [
            'title' => $post->title,
            'body' => $post->body,
            'created_at' => $post->created_at->toDateTimeString(),
            'created_at_human' => $post->created_at->diffForHumans(),
            'updated_at' => $post->updated_at->toDateTimeString(),
            'updated_at_human' => $post->updated_at->diffForHumans(),
        ];
    }

    public function includeUser(Post $post) {
    	return $this->item($post->user, new UserTransformer);
    }
    
    public function includeAttaches(Post $post) {
    	return $this->collection($post->attaches, new AttachTransformer);
    }
}
