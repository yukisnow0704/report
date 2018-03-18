<?php

namespace App\Http\Controllers;

use App;
use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReportController extends Controller
{
    public function __construct() {
    }

    public function index()
    {
        $adminReportService = App::make('\Src\Services\AdminReportService');
        $results = $adminReportService->getAll();

        return view('report.list', [
            'reports' => $results['report'],
            'keywords' => $results['keyword']
        ]);
    }

    public function edit($token)
    {
        $reportService = App::make('\Src\Services\ReportService');
        $results = $reportService->getFromToken($token);

        // Log::debug($results['reportUrls']);

        if($results['report']['main']) {
            $results['report']['main'] = json_decode(str_replace('&quot;','"',$results['report']['main']),true);
            $results['report']['main'] = json_decode(str_replace('&quot;','"',$results['report']['main']),true);
        }

        return view('report.admin_edit', [
            'report' => $results['report'],
            'keywords' => $results['keywords'],
            'subKeywords' => $results['subkeywords'],
            'reportUrls' => $results['reportUrls'],
            'urls' => $results['urls']
        ]);
    }

    public function update(Request $request, $id)
    {
        $values = $request->input('values');

        $adminReportService = App::make('\Src\Services\AdminReportService');
        $results = $adminReportService->update($id, $values);

        return $values['context'];
    }
}
