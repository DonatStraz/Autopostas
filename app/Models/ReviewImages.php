<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewImages extends Model
{
    use HasFactory;

    protected $table = 'review_images';

    protected  $guarded=[];
}