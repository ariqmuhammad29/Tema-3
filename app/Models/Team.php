<?php

namespace App\Models;

use App\Models\Traits\UploadImage;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class Team extends Model implements Sortable
{
    use SortableTrait;
    use UploadImage;

    protected $fillable = [
        'name',
        'email',
        'role',
        'phone',
        'address',
        'about',
        'image',
        'social_media',
        'additional_info',
    ];


    public function getSocialMediaAttribute($value)
    {
        return json_decode($value);
    }
}
