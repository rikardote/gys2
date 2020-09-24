<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Puesto;
use Yajra\Datatables\Datatables;

class PuestosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Puesto::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->make(true);
        }

         return view('admin.puestos.index');
    }
    public function store(Request $request)
    {
        Puesto::updateOrCreate(['id' => $request->id],
                [
                    'puesto' => $request->puesto, 
                    'descripcion' => $request->descripcion,
                ]);        
   
        return response()->json(['success'=>'Puesto saved successfully.']);
    }


    public function edit($id)
    {
        $puesto = Puesto::find($id);
        return response()->json($puesto);
    }


    public function destroy($id)
    {
        Puesto::find($id)->delete();
     
        return response()->json(['success'=>'Puesto deleted successfully.']);
    }
}
