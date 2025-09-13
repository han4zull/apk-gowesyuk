<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Laporan; // <-- ini penting
use Illuminate\Support\Str;
use App\Models\Penyewaan;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $penyewaan = Penyewaan::with('sepeda')->where('id_user', $user->id)->get();


        return view('user.profile', compact('user', 'penyewaan'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name'      => 'required|string|max:255',
        'full_name' => 'required|string|max:255',
        'phone'     => 'nullable|string|max:20',
        'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->name = $request->name;
    $user->full_name = $request->full_name;
    $user->phone = $request->phone;

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');

        // Hapus avatar lama jika ada
        if ($user->avatar && file_exists(public_path($user->avatar))) {
            @unlink(public_path($user->avatar));
        }

        $avatarName = time().'_'.$avatar->getClientOriginalName();
        $avatar->move(public_path('avatars'), $avatarName);

        $user->avatar = 'avatars/'.$avatarName;
    }

    $saved = $user->save();

    if(!$saved){
        return back()->withErrors(['avatar' => 'Gagal menyimpan avatar.']);
    }

    return back()->with('success', 'Profil berhasil diperbarui!');
}


    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.Auth::id(),
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Email berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }

public function report(Request $request)
{
    $request->validate([
        'penyewaan_id'     => 'required|exists:penyewaan,id_penyewaan',
        'report_title'     => 'required|string|max:255',
        'report_category'  => 'required|string|max:100',
        'deskripsi_masalah'=> 'required|string|max:1000',
        'rating'           => 'required|integer|min:1|max:5',
    ]);

    $user = Auth::user();

    // Ambil penyewaan yang dipilih user dan pastikan milik user itu sendiri
    $penyewaan = Penyewaan::where('id_penyewaan', $request->penyewaan_id)
                            ->where('id_user', $user->id) // <-- cek pemilik
                            ->first();

    if(!$penyewaan){
        return back()->withErrors(['penyewaan_id' => 'Pesanan tidak ditemukan atau bukan milik Anda']);
    }

    // Simpan laporan ke tabel laporans
    Laporan::create([
        'user_id'          => $user->id,
        'penyewaan_id'     => $penyewaan->id_penyewaan,
        'nama_lengkap'     => $penyewaan->nama_lengkap,
        'email'            => $penyewaan->email,
        'nomor_telepon'    => $penyewaan->nomor_telepon,
        'nama_sepeda'      => $penyewaan->nama_sepeda,
        'kode_sepeda'      => $penyewaan->kode_sepeda,
        'tanggal'          => $penyewaan->tanggal,
        'judul'            => $request->report_title,
        'kategori'         => $request->report_category,
        'deskripsi_masalah'=> $request->deskripsi_masalah,
        'rating'           => $request->rating,
        'status'           => 'menunggu',
    ]);

    return back()->with('success', 'Laporan berhasil dikirim!');
}

}