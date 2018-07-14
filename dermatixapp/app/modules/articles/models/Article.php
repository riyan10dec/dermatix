<?php namespace App\Modules\Articles\Models;

use Codelabs\Core\Eloquent\Models\Post;
use Codelabs\Core\Eloquent\UploadableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Article extends Post
{
    use SoftDeletingTrait;
    //use UploadableTrait;

    protected $dates = ['deleted_at'];

    protected $type = 'article';

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '200x200'
            ]
        ]);

        parent::__construct($attributes);
    }

    protected static $rules = [
        'title' => 'required',
        //'slug'  => 'unique:posts',
        //'image' => 'image',
    ];

    protected $search = [
        'columns' => [
            'title' => 10,
        ],
    ];
}