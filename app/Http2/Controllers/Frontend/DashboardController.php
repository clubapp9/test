<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CsvData;


/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {

        return view('frontend.user.dashboard', compact('portfolio_ids'))
            ->withUser(access()->user());
    }
}
