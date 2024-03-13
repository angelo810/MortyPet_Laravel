<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'breeds';

    protected $fillable = ['name','size'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany('App\Models\Pet', 'breed_id', 'id');
    }
    
}
