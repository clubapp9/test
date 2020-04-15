<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssnWineInventory extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assn_wine_inventory';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'wine_id', 'inventory_id' ];

    public $timestamps = false;

    /*
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }
    */

    public function getInventoryAndLocationsByWineId( $wine_id )
    {

    }

    public function getInventoryAndLocationsByInventoryId( $inventory_id )
    {

    }

}
