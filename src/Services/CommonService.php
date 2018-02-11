<?php

namespace Src\Services;

use DB;
use App;
use Auth;
use File;
use Log;
use Session;
use Smt\Entities\JobSession;

class CommonService{

    /**
     * システム管理者 or 運営会社編集者 or 運営会社閲覧者
     * @return boolean [description]
     */
    public static function isLsd() {
        $result = false;
        if(Auth::User()->hasRole('システム管理者') == 1 || Auth::User()->hasRole('運営会社編集者') == 1 || Auth::User()->hasRole('運営会社閲覧者') == 1){
            $result = true;
        }

        return $result;
    }

    /**
     * システム管理者 or アカウント管理者
     * @return boolean [description]
     */
    public static function isAdmin() {
        $result = false;
        if(Auth::User()->hasRole('システム管理者') == 1 || Auth::User()->hasRole('アカウント管理者') == 1){
            $result = true;
        }

        return $result;
    }

    /**
     * 運営会社編集者 or 編集者
     * @return boolean [description]
     */
    public static function isEditor() {
        $result = false;
        if(Auth::User()->hasRole('運営会社編集者') == 1 || Auth::User()->hasRole('編集者') == 1){
            $result = true;
        }

        return $result;
    }

    /**
     * 運営会社閲覧者 or 閲覧者
     * @return boolean [description]
     */
    public static function isViewer() {
        $result = false;
        if (Auth::User()->hasRole('運営会社閲覧者') == 1 || Auth::User()->hasRole('閲覧者') == 1) {
            $result = true;
        }

        return $result;
    }

    /**
     * //debug, info, notice, warning, error, critical, alert
     * @param  [type] $response  [description]
     * @param  [type] $procName  [description]
     * @param  string $logLevel  [description]
     * @param  [type] $errorCode [description]
     * @param  [type] $th        [description]
     * @param  [type] $debugInfo [description]
     * @return [type] [description]
     */
    public static function getErrorResponse($response, $procName, $logLevel = 'error', $errorCode = null, $th = null, $debugInfo = null) {

        $response->isSucceeded = false;
        $response->logLevel = $logLevel;
        $response->errorCode = $errorCode;
        $response->errorMessage = $procName.'中にエラーが起きました。';
        $response->debugErrorInfo = $debugInfo;

        if ($th != null) {
            $response->debugErrorInfo .= ' '.$th->getMessage();
        }

        Log::$logLevel($response->errorMessage, ['errorCode' => $response->errorCode, 'ErrorInfo' => $response->debugErrorInfo]);
        Log::$logLevel($response->debugErrorInfo, ['errorCode' => $response->errorCode]);

        if ($th != null) {
            Log::$logLevel($th->getTraceAsString(), []);
        }

        return $response;
    }

    /**
     * 本日に日付を取得する
     * @param  boolean $exactDate データの取得の際の未使用することを想定したパラメータ。
     *                            セッション変数が存在したらそれを使用する。それ以外でデバッグモードで指定があればそれを使用する。
     * @return [type]  [description]
     */
    public static function getToday($exactDate = true ) {

        $result = date('Y-m-d');

        if($exactDate){
            return $result;
        }

        if(ConfigService::get('app.debug')){

            try{
                $todayStr = ConfigService::get('app.today');

//Log::debug("CommonService->getToday", ['todayStr' => $todayStr]);
                if($todayStr != null)
                    $result =  date('Y-m-d', strtotime($todayStr));
            }catch(\Throwable $th){
                throw new \Exception('.env のapp.todayが不正です。');
            }
        }

        if(Session::has('today')){
            //本日を変更している 再優先
            $result = Session::get('today');
        }

//Log::debug("CommonService->getToday", ['exactDate' => $exactDate, 'todayStr' => $result, 'todayStr' => $result]);
        return $result;
    }

