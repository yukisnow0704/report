<?php

namespace Src\Repositories;

use Log;
use App;
use Carbon\Carbon;

class ReportRepository {

    public function getAll() {

        $entities = \Src\Entities\Report::all();

        return $entities;
    }

    public function getFromToken($token) {

        $entity = \Src\Entities\Report::where('token', $token)->first();

        return $entity;

    }

    public function update($id, $values) {
        Log::debug($id);

        $entity = \Src\Entities\Report::find($id);

        if ($entity == null) {
            throw new \Exception("レコードが見つかりません。");
        }

        //下記以外は更新不可
        // TODO USER_ID
        $entity->main = json_encode($values['context']);
        $entity->title = $values['title'];

        $entity->save();
    }

    public function getPost($report) {

        $report_id = $report['id'];
            $entities = \Src\Entities\report::where('id', $report_id)->get();

        if($entities->count() <= 0) {
            $entity = \Src\Entities\report::create($report);

            return $entity;
        }

        return $entities[0];

    }

    public function adminUpdate($id, $values) {

        $entity = \Src\Entities\Report::find($id);

        if ($entity == null) {
            throw new \Exception("レコードが見つかりません。");
        }

        Log::debug(json_encode($values['context']));
        //下記以外は更新不可
        // TODO USER_ID
        $entity->filename = $values['filename'];
        $entity->no = $values['no'];
        $entity->main = json_encode($values['context']);
        $entity->keyword_id = $values['keyword_id'];
        $entity->title = $values['title'];

        if($values['complate']) {
            $entity->complate_at = Carbon::now();
        } else {
            $entity->complate_at = null;
        }

        $entity->save();
    }
}
