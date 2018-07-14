<?php namespace App\Modules\Banners\Models;

use Codelabs\Core\Eloquent\Models\BaseModel;
use Codelabs\Core\Eloquent\StatusTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Banner extends BaseModel implements StaplerableInterface
{
    use SoftDeletingTrait;
    use StatusTrait;
    use EloquentTrait;

    protected $dates = ['deleted_at'];

    protected $type = 'event';

    protected $fillable = [
        'title',
        'image',
        'desc',
        'link',
        'type',
        'position',
        'video_url',
        'status'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'large' => '1425x500',
                'medium' => '600x211',
                'thumb' => '300x105'
            ]
        ]);

        parent::__construct($attributes);
    }

    protected static $rules = [
        'title' => 'required',
        'video_url' => 'required',
        //'slug'  => 'unique:posts',
        //'image' => 'image',
    ];

    protected $search = [
        'columns' => [
            'title' => 10,
        ],
    ];

    public function youtubeID()
    {
        $url = $this->video_url;
        if($url != '-'){
            parse_str( parse_url( $url, PHP_URL_QUERY ), $video );
            $id = $video['v'];
        } else {
            $id = $url;
        }
        return $id;
    }

}