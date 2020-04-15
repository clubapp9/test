<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CsvData extends Model
{
    protected $table = 'csv_datas';
    protected $fillable = ['csv_filename', 'csv_header', 'csv_data', 'name'];

    public function getAllPortfolios()
    {
        $collector_ids = DB::Select("SELECT id, name FROM csv_datas WHERE name IS NOT NULL");

        return $collector_ids;
    }

}