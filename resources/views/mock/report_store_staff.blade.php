@extends('layouts.default')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">記事構成作成</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <!-- <form action="#"> -->
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            構成情報
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <label class="col-md-6">ファイル名</label>
                                <span class="filename col-md-6">構成案サンプル0208.xlsx</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">NO</label>
                                <span class="no col-md-6">1</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">キーワード</label>
                                <span class="keyword col-md-6">ベビーサイン</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">担当者</label>
                                <span class="keyword col-md-6"></span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">完了</label>
                                <span class="keyword col-md-6">未完了</span>
                            </div>
                            <div class="col-md-12 sub-keyword-list" style="margin-top:10px;">
                                <label class="col-md-6">サブキーワード</label>
                                <div class="col-md-6" style="margin-top:10px;">
                                    <span class="keyword1 col-md-12">いつから</span>
                                    <span class="keyword2 col-md-12">本</span>
                                    <span class="keyword3 col-md-12">体験</span>
                                    <span class="keyword4 col-md-12">ベビーサイン協会</span>
                                    <span class="keyword5 col-md-12">イオン</span>
                                    <span class="keyword6 col-md-12">種類</span>
                                    <span class="keyword7 col-md-12">おしまい</span>
                                    <span class="keyword8 col-md-12">おむつ</span>
                                    <span class="keyword9 col-md-12">痛い</span>
                                    <span class="keyword10 col-md-12">ごはん</span>
                                    <span class="keyword11 col-md-12">イオン</span>
                                    <span class="keyword12 col-md-12">ちょうだい</span>
                                    <span class="keyword13 col-md-12">おいしい</span>
                                    <span class="keyword13 col-md-12">食べる</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            構成一覧
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <label class="col-md-6">タイトル</label>
                                <input type="text" name="title" class="title col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            概要
                            <button class="btn btn-success add-big-head">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12 big-head1">
                                <div class="form-group col-md-8">
                                    <label class="col-md-12">大見出し1</label>
                                    <input type="text" name="title" class="col-md-12">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <label class="col-md-6">説明</label>
                                        <textarea class="col-md-6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" class="big-head-number" value="1">
                                    <div class="col-md-9" style="margin-top:20px;">
                                        <button class="btn btn-danger remove-big-head">
                                            <i class="fa fa-minus"></i> 大見出し削除
                                        </button>
                                    </div>
                                    <div class="col-md-9" style="margin-top:20px;">
                                        <button class="btn btn-success add-middle-header">
                                            <i class="fa fa-plus"></i> 中見出し追加
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group middle-head">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            参考記事
                        </div>
                        <div class="panel-body url-list">
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-3 ">URL</label>
                                <input type="text" name="url" class="url1 col-md-6">
                                <div class="col-md-3">
                                    <button type="delete" class="btn btn-danger remove-url">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="add" class="btn btn-success add-url" style="margin-left:5px;">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <script>
        var focus = 0;
        var json = [];
        $(".panel-body").on("click", '.add-middle-header',function() {
            var bigKey = $(this).parent().parent().find('.big-head-number').val();
            var key = $('.big-head' + bigKey + ' > .middle-head' ).children().length;
            var middleKey = parseInt(key) + 1;
            var html = '<div class="form-group middle-head' + middleKey + ' col-sm-12">';
            html += '<div class="col-md-9">';
            html += '<label class="col-md-12">中見出し' + middleKey + '</label>';
            html += '<input type="text" name="title" class="col-md-12">';
            html += '<label class="col-md-6">説明</label>';
            html += '<textarea class="col-md-6"></textarea>';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<button class="btn btn-danger remove-middle-header">';
            html += '<i class="fa fa-minus"></i>';
            html += '</button>';
            html += '</div>';
            html += '</div>';
            
            $('.big-head' + bigKey + ' > .middle-head' ).append(html);
        });
        $(".panel-body").on("click", '.remove-middle-header', function() {
            $(this).parent().parent().remove();
        });
        $(".panel-body").on("click", '.add-url',function() {
            var bigKey = $(this).parent().find('.big-head-number').val();
            var key = $('.url-list' ).children().length + 1;
            var html = '<div class="col-md-12" style="margin-top:10px;">';
            html += '<label class="col-md-3 ">URL</label>';
            html += '<input type="text" name="url" class="url' + key + ' col-md-6">';
            html += '<div class="col-md-3">';
            html += '<button type="delete" class="btn btn-danger remove-url">';
            html += '<i class="fa fa-minus"></i>';
            html += '</button>';
            html += '<button type="add" class="btn btn-success add-url" style="margin-left:5px;">';
            html += '<i class="fa fa-plus"></i>';
            html += '</button>';
            html += '</div>';
            html += '</div>';
            
            $('.url-list' ).append(html);
        });
        $(".panel-body").on("click", '.remove-url', function() {
            $(this).parent().parent().remove();
        });
        $(".panel-heading").on("click", '.add-big-head',function() {
            var key = $(this).parent().parent().find('.panel-body').children().length + 1;
            var html = '<div class="col-md-12 big-head' + key + '">';
            html += '<div class="form-group col-md-8">';
            html += '<label class="col-md-12">大見出し' + key + '</label>';
            html += '<input type="text" name="title" class="col-md-12">';
            html += '<div class="col-md-12" style="margin-top:20px;">';
            html += '<label class="col-md-6">説明</label>';
            html += '<textarea class="col-md-6"></textarea>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-4">';
            html += '<input type="hidden" class="big-head-number" value="' + key + '">';
            html += '<div class="col-md-9" style="margin-top:20px;">';
            html += '<button class="btn btn-danger remove-big-head">';
            html += '<i class="fa fa-minus"></i> 大見出し削除';
            html += '</button>';
            html += '</div>';
            html += '<div class="col-md-9" style="margin-top:20px;">';
            html += '<button class="btn btn-success add-middle-header">';
            html += '<i class="fa fa-plus"></i> 中見出し追加';
            html += '</button>';
            html += '</div>';
            html += '</div>';
            html += '<div class="form-group middle-head">';
            html += '</div>';
            html += '</div>';
            $(this).parent().parent().find('.panel-body').append(html);
        });

        $(".panel-body").on("click", '.remove-big-head', function() {
            $(this).parent().parent().parent().remove();
        });

        $(".panel-body").on("click", '.add-keyword',function() {
            var key = $('.sub-keyword-list').children().length + 1;
            var html = '<div class="col-md-12" style="margin-top:10px;">';
            html += '<label class="col-md-3 ">URL</label>';
            html += '<input type="text" name="url" class="url' + key + ' col-md-6">';
            html += '<div class="col-md-3">';
            html += '<button type="delete" class="btn btn-danger remove-url">';
            html += '<i class="fa fa-minus"></i>';
            html += '</button>';
            html += '<button type="add" class="btn btn-success add-url" style="margin-left:5px;">';
            html += '<i class="fa fa-plus"></i>';
            html += '</button>';
            html += '</div>';
            html += '</div>';

            var html = '<div class="col-md-12" style="margin-top:10px;">';
            html += '<input type="text" name="keyword' + key + '" class="keyword' + key + ' col-md-9">';
            html += '<div class="col-md-3">';
            html += '<button type="delete" class="btn btn-danger remove-keyword">';
            html += '<i class="fa fa-minus"></i>';
            html += '</button>';
            html += '<button type="add" class="btn btn-success add-keyword" style="margin-left:5px;">';
            html += '<i class="fa fa-plus"></i>';
            html += '</button>';
            html += '</div>';
            
            $('.sub-keyword-list').append(html);
        });
        $(".panel-body").on("click", '.remove-keyword', function() {
            $(this).parent().parent().remove();
        });
    </script>

@endsection
