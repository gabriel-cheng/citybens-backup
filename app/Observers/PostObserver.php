<?php

namespace App\Observers;

use App\Models\Blog\Posts;


class PostObserver
{
    use UploadObserverTrait;

    protected $field = 'cover';
    protected $path = 'public/images/posts/';

    public function creating(Posts $model)
    {
        $this->sendFile($model);
    }

    public function deleting(Posts $model)
    {
        $this->removeFile($model);
    }

    public function updating(Posts $model)
    {
        $this->updateFile($model);
    }
}
