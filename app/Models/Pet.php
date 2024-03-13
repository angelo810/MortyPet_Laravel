<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pets';

    protected $fillable = ['name','age','description','breed_id','image_url','available'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function breed()
    {
        return $this->hasOne('App\Models\Breed', 'id', 'breed_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany('App\Models\Request', 'pet_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shelterpets()
    {
        return $this->hasMany('App\Models\Shelterpet', 'pet_id', 'id');
    }
    
}
