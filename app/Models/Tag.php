<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use App\Models\User;

class Tag extends Model
{
    public $table = "tags";

    public $fillable = [
            'name',
            'description',
            'slug',
            'author_id',
        ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id','id');
    }
    public function save(array $options = array())
    {
        $this->author_id = auth()->id();
        parent::save($options);
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class,'content_tag_pivot','content_id','tag_id');
    }
}
