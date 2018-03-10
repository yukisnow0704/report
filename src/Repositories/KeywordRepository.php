<?php

namespace Src\Repositories;

use Log;
use App;

class KeywordRepository {

    public function find($id) {

        $entity = \Src\Entities\Keyword::find($id);

        return $entity;
    }
}
