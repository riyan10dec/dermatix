<?php namespace App\Modules\Stories\Controllers;



use App\Modules\Main\Controllers\BaseFrontendController;
use App\Modules\Main\Controllers\BaseAdminController;

use App\Modules\Stories\Models\Story;
use Mmanos\Search\Facade as Search;
use Request, Redirect, Response, Input, Str;


class StoryController extends BaseFrontendController

{
    protected $model;

    public function __construct()
    {
        $this->model = new Story;
        parent::__construct();
    }

    public function scarStories()

    {

        $this->setTitle('Scar Stories');

        $view = array(

            'stories' => Story::latest()->paginate(18)

        );

        return $this->theme->scope('scar-stories', $view)->render();

    }



    public function story($slug)

    {

        $story = Story::where('slug', $slug)->first();

        $moreStories = Story::latest()->where('slug', '!=', $slug)->get();

        $this->setTitle($story->title);

        $view = array(

            'story' => $story,

            'moreStories' => $moreStories

        );

        return $this->theme->scope('story-detail', $view)->render();
    }

    // public function create()
    // {
    //     // load the create form (app/views/nerds/create.blade.php)
    //     return View::make('testi-user.create');            
    // }

    public function store()
    {
        //$input = Input::all();
        //$input['type'] = 'story';
        //$input['status'] = 'published';
         //$this->model->fill($input);
         //if ($this->model->save())
         //{
             //if($this->model->status == 'published') {
                 //Search::insert($this->model->id, array(
                 //    'title' => $this->model->title,
                 //    'url' => 'story/'.$this->model->slug,
                 //    'image' => $this->model->image->url('thumb'),
                 //    'type' => 'story'
                 //));
             //}
             //return Redirect::to('story/'.$this->model->slug);
         //}

        //return Redirect::back()->withInput()->withErrors($this->model->getErrors());
        return Redirect::to('talk-about-scar/');
    }

}