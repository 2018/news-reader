<?php
namespace App\Http\Controllers;

use App\Filters\NewsFilter as NewsFilter;
use App\Http\Controllers\Traits\Destroy;
use App\Http\Controllers\Traits\Show;
use App\Models\NewsItem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

class NewsController extends AdminController
{
    use Show,
        Destroy;

    protected $model;

    /**
     * NewsController constructor.
     *
     * @param NewsItem $model NewsItem model
     */
    public function __construct(NewsItem $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @param NewsFilter $filters filters
     *
     * @return Factory|Application|View
     */
    public function index(NewsFilter $filters)
    {
        return view($this->model->getTable() . '.index', ['data' => $this->model->collectionItems($filters)]);
    }

    /**
     * Fetch news from RSS feed
     */
    public function fetch()
    {
        return $this->model->updateNewsFromRssFeed();
    }
}
