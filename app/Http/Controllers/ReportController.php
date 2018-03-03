<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function __construct() {
    }

    public function edit($token)
    {
        return view('mock.report_store_staff');
    }

    public function import()
    {
        return view('mock.report_import');
    }

    public function export()
    {
        return view('mock.report_export');
    }
}
