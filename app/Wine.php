<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Wine extends Model
{
    use Sortable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wine';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['upc', 'name', 'type_id', 'vintage', 'cost', 'regular_sell_price', 'qty', 'user_id'];


    public $sortable = [ 'id', 'upc', 'name', 'type_id', 'vintage', 'cost', 'regular_sell_price', 'qty', 'user_id', 'created_at'];

    /**
     * Get the wine types for the wine.
     */
    public function assnwineinventory()
    {
        return $this->hasMany('App\AssnWineInventory');
    }


}
