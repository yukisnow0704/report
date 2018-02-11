<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminReportController extends Controller
{
    public function __construct() {
    }

    public function index()
    {
        return view('mock.report_list');
    }

    public function edit($token)
    {
        return view('mock.report_store');
    }
}
