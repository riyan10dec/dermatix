<?php namespace App\Modules\Main\Controllers;
class MainAdminController extends BaseAdminController
{
    public function index()
    {
        $this->setTitle('Dashboard');

        return $this->theme->scope('index')->render();
    }
}