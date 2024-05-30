<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if( $usertype == 'user')
            {
                return view('user.beranda');
            }

            else if( $usertype == 'admin')
            {
                $count = Mahasiswa::count();
                $acceptedCount = Mahasiswa::where('status', 'diterima')->count();
                $pemagang = Mahasiswa::paginate(3);
                
                return view('admin.dashboard-admin', compact('count', 'acceptedCount', 'pemagang'));

            }

            else
            {
                return redirect()->back();
            }
        }
    }
}