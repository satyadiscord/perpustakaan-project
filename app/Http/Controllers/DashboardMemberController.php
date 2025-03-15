<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    //
    public function index(): View
    {
        return view('content.member.dashboard-member');
    }
}
