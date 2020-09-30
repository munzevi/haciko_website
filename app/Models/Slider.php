<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;

class Slider extends Model
{
    protected $table ='sliders';

    protected $fillable = [
        'title','subtitle','type','path','metaTitle','metaAlt','description','content_id'
    ];

    protected $casts = [
        'path' => 'array',
        'title' => 'array',
        'subtitle' => 'array',
        'type' => 'string',
        'metaTitle' => 'array',
        'metaAlt' => 'array',
        'description' => 'string',
        'content_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content(){
        return $this->belongsTo(Content::class,'content_id');
    }

}
