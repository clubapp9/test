<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 6/12/18
 * Time: 10:48 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class AssnCollectorAccounts  extends Model{
    //disable created_at and updated_at timestamps for this association table
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assn_collector_accounts';

    protected $fillable = [  'user_id', 'portfolio_id' ];

    public function insert( $user_id, $portfolio_id ){
        Db::table('assn_collector_accounts')->insert( [
            'user_id' => $user_id,
            'portfolio_id' => $portfolio_id ] );
    }

    public function getCollectorAssignedAccountsList(){
        $collector_ids = DB::Select("SELECT aca.*, u.collector_id, COUNT(u.collector_id) county FROM assn_collector_accounts aca
INNER JOIN users u ON ( u.id = aca.user_id ) GROUP BY u.collector_id");

        return $collector_ids;
    }
}