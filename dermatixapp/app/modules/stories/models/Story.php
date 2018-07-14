<?php namespace App\Modules\Stories\Models;

use Codelabs\Core\Eloquent\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Story extends Post
{
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $type = 'story';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'body',
        'type',
        'status',
        'before',
        'after',
        'usia',
        'kota',
        'pekerjaan'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '200x200',
                'thumb' => '130x130'
            ]
        ]);

        $this->hasAttachedFile('before', [
            'styles' => [
                'medium' => '200x200',
                'thumb' => '120x120'
            ]
        ]);

        $this->hasAttachedFile('after', [
            'styles' => [
                'medium' => '200x200',
                'thumb' => '120x120'
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