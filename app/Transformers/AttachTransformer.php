<?php
namespace App\Transformers;

use App\Models\Attach;
use League\Fractal\TransformerAbstract;

/**
 * Class AttachTransformer
 * @package App\Transformers
 */
class AttachTransformer extends TransformerAbstract
{
    public function transform(Attach $attach)
    {
        return [
            'name' => $attach->name,
            'path' => $attach->path,
            'width' => $attach->width,
            'height' => $attach->height,
            'created_at_human' => $attach->created_at->diffForHumans(),
            'updated_at_human' => $attach->updated_at->diffForHumans()
        ];
    }
}
