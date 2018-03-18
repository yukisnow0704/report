<?php

namespace Src\Services;

use Log;
use App;

class AdminReportService {
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

    public function update($id, $values) {
        $results = null;

        // subkeywordを更新
        $keywordRepository = App::make('\Src\Repositories\KeywordRepository');
        $subKeywordRepository = App::make('\Src\Repositories\SubKeywordRepository');
        foreach($values['subkeywords'] as $keyword) {
            if($keyword) {
                $keywordEntity = $keywordRepository->getPost($keyword);
                $subkeywords = $subKeywordRepository->getPost($id, $keywordEntity->id);
            }
        }

        // urlを更新
        $urlRepository = App::make('\Src\Repositories\UrlRepository');
        $reportUrlRepository = App::make('\Src\Repositories\ReportUrlRepository');
        foreach($values['urls'] as $url) {
            if($url) {
                $urlEntity = $urlRepository->getPost($url);
                $reporturl = $reportUrlRepository->getPost($id, $urlEntity->id);
            }
        }

        $keywordEntity = $keywordRepository->getPost($values['keyword']);
        $values['keyword_id'] = $keywordEntity->id;

        // 本体を更新
        $reportRepository = App::make('\Src\Repositories\ReportRepository');
        $results = $reportRepository->adminUpdate($id, $values);

    }
}
