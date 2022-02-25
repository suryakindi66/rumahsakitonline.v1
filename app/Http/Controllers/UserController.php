<?php

namespace App\Http\Controllers;

use App\Models\DataDokter;
use App\Models\PengajuanPendaftaran;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\Pengumuman;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailspengumuman = Pengumuman::get('isi_pengumuman');
        return view('user.dashboard', ['detailspengumuman'=>$detailspengumuman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexpengajuan()
    {
        $detailsdokter = DataDokter::all();
        return view('user.pengajuan-pendaftaran', ['detailsdatadokter'=>$detailsdokter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = new PengajuanPendaftaran;
        $pasien->user_id = Auth()->user()->id;
        $pasien->nama_pasien = $request->name;
        $pasien->nohp = $request->nohp;
        $pasien->waktucontrol = $request->waktucontrol;
        $pasien->gender = $request->gender;
        $pasien->namadokter = $request->namadokter;
        $pasien->alamat = $request->alamat;
        $pasien->status = "Pending";
        $pasien->save();
        $request->session()->flash('sukses-pengajuan');
        return redirect('/user/pengajuan-pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $history = PengajuanPendaftaran::where('user_id', Auth()->user()->id)->get();
        return view('user.table-history', ['history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailsdokter()
    {
        $detailsdokter = DataDokter::all();
        return view('user.detailsdokter', ['detailsdatadokter' => $detailsdokter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $delete = PengajuanPendaftaran::find($id);
       $delete->delete();
       return redirect('/user/history');
    }
    public function logout(request $request){
        Auth::logout();
        
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
