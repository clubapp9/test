<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryLocation extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventory_location';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'location' , 'user_id' ];

}
