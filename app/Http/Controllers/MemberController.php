<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetailInformation;
use App\Models\Member;
use App\Models\User;
use App\Models\UserHotelRoomDetail;
use App\Models\UserHotelSumarryInformation;
use App\Models\UserLegalInformation;
use App\Models\UserMeetRoomCapacity;
use App\Models\UserOwnerPic;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard.member.index', [
            'user' => $user
        ]);
    }

    public function terima_member(Request $request)
    {
        try {
            $status = User::find($request->id);
            $status->status = 'active';
            $status->save();

            return ['status' => true];
        } catch (\Exception $e) {
            return ['status' => false];
        }
        // dd($request->all());
    }

    public function tolak(Request $request)
    {
        $data = User::find($request->id);
        $data->status = 'inactive';
        $data->alasan = $request->alasan;
        $data->save();

        return ['status' => true];
    }

    public function detail($id, Request $request)
    {
        $members = Member::where('user_id', $id)->get();
        $user_owner_pic = UserOwnerPic::where('user_id', $id)->get();
        $user_legal_information = UserLegalInformation::where('user_id', $id)->get();
        $user_hotel_sumarry_information = UserHotelSumarryInformation::where('user_id', $id)->get();
        $user_hotel_room_detail = UserHotelRoomDetail::where('user_id', $id)->get();
        $user_meeting_room_capacity = UserMeetRoomCapacity::with(['relation_nama_ruangan'])->where('user_id', $id)->get();

        $employee_detail_information = EmployeeDetailInformation::where('user_id', $id)->get();
        return view('dashboard.member.detail', [
            'members' => $members,
            'user_owner_pic' => $user_owner_pic,
            'user_legal_information' => $user_legal_information,
            'user_hotel_sumarry_information' => $user_hotel_sumarry_information,
            'user_hotel_room_detail' => $user_hotel_room_detail,
            'user_meeting_room_capacity' => $user_meeting_room_capacity,
            'employee_detail_information' => $employee_detail_information,
        ]);
    }
}
