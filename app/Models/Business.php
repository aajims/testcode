<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Business extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business';

    protected $casts = ['id'=> 'string']; 


    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, 'business_categories');
    }

    // public function location()
    // {
    //     return $this->belongsTo(Location::class);
    // }

    public function coordinate()
    {
        return $this->belongsTo(Coordinate::class);
    }
}