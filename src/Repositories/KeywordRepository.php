<?php

namespace Src\Repositories;

use Log;
use App;

class KeywordRepository {

    public function find($id) {

        $entity = \Src\Entities\Keyword::find($id);

        return $entity;
    }

    public function getPost($keyword) {

        $entities = \Src\Entities\Keyword::where('keyword', $keyword)->get();

        if($entities->count() <= 0) {
            $entity = \Src\Entities\Keyword::create([
                'keyword' => $keyword,
            ]);

            return $entity;
        }

        return $entities[0];

    }
}
