<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Coordinate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coordinate';

    public $timestamps = false;
}