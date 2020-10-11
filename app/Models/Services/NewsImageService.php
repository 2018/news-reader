<?php

namespace App\Models\Services;

use Log;
use Intervention\Image\ImageManagerStatic as Image;

class NewsImageService
{
    /**
     * @var array
     */
    private $url = '';

    /**
     * @var string
     */
    private $fileName = '';

    /**
     * ImageService constructor.
     *
     * @param string $url Image url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Save image to storage.
     *
     * @return void
     */
    public function save()
    {
        $this->fileName = pathinfo($this->url, PATHINFO_FILENAME);
        Image::cache(function($image) {
            $filePath = public_path("images/{$this->fileName}");
            $image->make($this->url)
                ->resize(config('constants.IMAGE_WIDTH'), config('constants.IMAGE_HEIGHT'))
                ->save($filePath);
        });
    }

    /**
     * Return base file name
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->fileName;
    }
}
