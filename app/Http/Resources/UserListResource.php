<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class UserListResource extends Resource
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
        $aParams = $this->getAttribute('id') === 1 ? 'disabled="disabled"' : '';
        return [
            'name' => $this->getAttribute('name'),
            'email' => $this->getAttribute('email'),
            'ldap' => ($this->getAttribute('ldap') ? 'True' : 'False'),
            'edit_button' =>  route($this->getTable() . '.edit', $this->getAttribute('id')),
            'delete_button' => [route($this->getTable() . '.destroy', $this->getAttribute('id')), $aParams],
        ];
    }
}
