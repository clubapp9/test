<?php

namespace App\Http\Controllers\Frontend\Search;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Portfolio;
use App\Models\AssnCollectorAccounts;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Session;

use Validator;

class SearchController extends Controller
{

    public function index( Request $request )
    {
       // debt_id, ssn, first_name, last_name, phone, status_code, portfolio,
       // warning, state, reference_number

        $validator = Validator::make($request->all(), ['portfolio' => 'numeric',
            'debt_id' => 'numeric',
            'ssn' => 'numeric',
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'phone' => 'alpha_dash',
            'status_code' => 'numeric',
            'reference_number' =>  'numeric',
            'state' => 'alpha',
            'warning' => 'alphanumeric'
        ]);
        if ($validator->passes()) {
            $portfolio   = (isset($request->portfolio)      ? $request->portfolio : '' );
            $debt_id   = (isset($request->debt_id)      ? $request->debt_id : '' );
            $ssn    = (isset($request->ssn)       ? $request->ssn : '' );
            $first_name = (isset($request->first_name)    ? $request->first_name : '' );
            $last_name = (isset($request->last_name)    ? $request->last_name : '' );
            $phone = (isset($request->phone)    ? $request->phone : '' );
            $reference_number = (isset($request->reference_number)    ? $request->reference_number : '' );
            $status_code = (isset($request->status_code)    ? $request->status_code : '' );
            $state = (isset($request->state)    ? $request->state : '' );
            $warning = (isset($request->warning)    ? $request->warning : '' );


            $exacts = [ 'csv_data_file_id' => $portfolio, 'id' => $debt_id, 'reference_phone' => $reference_number,
                'state' => $state, 'status' => $status_code ];
            $likes = [ 'ssn' => $ssn, 'first_name' => $first_name, 'last_name' => $last_name, 'home_phone' => $phone, 'work_phone' => $phone ];

            $portfolio_model = new Portfolio;

            if($this->isArrayValuesEmpty($exacts) && $this->isArrayValuesEmpty($likes)){
                $validator->getMessageBag()->add('search', 'No search parameters entered');
            }else{
                $search_portfolios = $portfolio_model->searchAcounts( $exacts, $likes );
            }

            if(!empty($search_portfolios)){
                //echo "we found something" . count($search_portfolios);

                /*foreach($search_portfolios as $record){
                    foreach($record as $key => $value ){
                        //send back json for Javascript to Build HTML Results
                    }
                }*/

                return response()->json(['success'=>json_encode((array)$search_portfolios) ]);
            }else {
                $validator->getMessageBag()->add('search', 'No search results');
            }

        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    function isArrayValuesEmpty(array $array){
        if(count(array_filter($array)) == 0){
            return true;
        }
        return false;
    }

}
