<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //view untuk admin (/admin/dashboard/member)
    public function member(): View
    {
        return view('content.admin.member');
    }
}
