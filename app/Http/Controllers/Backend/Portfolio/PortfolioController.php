<?php

namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Portfolio;
use App\Models\CsvData;
use App\Models\Access\User\User;
use App\Models\AssnCollectorAccounts;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PortfolioController extends Controller
{
    public function assign()
    {

        $User = new User;
        $collector_ids = $User->getCollectorIDs();

        $assn_collector_accounts = new AssnCollectorAccounts;
        $collector_assign_stats = $assn_collector_accounts->getCollectorAssignedAccountsList();

        $Portfolio = new CsvData();
        $portfolio_ids = $Portfolio->getAllPortfolios();

        return view('backend.portfolio.assign' , compact('collector_ids', 'portfolio_ids', 'collector_assign_stats' ) );
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $portfolio = Portfolio::paginate(15);

        return view('backend.portfolio.index', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.portfolio.create');
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
