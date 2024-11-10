<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Member;
use App\Models\TipeKamar;
use App\Models\NamaRuangan;
use Illuminate\Support\Str;
use App\Models\UserOwnerPic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PivotUserRoomDetail;
use App\Models\UserHotelRoomDetail;
use App\Models\UserLegalInformation;
use App\Models\UserMeetRoomCapacity;
use Illuminate\Support\Facades\Auth;
use App\Models\PivotUserRoomCapacity;
use Illuminate\Support\Facades\Session;
use App\Models\EmployeeDetailInformation;
use Illuminate\Support\Facades\Validator;
use App\Models\UserHotelSumarryInformation;
use Symfony\Contracts\Service\Attribute\Required;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function create(Request $request)
    {
        if (auth()->user()->status_data == 'diterima' || auth()->user()->status_data == 'menunggu') {
            return view('dashboard.profile.index');
        };
        $id = $request['id'];
        return view('dashboard.profile.create', compact('id'));
    }

    public function get_tipe_kamar(Request $request)
    {
        $data = TipeKamar::where('title', 'LIKE', '%' . $request->find . '%')->paginate(10);
        return response()->json($data);
    }

    public function get_nama_ruangan(Request $request)
    {
        $data = NamaRuangan::where('name', 'LIKE', '%' . $request->find . '%')->paginate(10);
        return response()->json($data);
    }

    public function store_tipe_kamar(Request $request)
    {
        $request->validate(
            [
                'inputs.*.nama_kamar' => 'required',
                'inputs.*.tipe_kamar' => 'required',
                'inputs.*.jumlah_kamar' => 'required'
            ],

            [
                'inputs.*.nama_kamar' => 'The tipe is required',
                'inputs.*.tipe_kamar' => 'The tipe is required',
                'inputs.*.jumlah_kamar' => 'The jumlah is required'
            ]

        );


        foreach ($request->inputs as $key => $value) {
            TipeKamar::create($value);
        }

        return back()->width('success', 'The post has been added!');
    }


    public function store_step_1(Request $request, $id_user)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|mimes:png,jpg,jpeg,|max:2048',
        ]);
        
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        DB::beginTransaction();
        // dd($request->all(), new Member, $request->kepemilikan);
        try {
            if ($request->step_name == "step_1") {
                $user_general_information = Member::firstOrNew(['user_id' => $id_user]);
                $user_general_information->user_id = $id_user;
                $user_general_information->jenis_usaha = $request->jenis_usaha;
                $user_general_information->kepemilikan = $request->kepemilikan;
                $user_general_information->nama_usaha = $request->nama_usaha;
                $user_general_information->klasifikasi_usaha = $request->klasifikasi_usaha;
                $user_general_information->alamat = $request->alamat;

                if ($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $ext = $file->getClientOriginalName();
                    $filename = Carbon::now()->format('ymdHis') . '-' . Str::slug(Auth::user()->username) . '.' . $ext;
                    $path = $request->file('logo')->storeAs('user_general_information', $filename);
                    $user_general_information->logo = $filename;
                }

                $user_general_information->provinsi = $request->provinsi;
                $user_general_information->kota_kabupaten = $request->kota_kabupaten;
                $user_general_information->kode_pos = $request->kode_pos;
                $user_general_information->telepon = $request->telepon;
                $user_general_information->email = $request->email;
                $user_general_information->website = $request->website;
                $user_general_information->save();
            }

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();
            dd($se);
            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }

    public function store_step_2(Request $request, $id_user)
    {
        DB::beginTransaction();

        try {
            if ($request->step_name == "step_2") {
                $owner_pic = UserOwnerPic::firstOrNew(['user_id' => $id_user]);
                $owner_pic->user_id = $id_user;
                $owner_pic->nama_pemilik = $request->nama_pemilik;
                $owner_pic->jabatan = $request->jabatan_pemilik;
                if ($request->status_no_identitas_pemilik == 'ktp') {
                    $owner_pic->nomor_identitas_ktp = $request->no_identitas_pemilik;
                } else if ($request->status_no_identitas_pemilik == 'kitas') {
                    $owner_pic->nomor_identitas_kitas = $request->no_identitas_pemilik;
                } else {
                    $owner_pic->nomor_identitas_passport = $request->no_identitas_pemilik;
                }
                $owner_pic->telepon = $request->telepon_pemilik;
                $owner_pic->email = $request->email_pemilik;
                $owner_pic->nama_perwakilan = $request->nama_perwakilan;
                $owner_pic->jabatan_perwakilan = $request->jabatan_perwakilan;
                if ($request->status_no_identitas_perwakilan == 'ktp') {
                    $owner_pic->nomor_identitas_ktp_perwakilan = $request->no_identitas_perwakilan;
                } else if ($request->status_no_identitas_perwakilan == 'kitas') {
                    $owner_pic->nomor_identitas_kitas_perwakilan = $request->no_identitas_perwakilan;
                } else {
                    $owner_pic->nomor_identitas_passport_perwakilan = $request->no_identitas_perwakilan;
                }
                $owner_pic->telepon_perwakilan = $request->telepon_perwakilan;
                $owner_pic->email_perwakilan = $request->email_perwakilan;
                $owner_pic->save();
            }

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }

    public function store_step_3(Request $request, $id_user)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'dokument' => 'pdf'
        //     ]
        // );

        // $dokument = $request->file('document');
        // $nama_dokumen = 'FT' .date('Ymdhis').'.'.$request->file('dokument')->getClientOriginalExtension();
        // $dokument->move('dokumen/',$nama_dokumen);

        DB::beginTransaction();

        try {
            if ($request->step_name == "step_3") {
                $user_legal_information = UserLegalInformation::firstOrNew(['user_id' => $id_user]);
                $user_legal_information->user_id = $id_user;
                $user_legal_information->nama_badan_hukum = $request->nama_badan_hukum_perusahaan;
                $user_legal_information->nomor_akte_pendirian_perusahaan = $request->nomor_akte_pendirian_perusahaan;
                $user_legal_information->nomor_npwp_perusahaan = $request->nomor_npwp_perusahaan;
                $user_legal_information->nomor_induk_berusaha = $request->nomor_induk_berusaha;
                $user_legal_information->nomor_tanda_daftar_usaha_pariwisata = $request->nomor_tanda_daftar_usaha_pariwisata;

                if ($request->hasFile('file_tanda_daftar_usaha_periwisata')) {
                    $file = $request->file('file_tanda_daftar_usaha_periwisata');
                    $ext = $file->getClientOriginalExtension();
                    $filename = Carbon::now()->format('ymdHis') . '-' . Str::slug(Auth::user()->username) . '.' . $ext;
                    $path = $request->file('file_tanda_daftar_usaha_periwisata')->storeAs('user_legal_information', $filename);
                    $user_legal_information->file_tanda_daftar_usaha_periwisata = $filename;
                }
                // $user_legal_information->file_tanda_daftar_usaha_periwisata = $request->file_tanda_daftar_usaha_periwisata;
                $user_legal_information->nomor_surat_izin_usaha_pariwisata = $request->nomor_surat_izin_usaha_pariwisata;
                if ($request->hasFile('file_surat_izin_usaha_pariwisata')) {
                    $file = $request->file('file_surat_izin_usaha_pariwisata');
                    $ext = $file->getClientOriginalExtension();
                    $filename = Carbon::now()->format('ymdHis') . '-' . Str::slug(Auth::user()->username) . '.' . $ext;
                    $path = $request->file('file_surat_izin_usaha_pariwisata')->storeAs('user_legal_information', $filename);
                    $user_legal_information->file_surat_izin_usaha_pariwisata = $filename;
                }
                // $user_legal_information->file_surat_izin_usaha_pariwisata = $request->file_surat_izin_usaha_pariwisata;
                $user_legal_information->nomor_surat_izin_usaha_perdagangan = $request->nomor_surat_izin_usaha_perdagangan;
                if ($request->hasFile('file_surat_izin_usaha_perdagangan')) {
                    $file = $request->file('file_surat_izin_usaha_perdagangan');
                    $ext = $file->getClientOriginalExtension();
                    $filename = Carbon::now()->format('ymdHis') . '-' . uniqid() . '-' . Str::slug(Auth::user()->username) . '.' . $ext;
                    $path = $request->file('file_surat_izin_usaha_perdagangan')->storeAs('user_legal_information', $filename);
                    $user_legal_information->file_surat_izin_usaha_perdagangan = $filename;
                }
                // $user_legal_information->file_surat_izin_usaha_perdagangan = $request->file_surat_izin_usaha_perdagangan;
                $user_legal_information->save();
            }
            // return $request->file('file_tanda_daftar_usaha_periwisata')->store('post-files');

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }

    public function store_step_4(Request $request, $id_user)
    {
        DB::beginTransaction();

        try {
            if ($request->step_name == "step_4") {
                $hotel_summary_information = UserHotelSumarryInformation::firstOrNew(['user_id' => $id_user]);
                $hotel_summary_information->user_id = $id_user;
                $hotel_summary_information->total_jumlah_kamar = $request->total_jumlah_kamar;
                $hotel_summary_information->ruang_pertemuan = $request->ruang_pertemuan;
                $hotel_summary_information->total_jumlah_karyawan = $request->total_jumlah_karyawan;
                $hotel_summary_information->save();
            }

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }

    public function store_step_5(Request $request, $id_user)
    {
        DB::beginTransaction();
        // dd($request->all());
        try {
            $member = Member::where('user_id', $id_user)->first();
            // dd($member);
            if($member->jenis_usaha != 'restoran'){
                if ($request->step_name == "step_5") {
                    $hotel_room_detail = UserHotelRoomDetail::firstOrNew(['user_id' => $id_user]);
                    $hotel_room_detail->user_id = $id_user;
                    $hotel_room_detail->nama_kamar = $request->nama_kamar;
    
                    $hotel_room_detail->jumlah = $request->jumlah_kamar;
                    $hotel_room_detail->save();
                    foreach ($request->tipe_kamar as $key_loop_tipe_kamar => $value_loop_tipe_kamar) {
                        $pivot = new PivotUserRoomDetail();
                        $pivot->tipe_kamar_id = $value_loop_tipe_kamar;
                        $pivot->user_htl_room_detail_id = $hotel_room_detail->id;
                        $pivot->save();
                    }
                }
            }
            

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();
            dd($se);
            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }

    public function store_step_6(Request $request, $id_user)
    {
        DB::beginTransaction();

        $data_ruangan = is_array($request->nama_ruangan) ? $request->nama_ruangan[0]: $request->nama_ruangan;

        try {
            if ($request->step_name == "step_6") {
                $meeting_room_capacity = UserMeetRoomCapacity::firstOrNew(['user_id' => $id_user]);
                $meeting_room_capacity->user_id = $id_user;
                // $meeting_room_capacity->nama_ruangan = $request->nama_ruangan;
                $meeting_room_capacity->id_ruangan  = $data_ruangan;
                $meeting_room_capacity->kapasitas = $request->kapasitas;
                $meeting_room_capacity->save();

                // $pivot = new PivotUserRoomCapacity();
                // $pivot->nama_ruangan_id = $value_loop_nama_ruangan;
                // $pivot->user_meeting_room_capacity_id = $meeting_room_capacity->id;
                // $pivot->save();
            }

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();
            dd($se);
            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }

    public function store_step_7(Request $request, $id_user)
    {
        DB::beginTransaction();

        try {
            if ($request->step_name == "step_7") {
                $detail_information = EmployeeDetailInformation::firstOrNew(['user_id' => $id_user]);
                $detail_information->user_id = $id_user;
                $detail_information->jumlah_karyawan_tetap = $request->jumlah_karyawan_tetap;
                $detail_information->jumlah_karyawan_kontrak = $request->jumlah_karyawan_kontrak;
                $detail_information->jumlah_karyawan_harian = $request->jumlah_karyawan_harian;
                $detail_information->jumlah_karyawan_outsource = $request->jumlah_karyawan_outsource;
                $detail_information->save();
            }

            $status = User::find($id_user);
            $status->status_data = 'menunggu';
            $status->save();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (\Exception $se) {

            DB::rollBack();
            // dd($se);
            return response()->json([
                'success' => false,
                'message' => $se,
            ], 400);
        }
    }
}
