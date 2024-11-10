<?php

use App\Models\User;
use App\Models\Member;
use App\Models\Category;

use App\Models\RiwayatLayanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KemitraanController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\FormLainnyaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\BantuanHukumController;
use App\Http\Controllers\FormSupplierController;
use App\Http\Controllers\HalamanPanicController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\FormKeributanController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\FormPerampokanController;
use App\Http\Controllers\ManajementAkunController;
use App\Http\Controllers\FormPengurusOssController;
use App\Http\Controllers\TolakPenggaduanController;
use App\Http\Controllers\RiwayatPengaduanController;
use App\Http\Controllers\FormDesainInteriorController;
use App\Http\Controllers\DashboardAdminPusatController;
use App\Http\Controllers\DashboardCategoriesController;
use App\Http\Controllers\FormSertifikasiHalalController;
use App\Http\Controllers\HalamanRiwayatLayananController;
use App\Http\Controllers\FormBantuanKelistrikanController;
use App\Http\Controllers\HalamanRiwayatPelayananController;
use App\Http\Controllers\HalamanRiwayatPengaduanController;
use App\Http\Controllers\FormKonsultanFinancialPerbankanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Code untuk nampilkan halaman Home
Route::get('/', [HomeController::class, 'home'])->name('home');
// Route::get('/userhome', [UserHomeController::class, 'index']);

// Code untuk nampilkan halaman About
// Route::get('/about', function () {
//     return view('about',[
//         "title" => "About",
//         "active" => 'about',
//         "name" => "Cristian Elza",
//         "email" => "cristianelza127@gmail.com",
//         "image" => "1.jpg"
//     ]);
// });
// Code untuk nampilkan halaman Blog
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// Code untuk nampilkan halaman Category
// Route::get('/categories', function() {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });
Route::get('/informasi', function () {
    return view('informasi', [
        "title" => "Informasi",
        "active" => 'informasi'
    ]);
});

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

// Code untuk nampilkan halaman Jenis Category
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => "Post By Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author')
    ]);
});

