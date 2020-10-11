<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class NewsListResource extends Resource
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
            'title' => $this->getAttribute('title'),
            'author' => $this->getAttribute('author'),
            'pub_date' => $this->getAttribute('pub_date'),
            'show_button' =>  route($this->getTable() . '.show', $this->getAttribute('id')),
            'delete_button' => [route($this->getTable() . '.destroy', $this->getAttribute('id'))],
        ];
    }
}
