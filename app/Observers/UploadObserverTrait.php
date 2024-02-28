<?php

namespace App\Observers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\SliderItem;
use Intervention\Image\Facades\Image;

trait UploadObserverTrait
{
    /**
     * @param $model
     */
    protected function sendFile($model)
    {
        $field = $this->field;

        if (is_a($model->$field, UploadedFile::class) && $model->$field->isValid()) {
            $this->upload($model);
        }
    }

    /**
     * @param $model
     */
    protected function removeFile($model)
    {
        $field = $this->field;
        Storage::delete($this->path . $model->$field);
    }

    /**
     * @param $model
     */
    protected function updateFile($model)
    {
        $field = $this->field;

        if (is_a($model->$field, UploadedFile::class) && $model->$field->isValid()) {
            $previousImage = $model->getOriginal($field);
            $this->upload($model);
            Storage::delete($this->path . $previousImage);
        }
    }

    /**
     * @param $model
     */
    protected function upload($model)
    {
        $field = $this->field;
        $extension = $model->$field->extension();
        $nameHash = bin2hex(openssl_random_pseudo_bytes(8));
        $name = $nameHash . "." . $extension;

        if ($model instanceof SliderItem) {
            $name = $nameHash . ".jpg";
            $path = storage_path('app/' . $this->path . $name);
            $img = Image::make($model->$field->path());
            $img->resize(1900, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 90)->save($path);
        }
        else {
            $model->$field->storeAs($this->path, $name);
        }

        $model->$field = $name;
    }
}
