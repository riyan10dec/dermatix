<?php namespace App\Modules\Locations\Controllers;

use App\Modules\Locations\Models\Location;
use App\Modules\Main\Controllers\BaseFrontendController;
use Input;

class LocationController extends BaseFrontendController
{
    public function whereToFind()
    {
        $this->setTitle('Where to Find');
        $results = Location::where('city', Input::get('city'))->paginate(50);
        $view = array(
            'results' => $results,
            'cities' => cities()
        );
        return $this->theme->scope('where-to-find', $view)->render();
    }
}