    /**
     * [getYesterday description]
     * @return [integer] 秒数
     */
    public static function getYesterday($date = null, $exactDate = true) {

        if($date == null)
            $date = self::getToday($exactDate);

        $todayDateTime = strtotime($date);
        $yesterdayDateTime = strtotime('-1 day', $todayDateTime);

        $result =  date('Y-m-d', $yesterdayDateTime);

        return $result;
    }

    /**
     * [getYesterday description]
     */
    public static function getNextday($date = null, $exactDate = true) {

        if($date == null)
            $date = self::getToday($exactDate);

        $todayDateTime = strtotime($date);
        $nextDayDateTime = strtotime('+1 day', $todayDateTime);

        $result =  date('Y-m-d', $nextDayDateTime);

        return $result;
    }

    /**
     * [getEndOfNextMonth description]
     */
    public static function getEndOfNextMonth($date = null) {

        if($date == null){
            $date = date('Y-m-01');
        }else{
            $date = date('Y-m-01', strtotime($date));
        }

        $result = date('Y-m-t', strtotime($date.'+1 month'));

        return $result;
    }

    /**
     * [getEndOfPreviousMonth description]
     */
    public static function getEndOfPreviousMonth($date = null) {

        if($date == null){
            $date = date('Y-m-01');
        }else{
            $date = date('Y-m-01', strtotime($date));
        }

        $result =  date('Y-m-t', strtotime($date.'-1 month'));

        return $result;
    }

    /**
     * [getTodayTime description]
     * @return [integer] 秒数
     */
    public static function getTodayTime() {

        $result = strtotime(date('Y-m-d H:i:s'));

        return $result;
    }

    /**
     * [getTodayTime description]
     * @return [integer]
     */
    public static function getTodayStartDateTime() {

        $result = date('Y-m-d 0:0:0');

        return $result;
    }

    /**
     * [getTodayTime description]
     * @return [integer]
     */
    public static function getTomorrowStartDateTime() {

        $result = date('Y-m-d 0:0:0', strtotime("tomorrow"));

        return $result;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////  下記日付秒数を取得するメソッドは、キャッシュの寿命設定時に使うので、常に実際の日付を使用する

    /**
     * [getSecondsToTomorrow description]
     * @return [integer] 秒数
     */
    public static function getSecondsForHours($hours) {

        $result = $hours * 60 * 60;

        return $tomorrow - $time;
    }

    /**
     * [getSecondsToTomorrow description]
     * @return [integer] 秒数
     */
    public static function getSecondsToTomorrow() {

        $result = 0;
        $time = strtotime(date('Y-m-d H:i:s'));

        $tomorrow =  strtotime('tomorrow');

        return $tomorrow - $time;
    }

    /**
     * getSecondsToNextWeek
     * ISO方式（月曜始まり）
     * @return [integer] 秒数
     */
    public static function getSecondsToNextWeek() {

        $result = 0;
        $time = strtotime(date('Y-m-d H:i:s'));

        //次の月曜
        $nextMonday =  strtotime('next Monday');

        return $nextMonday - $time;
    }

    /**
     * getSecondsToNextMonth
     * @return [integer] 秒数
     */
    public static function getSecondsToNextMonth() {

        $result = 0;
        $time = strtotime(date('Y-m-d H:i:s'));

        $nextMonth =  strtotime(date('Y-m-1').'+1 month');

        return $nextMonth - $time;
    }

    /**
     * getSecondsToNextWeek
     * ISO方式（月曜始まり）
     * @return [integer] 秒数
     */
    public static function getAWeekAgo($date) {

        if($date == null)
            $date = self::getToday(true);

        $dateTime = strtotime($date);
        $aWeekAgo = strtotime('-7 day', $dateTime);

        $result =  date('Y-m-d', $aWeekAgo);

        return $result;
    }

    /**
     * getLastDate
     * @return [date] xxxx/xx/xx
     */

    public static function getLastDate($date, $months) {
        if($date == null)
            $date = self::getToday(true);
        if($months == null)
            $months = 1;

        $months = $months - 1;

        $result = date('Y-m-t', strtotime($date . "+" . $months . " months"));

        return $result;
    }

}
