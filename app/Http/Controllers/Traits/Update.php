<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait Update
{
    /**
     * Update the specified resource in storage.
     *
     * @param Request     $request input params
     * @param null|string $id      entity id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return $this->model->saveEntity($request, $id);
    }
}
