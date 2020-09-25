<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicio;
use Yajra\Datatables\Datatables;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Servicio::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->make(true);
        }

         return view('admin.servicios.index');
    }
    public function store(Request $request)
    {
        Servicio::updateOrCreate(['id' => $request->id],
                [
                    'servicio' => $request->servicio, 
                    'descripcion' => $request->descripcion,
                ]);        
   
        return response()->json(['success'=>'Servicio saved successfully.']);
    }


    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return response()->json($servicio);
    }


    public function destroy($id)
    {
        Servicio::find($id)->delete();
     
        return response()->json(['success'=>'Servicio deleted successfully.']);
    }
}
