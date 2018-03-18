<?php

namespace Src\Repositories;

use Log;
use App;

class SubKeywordRepository {

    public function getFromReportId($id) {

        $entities = \Src\Entities\ReportSubKeyword::where('report_id', $id)->get();

        return $entities;
    }

    public function getPost($report_id, $keyword_id) {

        $entities = \Src\Entities\ReportSubKeyword::where('report_id', $report_id)
            ->where('keyword_id', $keyword_id)
            ->get();

        if($entities->count() <= 0) {
            $entity = \Src\Entities\ReportSubKeyword::create([
                'report_id' => $report_id,
                'keyword_id' => $keyword_id
            ]);

            return $entity;
        }

        return $entities[0];

    }
}
