<?php

namespace App\Models\Services;

use Log;
use App\Models\NewsItem;

class NewsImportService
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * NewsImportService constructor.
     *
     * @param array $param News input array
     */
    public function __construct($param) {
        $this->data = $param;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = NewsItem::class;
        foreach ($this->data as $aData) {
            $model = new $class();
            if (!is_null($model::where('uuid', $aData['uuid'])->first())) {
                continue;
            }
            if ($link = array_get($aData, 'image')) {
                $imageService = new NewsImageService($link);
                $imageService->save();
                array_set($aData, 'image', $imageService->getImageName());
            }
            $model->fill($aData);
            if (!$model->validate()) {
                Log::error('NewsImportService', $model->getErrors());
            } else {
                $model->save();
            }
        }
    }
}
