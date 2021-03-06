<?php

namespace App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topikskripsi;
use App\Models\Dosen;
use App\Models\Logbook;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //memanggil id dari tabel user
        $id=Auth::user()->id;
        
        //query nipy dari relasi tabel dosen
        $data_dosen=Dosen::whereuser_id($id)->first();
        
        $data=Topikskripsi::where('nipy',$data_dosen->nipy)
        ->where('status','Accept')
        ->get();

        // dd($data);

        return view('pages.dosen.bimbingan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logbook=Logbook::where('id_topikskripsi',$id)
        ->get();
        $data = Topikskripsi::whereid($id)->first();
        return view('pages.dosen.bimbingan.logbook',compact('logbook','data'));
    }

    public function view($id){
        $data=Logbook::find($id);   
        return view('pages.dosen.bimbingan.view-logbook',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $status['status'] = 1;

        $item=Logbook::whereid($id)
        ->update($status);

        $lg=Logbook::where('id',$id)
        ->first();


        //redirect topiksaya
        return redirect('/bimbingan/'.$lg->id_topikskripsi)->with('alert-success','Data Berhasil di ubah');;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
