<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UploadImage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


class Partner extends Model implements Sortable
{
    use SortableTrait;
    use UploadImage;
    
    protected $fillable = [
        'name',
        'image',  
        'about',
        'additional_info'
    ];
}
