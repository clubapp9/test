<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 12/20/15
 * Time: 10:52 PM
 */

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Portfolio;
use App\Models\AssnCollectorAccounts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Response;

use Validator;

class AJAXController extends Controller {

    public function assign_accounts( Request $request ) {

        $validator = Validator::make($request->all(), ['portfolio' => 'required|numeric',
            'collector' => 'required|numeric',
            'quantity' => 'required|numeric',
            'balance_min' => 'numeric',
            'balance_max' => 'numeric'
        ]);

        if ($validator->passes()) {
            //Same as csv_data_file_id
            $portfolio   = (isset($request->portfolio)      ? $request->portfolio : '' );

            $collector   = (isset($request->collector)      ? $request->collector : '' );
            $quantity    = (isset($request->quantity)       ? $request->quantity : '' );
            $balance_min = (isset($request->balance_min)    ? $request->balance_min : '' );
            $balance_max = (isset($request->balance_max)    ? $request->balance_max : '' );

            $portfolio_model = new Portfolio;
            $assn_collector_accounts_model = new AssnCollectorAccounts;
           if(!empty($quantity) && $portfolio=='any'){
               $get_portfolio_csv_data_file_ids_that_have_accounts = $portfolio_model->getCSVDataFileIDs();

               if(!empty($get_portfolio_csv_data_file_ids_that_have_accounts)) {
                   //Iterate over all IDs until we are able to assign the quantity of accounts to the Collector

                   foreach($get_portfolio_csv_data_file_ids_that_have_accounts as $record ){
                       foreach($record as $key => $value){
                           //$key - will always be csv_data_file_id (column name)
                           // $value  - is the csv_data_file_id
                           $find_available_portfolios = $portfolio_model->getPortfolioAccounts( $value, $quantity, $balance_min, $balance_max );


                       }
                   }
               }
           }elseif(!empty($portfolio)){
               $find_available_portfolios = $portfolio_model->getPortfolioAccounts( $portfolio, $quantity, $balance_min, $balance_max );

               if(is_a($find_available_portfolios , 'Exception')) {
                    echo "it's an exception";
               }
               if(!empty($find_available_portfolios)){
                   foreach($find_available_portfolios as $record){
                        foreach($record as $key => $value ){
                            echo $key . ' ' . $value;
                            //insert into assn_collector_accounts
                            //Assign the portfolio ID to portfolio_id
                            //Assign $collector to user_id (since technically a collector is just a user in the system)
                            $assn_collector_accounts_model->insert( $collector, $value );
                        }
                   }
               }
           }

            return response()->json(['success'=> array('Added new records.')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function post(Request $request) {

    }



    //route:   /ajax/post/controller


}