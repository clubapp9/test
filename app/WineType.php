<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WineType extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wine_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['wine_type', 'user_id'];


    /**
     * Get the wine types for the wine.
    public function wine()
    {
        return $this->hasOne('App\Wine');
    }
     */
}
