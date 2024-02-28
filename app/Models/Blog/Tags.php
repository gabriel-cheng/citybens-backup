<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $table = "tags";

    protected $fillable = [
        'name',
        'text_color',
        'background_color',
    ];
}
