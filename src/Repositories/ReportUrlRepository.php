<?php

namespace Src\Repositories;

use Log;
use App;

class ReportUrlRepository {

    public function getFromReportId($id) {

        $entities = \Src\Entities\ReportUrl::where('report_id', $id);

        return $entities;
    }
}
