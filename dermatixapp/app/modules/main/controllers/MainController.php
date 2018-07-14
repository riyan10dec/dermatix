<?php namespace App\Modules\Main\Controllers;

use App\Modules\Articles\Models\Article;
use Mmanos\Search\Facade as Search;
use View, Request, Response, Input, URL;

class MainController extends BaseFrontendController
{
    public function index()
    {
        $this->setTitle('Home');
        $view = array(
            'updates' => Article::latest()->take(3)->get(),
            'cities' => cities()
        );
        return $this->theme->scope('index', $view)->render();
    }

    public function identifyDermatix()
    {
        $this->setTitle('Identify Dermatix');
        $view = array();
        return $this->theme->scope('identify-dermatix', $view)->render();
    }

    public function clinicalEvidence()
    {
        $this->title['parent'] = 'Clinical Evidence';
        $this->theme->setTitle($this->getTitle());
        $view = array();
        return $this->theme->scope('clinical-evidence', $view)->render();
    }

    public function event()
    {
        $this->title['parent'] = 'Event';
        $this->theme->setTitle($this->getTitle());
        $view = array();
        return $this->theme->scope('event-detail', $view)->render();
    }

    public function upcomingEvent()
    {
        $this->title['parent'] = 'Upcoming Event';
        $this->theme->setTitle($this->getTitle());
        $view = array();
        return $this->theme->scope('upcoming-event-detail', $view)->render();
    }

    public function pressConference()
    {
        $this->title['parent'] = 'Press Conference';
        $this->theme->setTitle($this->getTitle());
        $view = array();
        return $this->theme->scope('detail-events1', $view)->render();
    }

    public function lukaBakar()
    {
        $this->title['parent'] = 'Luka Bakar Mengintai di Sekitar Kita';
        $this->theme->setTitle($this->getTitle());
        $view = array();
        return $this->theme->scope('detail-events2', $view)->render();
    }

    public function menuAtas()
    {
        $this->title['parent'] = 'menu atas';
        $this->theme->setTitle($this->getTitle());
        $view = array();
        return $this->theme->scope('menu-atas', $view)->render();
    }

    public function search()
    {
        $q = Input::get('q');
        $results = Search::search('title', $q)->get();
        $data = [
            'results' => $results
        ];
        return $this->theme->scope('search-result', $data)->render();
    }
}