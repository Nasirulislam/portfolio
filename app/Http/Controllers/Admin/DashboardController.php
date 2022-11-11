<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index()
    {
        return view('admin.index',[
            'analytics' => (object)[
                'todaySales' => 0,
                'last30DaysRevenue' => 0,
                'totalCustomersThisYear' => 0,
            ],
            'recentSales' => []
        ]);

    }


}
