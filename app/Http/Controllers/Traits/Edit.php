<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

trait Edit
{

    /**
     * Display edit page
     *
     * @param integer $id entity id
     *
     * @return Factory|Application|View
     */
    public function edit($id)
    {
        return view($this->model->getTable() . '.edit', ['data' => $this->model->editItem($id)]);
    }
}
