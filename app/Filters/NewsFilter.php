<?php

namespace App\Filters;

use App\Models\Services\QueryService;
use \Illuminate\Database\Eloquent\Builder;
use Kyslik\LaravelFilterable\Generic\Filter;

class NewsFilter extends Filter
{

    /**
     * Filter mapping - map method to filter parameters
     *
     * @return array
     */
    public function filterMap(): array
    {
        return [
            'title' => ['title'],
            'author' => ['author'],
            'description' => ['description'],
            'pubDate' => ['pub_date'],
        ];
    }

    /**
     * Filter result by title
     *
     * @param string|null $val title
     *
     * @return Builder
     */
    public function title($val = null): Builder
    {
        return $this->builder->where('title', 'like', '%'.$val.'%');
    }

    /**
     * Filter result by author
     *
     * @param string|null $val author
     *
     * @return Builder
     */
    public function author($val = null): Builder
    {
        return $this->builder->where('author', 'like', '%'.$val.'%');
    }

    /**
     * Filter result by description
     *
     * @param string|null $val description
     *
     * @return Builder
     */
    public function description($val = null): Builder
    {
        return $this->builder->where('description', 'like', '%'.$val.'%');
    }

    /**
     * Filter result by publication date
     *
     * @param string|null $val publication date
     *
     * @return Builder
     */
    public function pubDate($val = null): Builder
    {
        return QueryService::dateTime($this->builder, 'pub_date', $val);
    }
}