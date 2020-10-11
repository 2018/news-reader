<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

trait Store
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request Request object
     *
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->model->saveEntity($request);
    }
}
