<?php namespace App\Modules\Locations\Models;

use Codelabs\Core\Eloquent\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Location extends BaseModel
{
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'city',
        'store_name',
        'address'
    ];

    protected $search = [
        'columns' => [
            'city' => 10,
            'store_name' => 10,
            'address' => 10,
        ],
    ];

    protected static $rules = [
        'city' => 'required',
        'store_name' => 'required',
        'address' => 'required'
    ];

}