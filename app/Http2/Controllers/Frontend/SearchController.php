<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SearchController extends Controller
{
    protected $page_category;

    /*public function __construct($page_category) {
        $this->page_category = $page_category;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = User::with('Profile')->where('status', 1)->whereHas('Profile', function($q){
            $q->where('gender', 'Male');
        })->get();

        return view('ContentEntryModel.index', compact('ContentEntryModel'));
    }

}
