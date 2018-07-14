<?php namespace App\Modules\Events\Models;

use Codelabs\Core\Eloquent\Models\BaseModel;
use Codelabs\Core\Eloquent\StatusTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Event extends BaseModel implements StaplerableInterface
{
    use SoftDeletingTrait;
    use StatusTrait;
    use EloquentTrait;

    protected $dates = ['deleted_at'];

    protected $type = 'event';

    protected $fillable = [
        'title',
        'slug',
        'community',
        'city',
        'place',
        'agenda',
        'date',
        'time',
        'status',
        'image',
        'banner',
        'country'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '200x200'
            ]
        ]);

        $this->hasAttachedFile('banner', [
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

    public function scopeDone($query)
    {
        return $query->where('date', '<', date('Y-m-d H:i:s', time()));
    }

    public function scopeUpcoming($query) {
        return $query->where('date', '>', date('Y-m-d H:i:s', time()));
    }

    public function scopeLatest($query)
    {
        return $query->OrderBy('created_at', 'desc');
    }
}