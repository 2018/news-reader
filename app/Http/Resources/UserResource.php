<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request|null  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        unset($request);
        return [
            'id' => $this->getAttribute('id'),
            'resource' => $this->resource,
            'name' => $this->getAttribute('name'),
            'email' => $this->getAttribute('email'),
            'ldap' => ($this->getAttribute('ldap') ? 'True' : 'False'),
        ];
    }
}
