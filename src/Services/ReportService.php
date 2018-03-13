<?php

namespace Src\Services;

use Log;
use App;

class ReportService {
    private static $configs = array();

    public function getAll() {

        $results = null;

        $results = array();

        $reportRepository = App::make('\Src\Repositories\ReportRepository');
        $results['report'] = $reportRepository->getAll();

        $keywordRepository = App::make('\Src\Repositories\KeywordRepository');
        $keywords = array();
        
        foreach($results['report'] as $report) {
            $keywords[$report['keyword_id']] = $keywordRepository->find($report['keyword_id']);
        }

        $results['keyword'] = $keywords;

        return $results;

    }

    public function getFromToken($token) {

        $results = null;

        $results = array();

        // tokenに剃ったレポートを取得
        $reportRepository = App::make('\Src\Repositories\ReportRepository');
        $results['report'] = $reportRepository->getFromToken($token);

        // サブキーワードIDを取得
        $subKeywordRepository = App::make('\Src\Repositories\SubKeywordRepository');
        $results['subkeywords'] = $subKeywordRepository->getFromReportId($results['report']['id']);

        $keywordRepository = App::make('\Src\Repositories\KeywordRepository');
        $keywords = array();
        
        $keywords[$results['report']['keyword_id']] = $keywordRepository->find($results['report']['keyword_id']);

        foreach($results['subkeywords'] as $subkeyword) {
            $keywords[$subkeyword['keyword_id']] = $keywordRepository->find($subkeyword['keyword_id']);
        }

        $results['keywords'] = $keywords;

        // Urlの一覧を取得
        $reportUrlRepository = App::make('\Src\Repositories\ReportUrlRepository');
        $results['reportUrls'] = $reportUrlRepository->getFromReportId($results['report']['id']);

        $urlRepository = App::make('\Src\Repositories\UrlRepository');
        $urls = array();

        foreach($results['reportUrls'] as $reportUrl) {
            $urls[$reportUrl['url_id']] = $urlRepository->find($reportUrl['url_id']);
        }

        $results['urls'] = $urls;

        return $results;


    }
}
