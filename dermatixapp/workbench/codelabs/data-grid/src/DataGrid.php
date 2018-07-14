<?php namespace Codelabs\DataGrid;

use View, Input, Response;

class DataGrid
{
    public $query;
    public $options;
    public $fields;

    public function source($source)
    {
        $this->query = $source;
        return $this;
    }

    public function options(array $options)
    {
        if(empty($options)){
            $options = [
                'width' => '100%',
                'filtering' => true,
                'sorting' => true,
                'paging' => true,
                'autoload' => true,
                'pageSize' => 10,
                'pageButtonCount' => 5,
            ];
        }
        $this->options = $options;
        return $this;
    }

    public function filter($input, array $filters, $threshold = null, $threshold = false)
    {
        if(isset($input['status'])) {
            if(empty($input['status'])){
                $this->query = $this->query->withDrafted();
            }
            if($input['status'] == 'drafted'){
                $this->query = $this->query->onlyDrafted();
            }
        }

        if(isset($input['trash'])){
            $this->query = $this->query->onlyTrashed();
        }

        foreach($filters as $key){
            if(!empty($input[$key])){
                $this->query = $this->query->search($input[$key], $threshold, $threshold);
            }
        }

        return $this;
    }

    public function add($name, $title = null, $type = 'text', $width = null, $align = null, $options = [])
    {
        $this->fields[] = ['name'=>$name, 'title'=>$title, 'type'=>$type, 'width'=>$width, 'align'=>$align];
        return $this;
    }

    public function control($url, $title = 'Control', $actions='show|modify|delete', $width = null)
    {
        $this->fields[] = ['url'=>$url, 'title'=>$title, 'type'=>'control', 'actions'=>$actions, 'width'=>$width];
        return $this;
    }

    public function build()
    {
        return Response::json($this->query->get());
    }

    public function render()
    {
        $options = [
            'width' => '100%',
            'filtering' => true,
            'sorting' => true,
            'paging' => true,
            'autoload' => true,
            'pageSize' => 10,
            'pageButtonCount' => 5,
        ];
        $fields = $this->fields;
        return View::make('data-grid::view', compact('options', 'fields'))->render();
    }
}