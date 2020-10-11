<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

trait Index
{

    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        return view($this->model->getTable() . '.index', ['data' => $this->model->collectionItems()]);
    }
}
