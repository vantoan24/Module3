<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DB;

class DBController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {       
        return view('admin.dashboard.index');
    }
}
