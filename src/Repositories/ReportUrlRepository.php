<?php

namespace Src\Repositories;

use Log;
use App;

class ReportUrlRepository {

    public function getFromReportId($id) {

        $entities = \Src\Entities\ReportUrl::where('report_id', $id);

        return $entities;
    }

    public function getPost($report_id, $url_id) {

        $entities = \Src\Entities\ReportUrl::where('report_id', $report_id)
            ->where('url_id', $url_id)
            ->get();

        if($entities->count() <= 0) {
            $entity = \Src\Entities\ReportUrl::create([
                'report_id' => $report_id,
                'url_id' => $url_id
            ]);

            return $entity;
        }

        return $entities[0];

    }
}
