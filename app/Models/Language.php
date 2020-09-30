<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Language extends Model
{
    /**
     * @var string
     */
    protected $table = 'languages';


    /**
     * @var string[]
     */
    protected $fillable = ['name','code','slug','author'];


    /**
     * @var string
     */


    /**
     * @return BelongsTo
     */
    public function owner()
    {
    	return $this->BelongsTo('App\Models\User','author','id');
    }
}
