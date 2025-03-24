<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //view untuk admin (/admin/dashboard/member)

    // mengambil semua user. kecuali admin
    public function member(Request $request): View
    {
        // mengambil role member saja
        // $members = User::where('role', 'member')->get();
        
        // melakukan search name member
        $search = $request->input('search');
        $query = User::where('role', 'member');

        if (!empty($search)) {
            // query untuk mencari member berdasarkan dari nama member
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $members = $query->get();

        return view('content.admin.member', compact('members', 'search'));
    }
}
