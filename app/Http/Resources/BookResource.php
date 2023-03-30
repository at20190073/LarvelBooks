<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resource\UserResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'book';
    public function toArray($request)
    {
        return [
        'id' => $this->resource->id,
        'title' => $this->resource->title,
        'author_name' => $this->resource->author,
        'price' => $this->resource->price,
        'description' => $this->resource->description,
        'mark'=>$this->resource->mark,
        'user_id' =>$this->resource->user_id,
        'genre_id'=>$this->resource->genre_id,

    ];
        
    }
}
