<?php

namespace App\Models;

use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Notifications\Notifiable;
use Kyslik\LaravelFilterable\Filterable;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserListResource;
use App\Filters\UserFilter as UserFilter;
use App\Models\Traits\ShowEntity;
use App\Models\Traits\SaveEntity;
use App\Models\Traits\DestroyEntity;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends BaseModel implements AuthenticatableContract
{
    use Notifiable,
        ShowEntity,
        SaveEntity,
        DestroyEntity,
        Authenticatable,
        Filterable;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Validating rules
     *
     * @var array
     */
    protected $rules = [
        'name'  =>  'required|unique:users|min:1|max:35',
        'email' => 'email|max:255|unique:users',
        'password' => 'required|min:1|max:255',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Hash password before save
     *
     * @param string $pass password
     *
     * @return void
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
        if (is_null($pass)) {
            unset($this->attributes['password']);
        }
    }

    /**
     * Get all of the models from the database.
     *
     * @param UserFilter $filters filters
     *
     * @return AnonymousResourceCollection
     */
    public function collectionItems(UserFilter $filters)
    {
        $items = self::filter($filters)->get();
        return UserListResource::collection($items);
    }

    /**
     * Return resource item data
     *
     * @param string $id id
     *
     * @return array
     */
    public function editItem(string $id)
    {
        $res = new UserResource($this->find($id));
        return $res->toArray(0);
    }

    /**
     * Return resource item data
     *
     * @return array
     */
    public function createItem()
    {
        $res = new UserResource(new self());
        return $res->toArray(0);
    }

    public static function resolve()
    {
        // TODO: Implement resolve() method.
    }
}
