<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	/**
	 * [$table description]
	 * @var string
	 */
    protected $table = "settings";

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
    	'segment',
    	'key',
    	'value',
    	'language_id',
    ];

    /**
     * [lang description]
     * @return [type] [description]
     */
    public function lang(){
    	return $this->belongsTo('App\Models\Language','language_id','id');
    }
}
