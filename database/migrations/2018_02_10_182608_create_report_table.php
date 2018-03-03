<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            // ID
            $table->increments('id');
            // ファイル名
            $table->string('filename');
            // インポート日時
            $table->dateTime('import_at');
            // NO
            $table->integer('no');
            // 納品日
            $table->date('delivery_at');
            // KeywordID
            $table->integer('keyword_id')->unsigned();
            // TOKEN
            $table->string('token');
            // 依頼ライター
            $table->string('request_writer');
            // KW依頼日
            $table->date('request_date');
            // USER_ID
            $table->integer('user_id')->unsigned();
            // 記事タイトル
            $table->string('title');
            // 記事内容
            $table->json('main');
            // 完了日時
            $table->dateTime('complate_at');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('keyword_id')
                ->references('id')
                ->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
