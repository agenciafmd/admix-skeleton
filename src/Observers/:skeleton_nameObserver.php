<?php

namespace :namespace_vendor\:namespace_skeleton_name\Observers;

use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use Illuminate\Support\Str;

class :skeleton_nameObserver
{
    public function saving(:skeleton_name $model)
    {
        $model->slug = Str::slug($model->name);
    }

    public function saved(:skeleton_name $model)
    {
        $this->media($model);
    }

    private function media($model)
    {
        $request = request();

        if (!$request->media) {
            return false;
        }

        foreach ($request->media as $media) {
            if (is_array($media['collection'])) {
                $collection = reset($media['collection']);
                $file = storage_path('admix/tmp') . "/" . reset($media['name']);

                $model->doUploadMultiple($file, $collection);

            } else {
                $collection = $media['collection'];
                $file = storage_path('admix/tmp') . "/{$media['name']}";

                $model->doUpload($file, $collection);
            }
        }

        return true;
    }
}