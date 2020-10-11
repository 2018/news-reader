<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

trait Show
{
    /**
     * Display the specified resource.
     *
     * @param int $id param id
     *
     * @return Factory|Application|View
     */
    public function show($id)
    {
        return view($this->model->getTable() . '.show', ['model' => $this->model->find($id)]);
    }
}
