<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persentase;
use App\Kabupaten;
use App\Jenis_bantuan;
use Yajra\DataTables\Facades\DataTables;

class PersentaseController extends Controller
{
    public function index(Request $request)
    {
        // $list_persentase = Persentase::all();
        $list_persentase = Persentase::with('kabupaten')->select('persentase.*');
        $list_kabupaten = Kabupaten::all();
        $list_jenis_bantuan = Jenis_bantuan::all();
        if ($request->ajax()) {
            return datatables()->of($list_persentase)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                    return $button;
                })
                ->editColumn('id_kabupaten', function($query){
                    return $query->kabupaten->nama_kabupaten;
                })
                ->editColumn('id_jenis_bantuan', function($query){
                    return $query->jenis_bantuan->nama_jenis_bantuan;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('persentase', compact('list_kabupaten', 'list_jenis_bantuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;

        $post   =   Persentase::updateOrCreate(
            ['id' => $id],
            [
                'total_penerima' => $request->total_penerima,
                'id_kabupaten' => $request->id_kabupaten,
                'id_jenis_bantuan' => $request->id_jenis_bantuan,
                'total_penerima_terealisasi' => $request->total_penerima_terealisasi,
                'total_penerima_terealisasi_persen' => $request->total_penerima_terealisasi_persen,
                'total_penerima_dalam_antrian' => $request->total_penerima_dalam_antrian,
                'total_penerima_dalam_antrian_persen' => $request->total_penerima_dalam_antrian_persen,
            ]
        );

        return response()->json($post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Persentase::where($where)->first();

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Persentase::where('id', $id)->delete();

        return response()->json($post);
    }
}
