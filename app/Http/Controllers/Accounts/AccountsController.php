<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    //
    public function dashboard(){
        return view('adminPanel/dashboard');
    }
    
}
