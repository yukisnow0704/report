<?php

namespace Src\Repositories;

use Log;
use App;

class ReportRepository {

    public function getAll() {

        $entities = \Src\Entities\Report::all();

        return $entities;
    }

    public function getFromToken($token) {

        $entity = \Src\Entities\Report::where('token', $token)->first();

        return $entity;

    }
}
