<?php

namespace App\Models\Traits;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

trait DestroyEntity
{

    /**
     * Destroy entity
     *
     * @param string $id entity id
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function destroyEntity($id)
    {
        $model = $this->findOrFail($id);
        DB::transaction(
            function () use ($model) {
                $model->delete();
            }
        );
        return redirect(route($this->getTable(). '.index'))->with('status', 'Record has been deleted');
    }
}