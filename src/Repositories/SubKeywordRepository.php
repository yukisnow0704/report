<?php

namespace Src\Repositories;

use Log;
use App;

class SubKeywordRepository {

    public function getFromReportId($id) {

        $entities = \Src\Entities\ReportSubKeyword::where('report_id', $id)->get();

        return $entities;
    }
}
