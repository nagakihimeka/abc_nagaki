<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use App\Calendars\General\CalendarWeekDay;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show(){

        $calendar = new CalendarView(time());
        // $reserveDay = new CalendarWeekDay(time());
        $reserve = User::with('reserveSettings')->get();

        return view('authenticated.calendar.general.calendar', compact('calendar','reserve'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');//予約した分人数減らしてる
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request) {
        $reserve = User::with('reserveSettings')->first();


        $getPart = $request->getPart;
            if($getPart == "リモ1部") {
                $getPart = 1;
            }else if ($request->getPart == "リモ2部") {
                $getPart = 2;

            }elseif ($getPart == "リモ3部") {
                $getPart = 3;
            }
        $getDate = $request->getData;
            $reserve_settings = ReserveSettings::where('setting_reserve',$getDate)->where('setting_part',$getPart)->first();
            $reserve_settings->increment('limit_users');//予約を削除した分人数増やす
            $reserve_settings->users()->detach(Auth::id());
            DB::commit();

        try{

        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

}
