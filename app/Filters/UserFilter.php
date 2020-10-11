<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Kyslik\LaravelFilterable\Generic\Filter;

class UserFilter extends Filter
{

    /**
     * Filter mapping - map method to filter parameters
     *
     * @return array
     */
    public function filterMap(): array
    {
        return [
            'name' => ['name'],
            'email' => ['email'],
        ];
    }

    /**
     * Filter result by name
     *
     * @param string|null $name name
     *
     * @return Builder
     */
    public function name($name = null): Builder
    {
        return $this->builder->where('name', 'like', '%'.$name.'%');
    }

    /**
     * Filter result by email
     *
     * @param string|null $email email
     *
     * @return Builder
     */
    public function email($email = null): Builder
    {
        return $this->builder->where('email', 'like', '%'.$email.'%');
    }
}