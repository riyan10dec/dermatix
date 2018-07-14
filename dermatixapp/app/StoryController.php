<?php namespace App\Modules\Stories\Controllers;



use App\Modules\Main\Controllers\BaseFrontendController;
use App\Modules\Main\Controllers\BaseAdminController;

use App\Modules\Stories\Models\Story;
use Request, Redirect, Response, Input, Str;


class StoryController extends BaseFrontendController

{

    public function __construct()
    {
        $this->model = new Story;
        parent::__construct();
    }

    public function scarStories()

    {

        $this->setTitle('Scar Stories');

        $view = array(

            'stories' => Story::latest()->paginate(12)

        );

        return $this->theme->scope('scar-stories', $view)->render();

    }



    public function story($slug)

    {

        $story = Story::where('slug', $slug)->first();

        $moreStories = Story::latest()->where('slug', '!=', $slug)->get();

        $this->setTitle($story->name);

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
        $input = Input::all();
        $input['type'] = 'story';
        $input['status'] = 'published';
        $this->model->fill($input);
        if ($this->model->save())
        {
            return Redirect::to('scar-stories');
        }
        return Redirect::back()->withInput()->withErrors($this->model->getErrors());

    }

}