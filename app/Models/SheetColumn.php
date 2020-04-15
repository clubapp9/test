<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SheetColumn extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sheet_columns';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sheet_id', 'name', 'parent', 'aesthetic', 'column_occupy', 'row_occupy'];

    
}
