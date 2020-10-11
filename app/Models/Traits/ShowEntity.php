<?php

namespace App\Models\Traits;

trait ShowEntity
{
    /**
     * Show entity by id
     *
     * @param string $id entity id
     *
     * @return array model data
     */
    public function showEntity($id)
    {
        return $this->findOrFail($id);
    }
}