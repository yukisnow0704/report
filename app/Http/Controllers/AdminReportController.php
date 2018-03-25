<?php

namespace App\Http\Controllers;

use App;
use Log;
use Response;
use ConfigService;
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

    public function getCsv()
    {
        $adminReportService = App::make('\Src\Services\AdminReportService');
        $results = $adminReportService->getAll();

        $stream = '';

        $csvdate = '"ファイル名",';
        $csvdate .= '"インポート日時",';
        $csvdate .= '"No",';
        $csvdate .= '"納品年月",';
        $csvdate .= '"キーワード",';
        $csvdate .= '"種別",';
        $csvdate .= '"URL",';
        $csvdate .= '"担当者",';
        $csvdate .= '"更新日時",';
        $csvdate .= '"完了"';
        $csvdate .= PHP_EOL;
        
        // $csvdate = '';
        // foreach ($csvHeader as $date) {
        //     $csvdate .= '"' . $date . '"' . ",";
        // }
        // $csvdate = substr($csvdate, 0, -1) . PHP_EOL;
        // $csvdate .= PHP_EOL;
        $stream .= $csvdate;

        $keywords = $results['keyword'];
        
        foreach ($results['report'] as $report) {
            $csvdate = '"' . $report['filename'] . '"' . ',';
            $csvdate .= '"' . $report['import_at'] . '"' . ',';
            $csvdate .= '"' . $report['no'] . '"' . ',';
            $csvdate .= '"' . $report['request_date'] . '"' . ',';
            $csvdate .= '"' . $keywords[$report['keyword_id']]['keyword'] . '"' . ',';
            $csvdate .= '"' . '' . '"' . ',';
            $csvdate .= '"' . ConfigService::get('app.url') . '/contact/report/' . $report['token'] . '"' . ',';
            $csvdate .= '"' . $report['user_id'] . '"' . ',';
            $csvdate .= '"' . date('Y-m-d H:m:s', strtotime($report['updated_at'])) . '"' . ',';
            $csvdate .= '"' . date('Y-m-d H:m:s', strtotime($report['complate_at'])) . '"';
            $csvdate .= PHP_EOL;
            
            $stream .= $csvdate;
        }

        $csv = mb_convert_encoding($stream,"SJIS","UTF-8");
        // return $csv;
        // rewind($stream);
        
        // $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="reports.csv"',
        );
        return Response::make($csv, 200, $headers);
        
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
