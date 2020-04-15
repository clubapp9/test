<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SheetValue extends Model
{
    public $timestamps = false;
    protected $table = 'sheet_values';
    protected $fillable = [ 'field_id', 'sheet_id', 'row_id', 'column_name', 'value', 'data_date', 'csv_data_id'];

    public static function scopeFieldId($field_id)
    {
        return $query->where('field_id', $field_id);
    }


    public static function getSearch( $sheet_id, $start_date, $end_date, $data_type_id, $filter = null ) {

        $records = DB::Select('SELECT sv.value vals, sv.data_date, ff.customized_name FROM sheet_values sv
        INNER JOIN fields ff  ON ( ff.id = sv.field_id AND ff.data_type_id = :data_type_id )
        WHERE field_id <> 0
        AND sheet_id= :sheet_id AND data_date >= :start_date
        AND data_date <= :end_date ',

            [ 'data_type_id' => $data_type_id, 'sheet_id' => $sheet_id, 'start_date' => $start_date, 'end_date' => $end_date ]);

        return $records;
    }


    public function getAllValuesByRowId($row_id)
    {
        $row = DB::Select("SELECT id, name FROM sheet_values WHERE row_id=:row_id ORDER BY sheet_id ASC, row_id ASC");

        return $row;
    }

    public function getAllValuesBySheetIdAndRowId($row_id)
    {
        $row = DB::Select("SELECT id, name FROM sheet_values WHERE sheet_id=:sheet_id AND row_id=:row_id ORDER BY sheet_id ASC, row_id ASC");

        return $row;
    }


    public function getBySheetId($sheet_id)
    {
        $result = DB::table('sheet_values')->where('sheet_id', '=', $sheet_id)->get();

        return $result;
    }


}