<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Response;

trait Destroy
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id param id
     *
     * @return Response
     */
    public function destroy($id)
    {
        return $this->model->destroyEntity($id);
    }

}
