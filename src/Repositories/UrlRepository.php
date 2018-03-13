<?php

namespace Src\Repositories;

use Log;
use App;

class UrlRepository {

    public function find($id) {

        $entity = \Src\Entities\Url::find($id);

        return $entity;
    }
}
