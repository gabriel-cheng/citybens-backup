<?php

namespace App\Models\Blog;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog\Tags;
use Illuminate\Notifications\Notifiable;
use App\Models\User;


class Posts extends Model
{
    use HasFactory,
        Sluggable,
        Notifiable,
        SluggableScopeHelpers;

    protected $table = 'posts';

    protected $fillable = [
        'author_id',
        'cover',
        'title',
        'slug',
        'short_description',
        'description',
        'status',
    ];

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function tags()
    {
        return $this->belongsToMany(
            Tags::class,
            'posts_tags',
            'post_id',
            'tag_id',
        );
    }

    public function author() {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    /**
     * @return string
     */
    public function getCoverPath(): string
    {
        return asset("storage/images/posts/{$this->cover}");
    }
}
