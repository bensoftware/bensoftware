<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
    	switch (Auth::user()->sys_types_user_id) {
    		case '1':
    			$type = 'demandeur';
    			break;
    		case '2':
    			$type = 'agent';
    			break;
    		case '3':
    			$type = 'employeur';
    			break;
    		case '4':
    			$type = 'centre';
    			break;
    		
    		default:
    			$type = '';
    			break;
    	}
        return view('dashboards.'.$type);
    }
}
