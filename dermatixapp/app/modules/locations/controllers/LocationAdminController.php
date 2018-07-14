<?php namespace App\Modules\Locations\Controllers;

use App\Modules\Locations\Models\Location;
use App\Modules\Main\Controllers\BaseAdminController;
use Codelabs\DataGrid\Facades\DataGrid;
use Request, Redirect, Response, Input;

class LocationAdminController extends BaseAdminController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Location;
        parent::__construct();
    }

    public function index()
    {
        $this->setTitle("Locations");

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Locations',
                'url'   => 'admin/locations'
            )
        ));

        $grid = DataGrid::source($this->model);
        $grid->add('city', 'City', 'text', 100);
        $grid->add('store_name', 'Store Name', 'text', 150);
        $grid->add('address', 'Address', 'text', 150);
        $grid->add('updated_at', 'Last Update', 'date', 100, 'center');
        $grid->control('admin/locations', 'Control', 'modify|delete', 50);
        if(Request::ajax()){
            $grid->filter(Input::all(), ['city', 'store_name', 'address'], 100, true);
            return $grid->build();
        } else {
            return $this->theme->scope('locations.index')->render();
        }
    }

    public function create()
    {
        $this->setTitle("Create New Locations");

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Locations',
                'url'   => 'admin/locations'
            ),
            array(
                'label' => 'Create',
                'url'   => 'admin/locations/create'
            )
        ));

        $data = ['cities'=> $this->cities()];
        return $this->theme->scope('locations.form', $data)->render();
    }

    public function store()
    {
        $this->model->fill(Input::all());
        if ($this->model->save())
        {
            return Redirect::route('admin.locations.index');
        }

        return Redirect::back()->withInput()->withErrors($this->model->getErrors());
    }

    public function show()
    {

    }

    public function edit($id)
    {
        $this->setTitle("Modify Locations");

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Locations',
                'url'   => 'admin/locations'
            ),
            array(
                'label' => 'Create',
                'url'   => 'admin/locations/'.$id.'/edit'
            )
        ));

        $model = $this->model->find($id);
        $data = ['cities'=> $this->cities(), 'model'=>$model];
        return $this->theme->scope('locations.form', $data)->render();
    }

    public function update($id)
    {
        $this->model = $this->model->find($id);
        $this->model->fill(Input::all());
        if ($this->model->save())
        {
            return Redirect::route('admin.locations.index');
        }

        return Redirect::back()->withInput()->withErrors($this->model->getErrors());
    }

    public function destroy($id)
    {
        $success = false;
        if(Input::get('restore')){
            $this->model = $this->model->onlyTrashed()->where('id', $id);
            if($this->model->restore()){
                $success = true;
            }
        } else {
            $this->model = $this->model->find($id);
            if($this->model->delete()){
                $success = true;
            }
        }

        if($success){
            if(Request::ajax()){
                return Response::json('Success', 200);
            }
            return Redirect::route('admin.locations.index');
        }
    }

    public function cities()
    {
        $txt = explode(',', file_get_contents(base_path().'/city.txt'));
        $cities = [null => 'Select City'];
        foreach($txt as $val){
            $val = trim($val);
            $cities[$val] = $val;
        }

        return $cities;
    }
}