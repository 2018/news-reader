<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Filters\UserFilter as UserFilter;
use App\Http\Controllers\Traits\Show;
use App\Http\Controllers\Traits\Edit;
use App\Http\Controllers\Traits\Store;
use App\Http\Controllers\Traits\Create;
use App\Http\Controllers\Traits\Update;
use App\Http\Controllers\Traits\Destroy;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

class UserController extends AdminController
{
    use Show,
        Edit,
        Store,
        Create,
        Update,
        Destroy;

    protected $model;

    /**
     * UserController constructor.
     *
     * @param User $model Users model
     */
    public function __construct(User $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserFilter $filters filters
     *
     * @return Factory|Application|View
     */
    public function index(UserFilter $filters)
    {
        return view($this->model->getTable() . '.index', ['data' => $this->model->collectionItems($filters)]);
    }
}
