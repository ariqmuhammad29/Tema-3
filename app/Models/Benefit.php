<?php

namespace App\Models;

use App\Models\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use UploadImage;

    protected $fillable = [
        'title','image', 'description',
    ];
}
