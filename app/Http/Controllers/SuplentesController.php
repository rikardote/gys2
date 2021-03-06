<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Suplente;
use Yajra\Datatables\Datatables;



class SuplentesController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Suplente::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->make(true);
        }

         return view('admin.suplentes.index');
    }
    public function store(Request $request)
    {
        Suplente::updateOrCreate(['id' => $request->id],
                [
                    'beneficiario' => $request->beneficiario, 
                    'nombre' => $request->nombre,
                    'apellido_pat' => $request->apellido_pat,
                    'apellido_mat' => $request->apellido_mat,
                    'rfc' => $request->rfc,
                    'curp' => $request->curp,
                    'clabe' => $request->clabe,

                ]);        
   
        return response()->json(['success'=>'Suplente saved successfully.']);
    }


    public function edit($id)
    {
        $suplente = Suplente::find($id);
        return response()->json($suplente);
    }


    public function destroy($id)
    {
        Suplente::find($id)->delete();
     
        return response()->json(['success'=>'Suplente deleted successfully.']);
    }
}
