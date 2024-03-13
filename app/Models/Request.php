<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'requests';

    protected $fillable = ['request_date','pet_id','client_name','message'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pet()
    {
        return $this->hasOne('App\Models\Pet', 'id', 'pet_id');
    }
    
}
