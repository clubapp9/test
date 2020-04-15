<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventory';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'inventory_location_id', 'quantity' ];

    /**
     * Get the wine_id  inventory_id association from association table
     */
    public function assnwineinventory()
    {
        return $this->hasMany('App\AssnWineInventory');
    }


    /**
     * Get the locations associated with this inventory id
     */
    public function inventorylocation()
    {
        return $this->belongsTo('App\InventoryLocation', 'inventory_location_id');
    }

}
