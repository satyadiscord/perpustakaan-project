<?php

namespace App\Http\Controllers\Member;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengembalianBukuMemberController extends Controller
{
    //
    public function index(): View
    {
        return view('content.member.kembali-buku-member');
    }
}
