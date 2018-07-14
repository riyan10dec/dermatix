<?php namespace App\Modules\Stories\Controllers;

use App\Modules\Main\Controllers\BaseAdminController;
use App\Modules\Stories\Models\Story;
use Codelabs\DataGrid\Facades\DataGrid;
use Request, Redirect, Response, Input, Str;
use Mmanos\Search\Facade as Search;

class StoryAdminController extends BaseAdminController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Story;
        parent::__construct();
    }

    public function index()
    {
        $this->setTitle(Str::title(Request::segment(2)));

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => Str::title(Request::segment(2)),
                'url'   => 'admin/'.Request::segment(2)
            )
        ));

        $grid = DataGrid::source($this->model);
        $grid->add('title', 'Title', 'text', 150);
        $grid->add('status', 'Status', 'select', 50, 'center');
        $grid->add('updated_at', 'Last Update', 'date', 50, 'center');
        $grid->control('admin/'.Request::segment(2), 'Control', 'modify|delete', 50);
        if(Request::ajax()){
            $grid->filter(Input::all(), ['title', 'status'], 100, true);
            return $grid->build();
        } else {
            return $this->theme->scope(Request::segment(2).'.index')->render();
        }
    }

    public function create()
    {
        $this->setTitle("Create New ".Str::title(Request::segment(2)));

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => Str::title(Request::segment(2)),
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
        $input['type'] = 'story';
        if(isset($input['publish'])){
            $input['status'] = 'published';
        } else {
            $input['status'] = 'drafted';
        }
        $this->model->fill($input);
        if ($this->model->save())
        {
            if($this->model->status == 'published') {
                Search::insert($this->model->id, array(
                    'title' => $this->model->title,
                    'url' => 'story/'.$this->model->slug,
                    'image' => $this->model->image->url('thumb'),
                    'type' => 'story'
                ));
            }
            return Redirect::route('admin.'.Request::segment(2).'.index');
        }

        return Redirect::back()->withInput()->withErrors($this->model->getErrors());
    }

    public function show($id)
    {
//        $this->setTitle("View ".Str::title(Request::segment(2)));
//
//        $this->theme->breadcrumb()->add(array(
//            array(
//                'label' => Str::title(Request::segment(2)),
//                'url'   => 'admin/'.Request::segment(2)
//            ),
//            array(
//                'label' => 'Create',
//                'url'   => 'admin/'.Request::segment(2).'/'.$id
//            )
//        ));
//
//        $model = $this->model->find($id);
//        $data = ['model'=>$model];
//        return $this->theme->scope(Request::segment(2).'.show', $data)->render();
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
            if($this->model->status == 'published') {
                Search::insert($this->model->id, array(
                    'title' => $this->model->title,
                    'url' => 'story/'.$this->model->slug,
                    'image' => $this->model->image->url('thumb'),
                    'type' => 'story'
                ));
            }
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