<?php

namespace App\Http\Controllers;

use App;
use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function __construct() {
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


        // return $results;
        return view('report.staff_edit', [
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

        $reportService = App::make('\Src\Services\ReportService');
        $results = $reportService->update($id, $values);

        return $values['context'];
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
