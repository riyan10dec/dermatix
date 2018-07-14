<?php namespace App\Modules\Main\Observers;

use File;
use Idfluid\Core\Services\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;
use Input;
use Image;

class FileObserver
{

    /**
     * On delete, unlink files and thumbs
     * @param  Model $model eloquent
     * @return mixed false or void
     */
    public function deleted(Model $model)
    {
        if (! $attachments = $model->attachments) {
            return;
        }

        foreach ($attachments as $field) {
            $path = '/uploads/';
            if(isset($field['path'])){
                $path .= $field['path'].'/';
            }
            $file = $path . $model->getOriginal($field['name']);
            $this->delete($file);
        }
    }

    /**
     * Delete file and thumbs
     * 
     * @param  string $file
     * @return void
     */
    public function delete($file)
    {
        File::delete(public_path() . $file);
    }

    /**
     * On save, upload files
     * 
     * @param  Model $model eloquent
     * @return mixed false or void
     */
    public function saving(Model $model)
    {

        if (! $attachments = $model->attachments) {
            return;
        }

        foreach ($attachments as $name => $field) {
            if (Input::hasFile($name)) {
                $file = sanitizer(Input::file($name)->getClientOriginalName());
                if(file_exists('uploads/'.$file)) $file = time().'_'.$file;
                $path = public_path('uploads/');
                if(isset($field['path'])){
                    $path .= $field['path'].'/';
                }
                if( ! File::exists($path)){
                    File::makeDirectory($path,  $mode = 0777);
                }
                $image = Image::make(Input::file($name));
                $image->save($path . $file);
                if(isset($field['resize'])){
                    foreach ($field['resize'] as $key => $val) {
                        $size = explode(':', $val);
                        $path .= $size[0].'/'.$size[1].'/';
                        if( ! File::exists($path)){
                            File::makeDirectory($path,  $mode = 0777);
                        }
                        $image->fit($size[0], $size[1]);
                        $image->save($path . $file);
                    }
                }
                $model->$name = $file;
                if ($model->getTable() == 'files') {
                    $model->fill($file);
                }
            } else {
                if ($model->$name == 'delete') {
                    $model->$name = null;
                } else {
                    $model->$name = $model->getOriginal($name);
                }
            }
        }
    }

    /**
     * On update, delete previous file if changed
     * 
     * @param  Model $model eloquent
     * @return mixed false or void
     */
    public function updated(Model $model)
    {
        if (! $attachments = $model->attachments) {
            return;
        }

        foreach ($attachments as $field) {

            // Nothing to do if file did not change
            if (! $model->isDirty($field['name'])) {
                continue;
            }

            $file = '/uploads/' . $model->getTable() . '/' . $model->getOriginal($field['name']);
            $this->delete($file);

        }
    }
}
