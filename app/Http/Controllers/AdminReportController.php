<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;

class AdminReportController extends Controller
{
    public function __construct() {
    }

    public function index()
    {
        $reportService = App::make('\Src\Services\ReportService');
        $results = $reportService->getAll();

        return view('report.list', [
            'reports' => $results['report'],
            'keywords' => $results['keyword']
        ]);
    }

    public function edit($token)
    {
        $reportService = App::make('\Src\Services\ReportService');
        $results = $reportService->getFromToken($token);

        return view('mock.report_store');
    }
}
