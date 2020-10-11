<?php

namespace App\Models;

use FeedReader;
use App\Models\Traits\ShowEntity;
use App\Models\Traits\SaveEntity;
use App\Models\Traits\DestroyEntity;
use App\Models\Services\RssFeedService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Kyslik\LaravelFilterable\Filterable;
use App\Http\Resources\NewsListResource;
use App\Models\Services\NewsImportService;
use App\Filters\NewsFilter;

class NewsItem extends BaseModel
{
    use ShowEntity,
        SaveEntity,
        DestroyEntity,
        Filterable;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * Validating rules
     *
     * @var array
     */
    protected $rules = [
        'uuid'  =>  'required',
        'title'  =>  'required|unique:news|min:3|max:150',
        'description' => 'max:255',
        'author'  =>  'max:150',
        'link'  =>  'required|max:100',
        'image'  =>  'max:100',
        'pub_date'  =>  'required|date_format:Y-m-d H:i:s',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'author',
        'link',
        'image',
        'pub_date',
    ];

    /**
     * Get all of the models from the database.
     *
     * @param NewsFilter $filters filters
     *
     * @return AnonymousResourceCollection
     */
    public function collectionItems(NewsFilter $filters)
    {
        $items = self::filter($filters)->orderByDesc('pub_date')->get();
        return NewsListResource::collection($items);
    }

    /**
     * Update news from feed and redirect to news page
     */
    public function updateNewsFromRssFeed()
    {
        $feed = new RssFeedService();
        $feed->setCount(15);
        $feedData = $feed->parse();
        $tableSeeder = new NewsImportService($feedData);
        $tableSeeder->run();
        return redirect(route($this->getTable(). '.index'))
            ->with('status', _i('The news has been successfully updated.'));
    }
}
