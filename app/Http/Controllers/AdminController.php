<?php

namespace App\Http\Controllers;

use App\Models\DataDokter;
use App\Models\PengajuanPendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pengumuman;

class AdminController extends Controller
{
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahpengajuan = PengajuanPendaftaran::all()->count();
        $jumlahuser = User::where('roleadmin', '0')->count();
        $jumlahterkonfirmasi = PengajuanPendaftaran::where('status', 'Terkonfirmasi')->count();

        return view('admin.dashboard', ['jumlahuser' => $jumlahuser, 'jumlahpengajuan' => $jumlahpengajuan, 'jumlahterkonfirmasi' => $jumlahterkonfirmasi] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewcreatedokter()
    {
       return view('admin.adddokter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecreatedokter(Request $request)
    {
        $datadokter = new DataDokter;
        $datadokter->nama_dokter = $request->name;
        $datadokter->jadwal = $request->jadwal;
        $datadokter->save();
        $request->session()->flash('sukses-adddokter');
        return redirect('/admin/jadwal-dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdatadokter(request $request)
    {
        if($request->search){
            $detailsdata = DataDokter::where('nama_dokter', 'Like', '%'.$request->search.'%')->get();
        }else{
            $detailsdata = DataDokter::all();
        }
        return view('admin.detailsdokter', ['detailsdatadokter' => $detailsdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdatapasien()
    {

        if(Request('search')){
            $detailsdata = PengajuanPendaftaran::where('nama_pasien', 'LIKE', '%'.request('search').'%')->get();
            
        }else{
            $detailsdata = PengajuanPendaftaran::all();
        }
        
        return view('admin.detailspasien', ['detailsdatapasien' => $detailsdata]);
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
      public function konfirmasipendaftaran($id)
    {
        $konfirmasipendaftaran = PengajuanPendaftaran::find($id);
        $konfirmasipendaftaran->status = "Terkonfirmasi";
        $konfirmasipendaftaran->save();
        return redirect('/admin/datapasien');
    }

    public function rejectedpendaftaran($id)
    {
        $konfirmasipendaftaran = PengajuanPendaftaran::find($id);
        $konfirmasipendaftaran->status = "Rejected";
        $konfirmasipendaftaran->save();
        return redirect('/admin/datapasien');
    }
    public function viewcreatepengumuman()
    {
       return view('admin.createpengumuman');
    }
    public function createpengumuman(Request $request)
    {
       $createpengumuman = new Pengumuman;
       $createpengumuman->judul_pengumuman = $request->judulpengumuman;
       $createpengumuman->isi_pengumuman = $request->isipengumuman;
       $createpengumuman->save();
       $request->session()->flash('sukses-createpengumuman');
       return redirect('/admin/createpengumuman');
    }
    public function deletedokter($id)
    {
      $deletedokter = DataDokter::find($id);
      $deletedokter->delete();
      return redirect('/admin/detail-jadwal-dokter');
    }
  
    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
    
        return redirect('/admin/login');
    }
}