<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'csv_datas';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['csv_filename', 'csv_header', 'csv_data'];

}
