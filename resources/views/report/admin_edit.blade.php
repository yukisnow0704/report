@extends('layouts.report')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">記事構成作成</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <form action="#" method="get">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            構成情報
                        </div>
                        <div class="panel-body">
                            <input type="hidden" name="id" class="id" value="{{ $report['id'] }}">
                            <div class="col-md-12">
                                <label class="col-md-6">ファイル名</label>
                                <input type="text" name="filename" class="filename col-md-6" value="{{ $report['filename'] }}">
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">NO</label>
                                <input type="number" name="no" class="no col-md-6" value="{{ $report['no'] }}">
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">キーワード</label>
                                <input type="text" name="keyword" class="keyword col-md-6" value="{{ $keywords[$report['keyword_id']]['keyword'] }}">
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">担当者</label>
                                <select name="user">
                                    <option value="0">未選択</option>
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">完了</label>
                                <select name="complate" class="complate">
                                    @if($report['complate_at'])
                                        <option value="0">未完了</option>
                                        <option value="1" selected>完了</option>
                                    @else
                                        <option value="0" selected>未完了</option>
                                        <option value="1">完了</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-12">サブキーワード</label>
                                <div class="sub-keyword-list">
                                    @if(count($subKeywords) > 0)
                                        @foreach($subKeywords as $subKeyword)
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <input type="text" name="keyword" class="keyword col-md-9" value="{{ $keywords[$subKeyword['keyword_id']]['keyword'] }}">
                                            <div class="col-md-3">
                                                <a href="javascript:void(0);" class="btn btn-danger remove-keyword">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-success add-keyword" style="margin-left:5px;">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else 
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <input type="text" name="keyword" class="keyword col-md-9" value="">
                                            <div class="col-md-3">
                                                <a href="javascript:void(0);" class="btn btn-danger remove-keyword">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-success add-keyword" style="margin-left:5px;">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
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
                                <input type="text" name="title" class="title col-md-6" value="{{ $report['title'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            概要
                            <a href="javascript:void(0);" class="btn btn-success add-big-head">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="panel-body context">
                        @if($report['main'])
                        <?php $bigcount = 0; ?>
                            @foreach($report['main'] as $big)
                                <?php $bigcount++ ?>
                                <div class="col-md-12 big-head{{ $bigcount }}">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-12">大見出し{{ $bigcount }}</label>
                                        <input type="text" name="title" class="big-title col-md-12" value="{{ $big['title'] }}">
                                        <div class="col-md-12" style="margin-top:20px;">
                                            <label class="col-md-6">説明</label>
                                            <textarea class="big-context col-md-6">{{ $big['context'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="hidden" class="big-head-number" value="{{ $bigcount }}">
                                        <div class="col-md-9" style="margin-top:20px;">
                                            <a href="javascript:void(0);" class="btn btn-danger remove-big-head">
                                                <i class="fa fa-minus"></i> 大見出し削除
                                            </a>
                                        </div>
                                        <div class="col-md-9" style="margin-top:20px;">
                                            <a href="javascript:void(0);" class="btn btn-success add-middle-header">
                                                <i class="fa fa-plus"></i> 中見出し追加
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group middle-head">
                                    <?php $middlecount = 0; ?>
                                    @foreach($big['middle'] as $middle)
                                        <?php $middlecount++ ?>
                                        <div class="form-group middle-head{{ $middlecount }} col-sm-12">
                                            <div class="col-md-9">
                                                <label class="col-md-12">中見出し{{ $middlecount }}</label>
                                                <input type="text" name="middle-title" class="middle-title col-md-12" value="{{ $middle['title'] }}">
                                                <label class="col-md-6">説明</label>
                                                <textarea class="middle-context col-md-6">{{ $middle['context'] }}</textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="javascript:void(0);" class="btn btn-danger remove-middle-header">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>

                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            参考記事
                        </div>
                        <div class="panel-body url-list">
                            @if(count($reportUrls) > 1)
                                @foreach($reportUrls as $reportUrl)
                                <div class="col-md-12" style="margin-top:10px;">
                                    <label class="col-md-3 ">URL</label>
                                    <input type="text" name="url" class="url col-md-6" value"{{ $urls[$reportUrl['url_id']]['url'] }}">
                                    <div class="col-md-3">
                                        <a href="javascript:void(0);" class="btn btn-danger remove-url">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-success add-url" style="margin-left:5px;">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="col-md-12" style="margin-top:10px;">
                                    <label class="col-md-3 ">URL</label>
                                    <input type="text" name="url" class="url col-md-6">
                                    <div class="col-md-3">
                                        <a href="javascript:void(0);" class="btn btn-danger remove-url">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-success add-url" style="margin-left:5px;">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>                                        
                    <a href="javascript:void(0);" class="btn btn-success submit">
                        送信
                    </a>
                </form>
            </div>
        </div>
    </div>
 
    <script src="{{ asset('js/report_store.js')}}"></script>

@endsection