// Code untuk nampilkan halaman pembuat post
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Post By Author : $author->name",
        'active' => 'posts',
        'posts' => $author->posts->load('category', 'author'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::get('/penawaran', [PenawaranController::class, 'index']);
Route::get('/biodata', [BiodataController::class, 'index']);
Route::get('/form_pengiriman_barang', [PengirimanController::class, 'index']);
Route::get('/form_bantuan_hukum', [BantuanHukumController::class, 'index']);
Route::get('/form_pengurus_oss', [FormPengurusOssController::class, 'index']);
Route::get('/halaman_panic', [HalamanPanicController::class, 'index'])->middleware(['auth', 'mitra',]);
Route::get('/halaman_panic_create', [HalamanPanicController::class, 'create']);
Route::post('/halaman_panic_post', [HalamanPanicController::class, 'store']);
Route::get('/get-data/{nama}', [HalamanPanicController::class, 'get_data'])->name('get_data');
Route::get('/kemitraan', [KemitraanController::class, 'Kemitraan'])->name('Kemitraan');
Route::post('/add/kemitraan', [KemitraanController::class, 'addKemitraan'])->name('addKemitraan');
Route::get('/lowongan_kerja', [LowonganKerjaController::class, 'lowongan_kerja'])->name('lowongan_kerja');
Route::post('/add/lowongan_kerja', [LowonganKerjaController::class, 'LowonganKerja'])->name('LowonganKerja');

Route::post('/form_pengiriman_barang', [LayananController::class, 'store'])->name('store.layanan');

Route::get('/form_bantuan_kelistrikan', [FormBantuanKelistrikanController::class, 'index']);
Route::get('/form_desain_interior', [FormDesainInteriorController::class, 'index']);
Route::get('/form_supplier', [FormSupplierController::class, 'index']);
Route::get('/form_konsultan_financial_perbankan', [FormKonsultanFinancialPerbankanController::class, 'index']);
Route::get('/form_sertifikasi_halal', [FormSertifikasiHalalController::class, 'index']);
Route::get('/form_lainnya', [FormLainnyaController::class, 'index']);
Route::get('/halaman_riwayat_pengaduan', [HalamanRiwayatPengaduanController::class, 'index']);
Route::get('/halaman_riwayat_pelayanan', [HalamanRiwayatPelayananController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/dashboard_pusat', [DashboardAdminPusatController::class, 'index']);

Route::get('/dashboard/pengaduan', [PengaduanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/pelayanan', [PelayananController::class, 'index'])->middleware('auth');

Route::prefix('admin')->group(function () {
    
});
Route::get('/dashboard/layanan', [AdminLayananController::class, 'index'])->middleware('auth');
Route::delete('/dashboard/layanan/{id}', [AdminLayananController::class, 'delete'])->name('delete')->middleware('auth');
Route::get('/dashboard/edit_layanan/{id}', [AdminLayananController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/dashboard/update_layanan/{id}', [AdminLayananController::class, 'update'])->name('dashboard.update_layanan')->middleware('auth');
Route::post('/dashboard/layanan', [LayananController::class, 'addLayanan'])->name('addLayanan')->middleware('auth');
Route::get('/dashboard/edit_pelayanan/{id}', [PelayananController::class, 'edit_pelayanan'])->name('edit_pelayanan')->middleware('auth');
Route::post('/dashboard/update_pelayanan/{id}', [PelayananController::class, 'update_pelayanan'])->name('dashboard.update_pelayanan')->middleware('auth');

Route::get('/dashboard/manajement_akun', [ManajementAkunController::class, 'index'])->middleware('auth');
Route::get('/dashboard/member', [MemberController::class, 'index'])->name('member')->middleware('auth');
Route::get('/dashboard/member/detail/{id}', [MemberController::class, 'detail'])->name('detail')->middleware('auth');
Route::get('/dashboard/member/owner_pic/{id}', [MemberController::class, 'owner_pic'])->name('owner_pic')->middleware('auth');
Route::get('/dashboard/mitra', [MitraController::class, 'index'])->name('member')->middleware('auth');
Route::get('/dashboard/lowongan_kerja', [LowonganKerjaController::class, 'index'])->name('lowongan_kerja')->middleware('auth');
Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

// Route::get('/dashboard/profile', [ProfileController::class, 'create'])->middleware('auth');

Route::get('/dashboard/profile/create/{id_user}', [ProfileController::class, 'create'])->name('profile_create')->middleware('auth');
Route::post('/dashboard/profile/{id_user}/store_step_1', [ProfileController::class, 'store_step_1'])->name('profile_store_step_1')->middleware('auth');
Route::post('/dashboard/profile/{id_user}/store_step_2', [ProfileController::class, 'store_step_2'])->name('profile_store_step_2')->middleware('auth');
Route::post('/dashboard/profile/{id_user}/store_step_3', [ProfileController::class, 'store_step_3'])->name('profile_store_step_3')->middleware('auth');
Route::post('/dashboard/profile/{id_user}/store_step_4', [ProfileController::class, 'store_step_4'])->name('profile_store_step_4')->middleware('auth');
Route::post('/dashboard/profile/{id_user}/store_step_5', [ProfileController::class, 'store_step_5'])->name('profile_store_step_5')->middleware('auth');
Route::post('/dashboard/profile/{id_user}store_step_6', [ProfileController::class, 'store_step_6'])->name('profile_store_step_6')->middleware('auth');
Route::post('/dashboard/profile/{id_user}store_step_7', [ProfileController::class, 'store_step_7'])->name('profile_store_step_7')->middleware('auth');
Route::get('/dashboard/profile/tipe_kamar', [ProfileController::class, 'get_tipe_kamar'])->name('profile_get_tipe_kamar')->middleware('auth');
Route::get('/dashboard/profile/nama_ruangan', [ProfileController::class, 'get_nama_ruangan'])->name('profile_get_nama_ruangan')->middleware('auth');
Route::post('/dashboard/profile/store_tipe_kamar', [ProfileController::class, 'store_tipe_kamar'])->name('profile_store_tipe_kamar')->middleware('auth');
Route::post('/dashboard/member/store', [MemberController::class, 'store'])->name('member_store')->middleware('auth');
Route::get('/dashboard/layanan/{layanan_id}', [LayananController::class, 'akses_layanan'])->name('akses_layanan')->middleware('auth');
Route::post('/add/pelayanan/{layanan_id}', [LayananController::class, 'addPelayanan'])->name('addPelayanan');
Route::get('/dashboard/manajement_akun/create', [ManajementAkunController::class, 'create'])->middleware('auth');

Route::get('/dashboard/manajement_akun/show/{id}', [ManajementAkunController::class, 'show'])->name('show.akun_user')->middleware('auth');

Route::post('/dashboard/alasan_tolak', [PengaduanController::class, 'tolak'])->name('tolak')->middleware('auth');

Route::post('/dashboard/terima/{id}', [PengaduanController::class, 'terima'])->name('terima_pengaduan')->middleware('auth');

Route::post('/dashboard/edit/{id}', [PengaduanController::class, 'edit'])->name('edit_pengaduan')->middleware('auth');

Route::post('/dashboard/terima_layanan', [PelayananController::class, 'terima_layanan'])->name('terima_layanan')->middleware('auth');
Route::post('/dashboard/member/terima_btn', [MemberController::class, 'terima_member'])->name('member_terima')->middleware('auth');
Route::post('/dashboard/member_tolak_btn', [MemberController::class, 'tolak'])->name('member_tolak_btn')->middleware('auth');
Route::post('/dashboard/manajement_akun/terima_akun', [ManajementAkunController::class, 'terima_akun'])->name('manajement_akun_terima')->middleware('auth');
Route::post('/dashboard/manajement_akun/tolak_akun', [ManajementAkunController::class, 'tolak_akun'])->name('manajement_akun_tolak')->middleware('auth');
Route::post('/dashboard/{id}/proses/{laporan_id}', [PengaduanController::class, 'proses'])->name('proses')->middleware('auth');
Route::post('/dashboard/{id}/menunggu', [PengaduanController::class, 'menunggu'])->name('menunggu')->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::delete('/dashboard/categories/{id}', [DashboardCategoriesController::class, 'delete'])->name('delete')->middleware('auth');

Route::get('/dashboard/edit_categories/{id}', [DashboardCategoriesController::class, 'edit_categories'])->name('edit_categories')->middleware('auth');

Route::post('/dashboard/update_categories/{id}', [DashboardCategoriesController::class, 'update'])->name('dashboard.update_categories')->middleware('auth');

Route::resource('/manajement_akun/edit', DashboardUserController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [DashboardCategoriesController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/categories', DashboardCategoriesController::class)->except('show')->middleware('admin');

// Route::resource('/dashboard/layanan', AdminLayananController::class)->except('show')->middleware('admin');

// Route::resource('/dashboard/profile/create/{id}', ProfileController::class)->except('show')->middleware('auth');

// Route::get('/general_information',function(){
//     return view('dashboard.member.detail/{id}');
// });

Route::get('/general_information', function () {
    return view('dashboard.member.detail', [
        "title" => "Home",
        "active" => 'home'
    ]);
});
Route::get('/owner_pic', function () {
    return view('dashboard.member.detail');
});
Route::get('/legal_information', function () {
    return view('dashboard.member.detail');
});
Route::get('/summary_information', function () {
    return view('dashboard.member.detail');
});
Route::get('/room_detail', function () {
    return view('dashboard.member.detail');
});
Route::get('/room_capacity', function () {
    return view('dashboard.member.detail');
});
Route::get('/detail_information', function () {
    return view('dashboard.member.detail');
});
