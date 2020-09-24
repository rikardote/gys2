<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empleado;
use Yajra\Datatables\Datatables;



class EmpleadosController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Empleado::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->make(true);
        }

         return view('admin.empleados.index');
    }

    public function store(Request $request)
    {
        Empleado::updateOrCreate(['id' => $request->id],
                [
                    'num_empleado' => $request->num_empleado, 
                    'nombre' => $request->nombre,
                ]);        
   
        return response()->json(['success'=>'Empleado saved successfully.']);
    }


    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return response()->json($empleado);
    }


    public function destroy($id)
    {
        Empleado::find($id)->delete();
     
        return response()->json(['success'=>'Suplente deleted successfully.']);
    }
}
