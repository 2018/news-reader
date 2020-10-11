<?php

namespace App\Models\Traits;

use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Validator;
use Illuminate\Http\Request;

trait SaveEntity
{
    /**
     * Saves entity
     *
     * @param Request     $request input params
     * @param null|string $id      entity id
     *
     * @return Application|RedirectResponse|Redirector
     *
     * @throws Exception
     */
    public function saveEntity(Request $request, $id = null)
    {
        $params = $request->all();
        $model = $this;
        if (!is_null($id)) {
            $model = $this->findOrFail($id);
        }
        $model->fill($params);
        $model->saveOrFail();
        return redirect(route($this->getTable(). '.edit', ['id' => $model->id]))->with('status', 'Record has been saved');
    }
}