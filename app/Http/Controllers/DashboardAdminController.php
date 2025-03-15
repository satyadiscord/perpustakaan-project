<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    //
    public function index(): View
    {
        return view('content.admin.dashboard-admin');
    }
}
