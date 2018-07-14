<?php namespace App\Modules\Events\Controllers;
use App\Modules\Events\Models\Event;
use App\Modules\Main\Controllers\BaseFrontendController;

class EventController extends BaseFrontendController
{
    public function index()
    {
        $this->setTitle('News and Events');
        $view = array(
            'events' => Event::orderBy('date', 'desc')->paginate(6),
            'upcomingEvents' => Event::upcoming()->orderBy('date', 'desc')->take(6)->get(),
        );
        return $this->theme->scope('news-event', $view)->render();
    }

    public function event($slug)
    {
        $event = new Event;
        $latest = $event->latest()->take(6)->where('slug', '!=', $slug)->get();
        $event = $event->where('slug', $slug)->first();
        $this->setTitle($event->title);
        $view = array(
            'event' => $event,
            'latest' => $latest
        );
        return $this->theme->scope('event-detail', $view)->render();
    }
}