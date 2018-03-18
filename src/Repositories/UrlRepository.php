<?php

namespace Src\Repositories;

use Log;
use App;

class UrlRepository {

    public function find($id) {

        $entity = \Src\Entities\Url::find($id);

        return $entity;
    }

    public function getPost($url) {

        $entities = \Src\Entities\Url::where('url', $url)->get();

        if($entities->count() <= 0) {
            $entity = \Src\Entities\Url::create([
                'url' => $url,
            ]);

            return $entity;
        }

        return $entities[0];

    }
}
