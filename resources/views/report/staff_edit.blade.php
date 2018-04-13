@extends('layouts.report_staff')

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
                            <input type="hidden" name="id" class="id" value="{{ $report['id'] }}">
                            <div class="col-md-12">
                                <label class="col-md-6">ファイル名</label>
                                <span class="filename col-md-6">{{ $report['filename'] }}</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">NO</label>
                                <span class="no col-md-6">{{ $report['no'] }}</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">キーワード</label>
                                <span class="keyword-main col-md-6">{{ $keywords[$report['keyword_id']]['keyword'] }}</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">担当者</label>
                                <span class="complate col-md-6"></span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">完了</label>
                                <span class="keyword col-md-6">
                                    @if($report['complate_at'])
                                        完了
                                    @else
                                        未完了
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">サブキーワード</label>
                                <div class="col-md-6 sub-keyword-list" style="margin-top:10px;">
                                    @if(count($subKeywords) > 0)
                                        @foreach($subKeywords as $subKeyword)
                                            <span class="keyword col-md-12">{{ $keywords[$subKeyword['keyword_id']]['keyword'] }}</span>
                                        @endforeach
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
                                            <div class="col-md-8">
                                                <label class="col-md-12">中見出し{{ $middlecount }}</label>
                                                <input type="text" name="middle-title" class="middle-title col-md-12" value="{{ $middle['title'] }}">
                                                <label class="col-md-6">説明</label>
                                                <textarea class="middle-context col-md-6">{{ $middle['context'] }}</textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:void(0);" class="btn btn-danger remove-middle-header">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="javascript:void(0);" class="shotcat-input btn btn-default">
                                                    見出し説明
                                                    <input type="hidden" class="add-context" value="大見出し{{ $bigcount }}では、">
                                                </a>
                                                <a href="javascript:void(0);" class="shotcat-input btn btn-default">
                                                    使用KW
                                                    <input type="hidden" class="add-context" value="また下記のキーワードを使用してください。">
                                                </a>
                                                <a href="javascript:void(0);" class="shotcat-input btn btn-default">
                                                    記載内容
                                                    <input type="hidden" class="add-context" value="を記載してください。 ">
                                                </a>
                                                <a href="javascript:void(0);" class="shotcat-input btn btn-default">
                                                    説明内容
                                                    <input type="hidden" class="add-context" value="を説明してください。 ">
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
                                <input type="text" name="url" class="url col-md-6" value="{{ $urls[$reportUrl['url_id']]['url'] }}">
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
                    <a href="javascript:void(0);" class="btn btn-success submit" style="margin-bottom:50px;">
                        送信
                    </a>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <script src="{{ asset('js/report_store.js')}}"></script>

@endsection
