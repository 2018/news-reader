<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

trait Create
{

    /**
     * Display create page
     *
     * @return Factory|Application|View
     */
    public function create()
    {
        return view($this->model->getTable() . '.create', ['data' => $this->model->createItem()]);
    }
}
