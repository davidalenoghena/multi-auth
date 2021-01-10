<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $agents = DB::table('agents')
                            ->orderBy('id', 'desc')
                            ->get();
        $posts = DB::table('posts')
                            ->orderBy('id', 'desc')
                            ->paginate(6);
        return view('admin',
        [
            'posts' =>  $posts,
            'agents' =>  $agents
        ]);
    }
}
