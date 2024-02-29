<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelterPet extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'shelterPets';

    protected $fillable = ['shelter_id','pet_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pet()
    {
        return $this->hasOne('App\Models\Pet', 'id', 'pet_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shelter()
    {
        return $this->hasOne('App\Models\Shelter', 'id', 'shelter_id');
    }
    
}
