<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class NewsItemResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request Request
     *
     * @return array
     */
    public function toArray($request)
    {
        unset($request);
        return [
            'id' => $this->getAttribute('id'),
            'uuid' => $this->getAttribute('uuid'),
            'resource' => $this->resource,
            'title' => $this->getAttribute('title'),
            'description' => $this->getAttribute('description'),
            'author' => $this->getAttribute('author'),
            'link' => $this->getAttribute('link'),
            'image' => $this->getAttribute('image'),
            'pub_date' => $this->getAttribute('pub_date'),
        ];
    }
}
