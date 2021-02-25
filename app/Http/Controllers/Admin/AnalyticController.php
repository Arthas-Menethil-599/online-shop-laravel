<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    public function index()
    {
        $qtySoldProducts = Analytic::query()
            ->sum('qtySoldProducts');
        $earnedMoney = Analytic::query()
            ->sum('earnedMoney');
        return view('admin.home.payments', ['earnedMoney' => $earnedMoney, 'qtySoldProducts' => $qtySoldProducts]);
    }
}
