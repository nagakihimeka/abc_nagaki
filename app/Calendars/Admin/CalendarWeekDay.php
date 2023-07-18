<?php
namespace App\Calendars\Admin;

use Carbon\Carbon;
use App\Models\Calendars\ReserveSettings;


class CalendarWeekDay{
  protected $carbon;

  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  function getClassName(){
    return "day-" . strtolower($this->carbon->format("D"));
  }

  function render(){
    return '<p class="day">' . $this->carbon->format("j") . '日</p>';
  }

  function everyDay(){
    return $this->carbon->format("Y-m-d");
  }

  function dayPartCounts($ymd){
    $html = [];
    $one_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '1')->first();
    $two_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '2')->first();
    $three_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '3')->first();
    // $one = ReserveSettings::with('users')->first()->users()->groupBy('reserve_setting_id')->count();
    $one = ReserveSettings::withCount('users')->where('setting_reserve', $ymd)->where('setting_part', '1')->first();
    $two = ReserveSettings::withCount('users')->where('setting_reserve', $ymd)->where('setting_part', '2')->first();
    $three = ReserveSettings::withCount('users')->where('setting_reserve', $ymd)->where('setting_part', '3')->first();



    $html[] = '<div class="text-left">';
    if($one_part){
      $html[] = '<div class="day_part_flex">';
      $html[] = '<a class="day_part m-0 pt-1" href="'.route('detail',['id'  => $one->id]).'">1部</a>';//ur Lに（$one->id.）を持たせる
      $html[] = '<p class="day_part_count m-0 pt-1">'.$one->users_count.'</p>';//reserve_settingsの数が表示されてる
      $html[] = '</div>';

    }
    if($two_part){
      $html[] = '<div class="day_part_flex">';
      $html[] = '<a class="day_part m-0 pt-1" href="'.route('detail',['id'  => $two->id]).'">2部</a>';
      $html[] = '<p class="day_part_count m-0 pt-1">'.$two->users_count.'</p>';
       $html[] = '</div>';

    }
    if($three_part){
      $html[] = '<div class="day_part_flex">';
      $html[] = '<a class="day_part m-0 pt-1" href="'.route('detail',['id'  => $three->id]).'">3部</a>';
      $html[] = '<p class="day_part_count m-0 pt-1">'.$three->users_count.'</p>';
       $html[] = '</div>';
    }
    $html[] = '</div>';

    return implode("", $html);
  }


  function onePartFrame($day){
    $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first();
    if($one_part_frame){
      $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first()->limit_users;
    }else{
      $one_part_frame = "20";
    }
    return $one_part_frame;
  }
  function twoPartFrame($day){
    $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first();
    if($two_part_frame){
      $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first()->limit_users;
    }else{
      $two_part_frame = "20";
    }
    return $two_part_frame;
  }
  function threePartFrame($day){
    $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first();
    if($three_part_frame){
      $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first()->limit_users;
    }else{
      $three_part_frame = "20";
    }
    return $three_part_frame;
  }

  //
  function dayNumberAdjustment(){
    $html = [];
    $html[] = '<div class="adjust-area">';
    $html[] = '<p class="d-flex m-0 p-0">1部<input class="w-25" style="height:20px;" name="1" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">2部<input class="w-25" style="height:20px;" name="2" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">3部<input class="w-25" style="height:20px;" name="3" type="text" form="reserveSetting"></p>';
    $html[] = '</div>';
    return implode('', $html);
  }
}
