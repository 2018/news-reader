<?php

namespace App\Models;

use Validator;
use OwenIt\Auditing\Auditable;
use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Contracts\UserResolver;

class BaseModel extends Model implements AuditableContract, UserResolver
{
    use Auditable,
        ValidatingTrait;

    /**
     * Standalone validation errors
     *
     * @var array
     */
    protected $errors;

    /**
     * Available model references
     *
     * @var array
     */
    protected $references = [];

    /**
     * Disable timestamps
     *
     * @var array
     */
    public $timestamps = false;

    /**
     * Get all of the models from the database.
     *
     * @return Collection|static[]
     */
    public function listItems()
    {
        return self::all();
    }

    /**
     * Standalone model validation
     *
     * @return bool
     */
    public function validate()
    {
        // make a new validator object
        $this->updateRulesUniques();
        $validator = Validator::make($this->getAttributes(), $this->getRules());
        if ($validator->fails()) {
            // set errors and return false
            $errors = [];
            if (isset($this->id)) {
                $errors['id'] = $this->id;
            }
            $messages = $validator->errors()->messages();
            $errors['attributes'] = array_only($this->getAttributes(), array_keys($messages));
            $errors['errors'] = $messages;
            $this->errors = $errors;
            return false;
        }
        return true;
    }

    /**
     * Standalone validation errors getter
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Resolver stub
     */
    public static function resolve()
    {
        // TODO: Implement resolve() method.
    }
}