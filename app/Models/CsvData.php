<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CsvData extends Model
{
    protected $table = 'csv_datas';
    protected $fillable = ['csv_filename', 'csv_header', 'csv_data', 'name', 'sheet_id'];

    public function getAllPortfolios()
    {
        $collector_ids = DB::Select("SELECT id, name FROM csv_datas WHERE name IS NOT NULL");

        return $collector_ids;
    }


    public function getBySheetId($sheet_id)
    {

        $result = DB::table('csv_datas')->where('sheet_id', '=', $sheet_id)->get();

        return $result;
    }


}