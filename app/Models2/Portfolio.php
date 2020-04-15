<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'portfolios';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'dob', 'ssn', 'co_borrower_first_name', 'co_borrower_last_name', 'co_borrower_ssn', 'address', 'city', 'state', 'zip_code', 'original_creditor', 'original_account_numbers', 'portfolio_name', 'reference_name', 'account_open_date', 'first_delinquent_date', 'charge_off_date', 'last_payment_date', 'last_payment_amount', 'original_balance', 'interest_percentage', 'total_interest', 'current_balance_with_interest', 'place_of_employment', 'home_phone', 'work_phone', 'reference_phone', 'last_contact_date', 'status'];


    /**
     * Get a Distinct list of IDs from all Portfolio sources that actually have Records in the Portfolios table
     * @return mixed
     */
    public function getPortfolioByCSVDataFileId( $portfolio_id ){
        $portfolio = DB::select('SELECT id FROM Portfolios
        WHERE csv_data_file_id=:csv_data_file_id', [ 'csv_data_file_id' => $portfolio_id ]);

        return $portfolio;
    }


    /**
     * Get a Distinct list of IDs from all Portfolio sources that actually have Records in the Portfolios table
     * @return mixed
     */
    public function getCSVDataFileIDs(){
        $distinct_ids = DB::select('SELECT DISTINCT(csv_data_file_id) FROM Portfolios
        WHERE csv_data_file_id IS NOT NULL');

        return $distinct_ids;
    }

    public function getPortfolioAccounts($csv_data_file_id, $quantity, $balance_min, $balance_max ) {

        if($csv_data_file_id){
           $query = 'SELECT portfo.id FROM portfolios portfo WHERE portfo.csv_data_file_id=:csv_data_file_id';
            $pdo_array['csv_data_file_id'] = $csv_data_file_id;
        } else return new \Exception;

        //Build the Query
        if($balance_min){
            $query .= ' AND portfo.current_balance_with_interest >= :balance_min';
            $pdo_array['balance_min'] = $balance_min;
        }

        if($balance_max){
            $query .= ' AND portfo.current_balance_with_interest <= :balance_max';
            $pdo_array['balance_max'] = $balance_max;
        }

        $query .= ' AND portfo.id NOT IN (SELECT assn_collector_accounts.portfolio_id FROM assn_collector_accounts)';

        if($quantity){
            $query .= ' LIMIT :quantity';
            $pdo_array['quantity'] = $quantity;
        }

        //echo $query;
        $results = DB::select($query, $pdo_array);

        return $results;
    }

    public function searchAcounts( array $exacts, array $likes = [] ){
        $beginning_query = "SELECT * FROM portfolios WHERE ";
        $query='';
        $pdo_array = [];

        foreach( $exacts as $key => $value ) {
            if($value){
                $query .= ( !empty($query) ? ' AND '. $key . '= :' . $key : $key . '= :' . $key);
                $pdo_array[$key] = $value;
            }
        }

        if(!empty($likes)){
            foreach( $likes as $key => $value ) {
                if($value){
                    $query .= ( !empty($query) ? ' AND '. $key . ' LIKE  :' . $key : $key . ' LIKE :' . $key);
                    $pdo_array[$key] = '%' . $value . '%';
                }
            }
        }

        $query .= ( !empty($query) ? ' AND ': '' );
        $query .= 'csv_data_file_id IS NOT NULL LIMIT 20';
//echo $beginning_query.$query;
        $results = DB::select($beginning_query.$query, $pdo_array);

        return $results;
    }


}
