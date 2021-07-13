<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportDataMahasiswa;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hari= Setup::all()->first();
        // dd($hari);
        return view('pages.superadmin.setup.index',compact('hari'));
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
        //
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
        $data = $request->all();
        $item = Setup::findOrFail($id);
        $item->update($data);

        $hari= Setup::all()->first();
     
        return redirect('/setup')->with('alert-success','Data Berhasil di ubah');
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

    public function getDataMahasiswa()
    {
        return view('pages.superadmin.setup.importDataMahasiswa');
    }

    public function importDataMahasiswa(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswa', $namaFile);
        Excel::import(new ImportDataMahasiswa, public_path('/DataMahasiswa/' . $namaFile));
        // return redirect('/data-mahasiswa')->with('alert-success', 'Jadwal Berhasil Diimport');
    }
}
