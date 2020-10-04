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
        'show_at_footer',
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
        'show_at_footer' => 'boolean',
        'status' => 'boolean',
        'parent_id' => 'integer',
        'author_id' => 'integer',
        'language_id' => 'integer',
        'extra_fields' => 'array',
        'type' => 'string',
        'url' => 'boolean',
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
    public function getGrandChildAttribute(){
        return collect($this->child)->filter(function($item){
            return !is_null($item->child);
        });
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

    public function getUrlAttribute()
    {
        if($this->slug === "online-bagis"){
            $url = "https://fonzip.com/haciko/bagis?recurring=true";
        }elseif(isset($this->parent->parent)){
            $url = "/".$this->parent->parent->slug."/".$this->parent->slug."/".$this->slug;
        } elseif(isset($this->parent)){
            $url =  "/".$this->parent->slug."/".$this->slug;
        } else {
            $url = "/";
        }
        return $url;
    }

}
