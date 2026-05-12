<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin/dashboard');
    }
    public function adminAnalytics(){
        return view('admin/analytics');
    }
    public function adminProducts(){
        return view('admin/addProducts');
    }
    public function ordersPage(){
        return view('admin/orders');
    }
    public function customerPage(){
        return view('admin/customers');
    }
    public function manageProducts(){
        return view('admin/manageProducts');
    }
}