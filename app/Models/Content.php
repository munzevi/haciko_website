<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Content extends Model
{
    /**
     * @var string
     */
    protected $table = 'contents';


    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'title',
        'subtitle',
        'image_path',
        'content',
        'feature_content',
        'banner',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'layout',
        'show_at_parent',
        'show_on_menu',
        'status',
        'parent_id',
        'author_id',
        'language_id',
        'extra_fields',
        'type',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'title' => 'string',
        'subtitle' => 'string',
        'image_path' => 'string',
        'content' => 'string',
        'feature_content' => 'array',
        'banner' => 'array',
        'seo_title' => 'string',
        'seo_keywords' => 'string',
        'seo_description' => 'string',
        'layout' => 'string',
        'show_at_menu' => 'boolean',
        'status' => 'boolean',
        'parent_id' => 'integer',
        'author_id' => 'integer',
        'language_id' => 'integer',
        'extra_fields' => 'array',
        'type' => 'string',
    ];

    /**
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->BelongsTo(__CLASS__,'parent_id');
    }


    /**
     * @return HasMany
     */
    public function child()
    {
        return $this->HasMany(__CLASS__,'parent_id','id');
    }

    /**
     * [grandChild description]
     * @return [type] [description]
     */
    public function grandChild(){
        return $this->child()->with('child')->get();
    }


    /**
     * @return BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class,'author_id','id');
    }

    /**
     * Model Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany(Tag::class,'content_tag_pivot','content_id','tag_id');
    }

    /**
     * Model Relationship
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function slider(){
        return $this->hasMany(Slider::class,'content_id');
    }

    public function parents()
    {
        return $this->where('parent_id',null)->get();
    }
}
