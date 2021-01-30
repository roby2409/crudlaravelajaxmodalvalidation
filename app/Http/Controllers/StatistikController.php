<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistik;
class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_statistik = Statistik::all();
        if ($request->ajax()) {
            return datatables()->of($list_statistik)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger 
                    btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href ="pdfjs/web/viewer.html?file=%2Fdata_file/'.$data->file .'" class="show btn btn-success btn-sm show-post"><i class="far fa-trash-alt"></i> Presentasi</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('statistik');
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
        $id = $request->id;
     
        $validator = \Validator::make($request->all(), [
            "file" => "required|mimes:pdf|max:10000",
            'keterangan' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
              // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        Statistik::updateOrCreate(
            ['id' => $id],
            [
                'keterangan' => $request->keterangan,
                'file' => $nama_file
            ]
        );
        return response()->json(['success'=>'Data is successfully added']);
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
        $where = array('id' => $id);
        $statistik  = Statistik::where($where)->first();

        return view('show', compact('statistik'));

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
        $post  = Statistik::where($where)->first();

        return response()->json($post);
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
    public function destroy($id)
    {
        $post = Statistik::where('id', $id)->delete();

        return response()->json($post);
    }
}
