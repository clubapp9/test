<?php

namespace App\Http\Controllers\Frontend\Accounts;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Notes;
use App\Models\Phones;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Validator;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($account)
    {
        if($account){

            //Collector IDs for DropDown
            $User = new User;
            $collector_ids = $User->getCollectorIDs();


                $portfolio_model = new Portfolio;

                $exacts = ['id' => $account];

                $account_result = $portfolio_model->searchAcounts( $exacts );

            if(!empty($account_result)) {
                //Get Phone Entries
                $phones = Phones::where(function($query) use ($account) { $query->where('account_id', '=', $account); }) ->get();

                //Get Note Entries
                $notes_model = new Notes;
                $notes = $notes_model->getNotesByAccountId( $account );

            }else {
                $account_result = '';
            }

        }else{
            echo "Error:  There is no account to show.";
        }

        return view('frontend.accounts', compact('account_result', 'collector_ids', 'notes', 'phones' ));
    }


    public function addNote(Request $request){
        $currently_logged_in_user =  Auth::id();
        return redirect()->back();
    }

    public function myAccounts(){
        $accounts_model = new Portfolio;
       // $my_accounts = $accounts_model->getMyAccounts( Auth::id() );

        return view ('frontend.my_accounts', compact( 'my_accounts' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', ]);

        Portfolio::create($request->all());

        Session::flash('flash_message', 'Portfolio added!');

        return redirect('portfolio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('backend.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('backend.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($request->all());

        Session::flash('flash_message', 'Portfolio updated!');

        return redirect('admin/portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Portfolio::destroy($id);

        Session::flash('flash_message', 'Portfolio deleted!');

        return redirect('admin/portfolio');
    }

}
