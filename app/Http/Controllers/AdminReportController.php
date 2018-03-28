<?php

namespace App\Http\Controllers;

use App;
use Log;
use Response;
use Redirect;
use Exception;
use ConfigService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

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

    public function importcsv(Request $request)
    {
        try{
            $file = $request->csvfile;
    
            if($file == null)
                throw new Exception('！！！ファイルを選択してください！！！');
                
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            if($fileExtension != 'csv')
                throw new Exception('！！！CSVファイルのみアップロード可能です！！！');
            
            $text = file_get_contents($file->path());
            
            $lines = explode("\r\n", $text); 
            if(count($lines) <= 1)
                throw new Exception('csvはヘッダーとデータ行の計２行以上である必要があります。');
                
            $hedderRowTextTemplate = "No,納品月,キーワード,種別,依頼ライター,ＫＷ発注日,ライター発注日,入れてほしいｋＷ①（マイナビ支給）,タイトル,概要,記事概要,参考ページ1,参考ページ2,参考ページ3,参考ページ4,参考ページ5,参考ページ6,参考ページ7,参考ページ8";
            if($hedderRowTextTemplate != $lines[0])
                throw new Exception('csvのフォーマットが変わっています。読み込めません。');

            $columnCount = count(explode(",",$hedderRowTextTemplate));
            $rows = array();
            foreach ($lines as $line) {
                $row = explode(",",$line);

                if($columnCount != count($row))
                    throw new Exception('次の行にカンマが多い、または少ないため読み込めません。'.$line);

                $rows[] = $row;
            } 
            
            // TODO csvの制御ライブラリの調査実装。
            // 現状上手く動かないので不完全ながら手書きでよしなに。
            // 現象：理由不明でカンマがエスケープされる。

            // $config = new LexerConfig();
            // $config->setDelimiter(",");

            // $interpreter = new Interpreter();
            // $lexer = new Lexer($config);
    
            // $interpreter->addObserver(function(array $row) use (&$rows) {
            //     $rows[] = $row;
            // });
    
            // $lexer->parse($file, $interpreter);
    
            $datas = array();

            foreach ($rows as $rowNo => $values) {
                if($rowNo == 0){
                    foreach($values as $columnNo => $value){
                        $columnNames[$columnNo] = $value;
                    }
                }else{
                    $data = array();
                    foreach($values as $columnNo => $value){
                        if($value == ''){
                            $data[$columnNames[$columnNo]] = null;
                        }else{
                            $data[$columnNames[$columnNo]] = $value;
                        }
                    }
                    $datas[] = $data;
                }
            }

            $keywordRepository = App::make('\Src\Repositories\KeywordRepository');
            $subKeywordRepository = App::make('\Src\Repositories\SubKeywordRepository');
            $reportRepository = App::make('\Src\Repositories\ReportRepository');
            $reportUrlRepository = App::make('\Src\Repositories\ReportUrlRepository');
            $urlRepository = App::make('\Src\Repositories\UrlRepository');
            foreach($datas as $data){

                $mainKeywordEntity = $keywordRepository->getPost($data['キーワード']);

                $report = array();
                
                $report['id'] = null;
                $report['filename'] = $fileName;
                $report['no'] = $data['No'];
                $report['delivery_at'] = $data['納品月'];
                $report['keyword_id'] = $mainKeywordEntity->id;
                $report['request_writer'] = $data['依頼ライター'];
                $report['request_date'] = $data['ライター発注日'];
                $report['title'] = $data['タイトル'];
                $report['main'] = json_encode($data);
                $report['import_at'] = date("Y-m-d H:i:s");

                // TODO ユーザー管理
                $report['user_id'] = 1;
                $report['token'] = 0;

                $reportEntity = $reportRepository->getPost($report);

                // サブキーワードの登録
                $subKeywordText = str_replace("　", " ", $data['入れてほしいｋＷ①（マイナビ支給）']);
                $subKeywords = explode(" ", $subKeywordText);
                foreach($subKeywords as $subKeyword){
                    $keywordEntity = $keywordRepository->getPost($data['キーワード']);
                    $subKeywordEntity = $subKeywordRepository->getPost($reportEntity->id, $keywordEntity->id);
                }

                // URLの登録
                if($data['参考ページ1'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ1']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ2'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ2']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ3'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ3']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ4'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ4']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ5'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ5']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ6'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ6']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ7'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ7']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
                if($data['参考ページ8'] != null){
                    $urlEntity = $urlRepository->getPost($data['参考ページ8']);
                    $subKeywordEntity = $reportUrlRepository->getPost($reportEntity->id, $urlEntity->id);
                }
            }



        }catch(Exception $e){
            return redirect('/report/import')->with('csv_error_message', $e->getMessage());
        }

        return redirect('/report/import')->with('csv_message', '正常に完了しました。');

    }

}
