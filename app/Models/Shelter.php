<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'shelters';

    protected $fillable = ['name','address','phone','email'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shelterpet()
    {
        return $this->hasOne('App\Models\Shelterpet', 'shelter_id', 'id');
    }
    
}
