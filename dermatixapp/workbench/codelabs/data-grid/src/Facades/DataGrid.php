<?php namespace Codelabs\DataGrid\Facades; 
use Illuminate\Support\Facades\Facade;

class DataGrid extends Facade
{
    /**
     * Get Facade Accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'data-grid';
    }
}