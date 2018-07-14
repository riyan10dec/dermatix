<?php namespace App\Modules\Main\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;
use Patchwork\Utf8;
use Teepluss\Theme\Facades\Theme;
use View;

class BaseAdminController extends Controller
{
    protected $theme;

    public $applicationName;
    public $title  = array(
        'parent'   => '',
        'child'    => '',
        'h1'       => '',
    );

    public function __construct()
    {
        $this->theme = Theme::uses('admin')->layout('default');

        $this->applicationName = getenv('APP_NAME');

        Theme::share('title', $this->getTitle());
    }

    public function getTitle()
    {
        $title = Utf8::ucfirst($this->title['parent']);
        if ($this->title['child']) {
            $title .= ' - ' . Utf8::ucfirst($this->title['child']);
        }
        $title .= ' - ' . $this->applicationName;

        return $title;
    }

    public function setTitle($parent = null, $child = null, $h1 = null)
    {
        $this->title  = array(
            'parent'   => $parent,
            'child'    => $child,
            'h1'       => $h1,
        );
        Theme::setTitle($parent);
        Theme::share('title', $this->getTitle());
    }
}