<?php namespace App\Modules\Banners\Controllers;


use App\Modules\Banners\Models\Banner;
use App\Modules\Main\Controllers\BaseAdminController;
use Request, Response, Str, Input, Redirect;

class BannerAdminController extends BaseAdminController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Banner;
        parent::__construct();
    }

    public function index()
    {
        $this->setTitle(Str::title(Request::segment(2)));

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Banners',
                'url'   => 'admin/'.Request::segment(2)
            )
        ));

        if(Request::ajax()){
            $filter = Input::except('trash');
            $trash = Input::get('trash');
            $query = $this->model->withDrafted();
            foreach($filter as $key => $val){
                if(!empty($val) or $val != 0){
                    $query = $query->where($key, 'like', '%' . $val . '%');
                }
            }
            if(isset($trash)){
                $query = $query->onlyTrashed();
            }
            return Response::json($query->get());
        } else {
            return $this->theme->scope(Request::segment(2).'.index')->render();
        }

    }

    public function create()
    {
        $this->setTitle("Create New ".Str::title(Request::segment(2)));

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Banners',
                'url'   => 'admin/'.Request::segment(2)
            ),
            array(
                'label' => 'Create',
                'url'   => 'admin/'.Request::segment(2).'/create'
            )
        ));

        $data = [];
        return $this->theme->scope(Request::segment(2).'.form', $data)->render();
    }

    public function store()
    {
        $input = Input::all();
        if(isset($input['publish'])){
            $input['status'] = 'published';
        } else {
            $input['status'] = 'drafted';
        }

        $this->model->fill($input);

        if ($this->model->save())
        {
            return Redirect::route('admin.'.Request::segment(2).'.index');
        }

        return Redirect::back()->withInput()->withErrors($this->model->getErrors());
    }

    public function edit($id)
    {
        $this->setTitle("Modify ".Str::title(Request::segment(2)));

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => Str::title(Request::segment(2)),
                'url'   => 'admin/'.Request::segment(2)
            ),
            array(
                'label' => 'Create',
                'url'   => 'admin/'.Request::segment(2).'/'.$id.'/edit'
            )
        ));

        $model = $this->model->withDrafted()->find($id);
        $data = ['model'=>$model];
        return $this->theme->scope(Request::segment(2).'.form', $data)->render();
    }

    public function update($id)
    {
        $this->model = $this->model->withDrafted()->find($id);
        $input = Input::all();
        if(isset($input['publish'])){
            $input['status'] = 'published';
        } else {
            $input['status'] = 'drafted';
        }
        if(empty($input['image'])){
            unset($input['image']);
        }
        $this->model->fill($input);
        if ($this->model->save())
        {
            return Redirect::route('admin.'.Request::segment(2).'.index');
        }

        return Redirect::back()->withInput()->withErrors($this->model->getErrors());
    }

    public function destroy($id)
    {
        $success = false;
        if(Input::get('restore')){
            $this->model = $this->model->withDrafted()->onlyTrashed()->where('id', $id);
            if($this->model->restore()){
                $success = true;
            }
        } else {
            $this->model = $this->model->withDrafted()->find($id);
            if($this->model->delete()){
                $success = true;
            }
        }

        if($success){
            if(Request::ajax()){
                return Response::json('Success', 200);
            }
            return Redirect::route('admin.'.Request::segment(2).'.index');
        }
    }
}