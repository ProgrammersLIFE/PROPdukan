<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\admin;
use App\Models\Kind;
use App\Models\PropertyCategory;
use DataTables;
use Session;
use Auth;
use Hash;
use Schema;
use Redirect;

class kindController extends Controller
{
      // view ..
    public $kind;
    public function __construct()
    {
        $this->kind = new Kind();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->kind->getKind();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("kind/create?id=$row->id").'" class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="kindDelete('. $row->id .')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/properties/kinds/index');
    }
        // create/edit..

    public function create(request $request){
        $selected = [
            'id' => null,
            'kind' => null,
            'kinds_type' => null,
        ];
        if($request->isMethod('post')){
            // return $request->all();
            $kind = [
                'kind' => $request->kind,
                'kinds_type' => $request->kinds_type,
            ];
            //  return $kind;
            if($request->input('id') > 0){
                $message = "Updated";
                Kind::find($request->input('id'))->update($kind);
            }else{
                $message = "Created";
                Kind::create($kind);
            }

            
            return response()->json(['status' => 200, 'message' => 'kind '. $message.' successfuly']);
        }
         // This section is for edit page
         if($request->input('id')){
            $kind_val = Kind::find($request->input('id'));

            $selected['id'] = $kind_val->id;
            $selected['kind'] = $kind_val->kind;
            $selected['kinds_type'] = $kind_val->kinds_type;

        }
        $commercial = PropertyCategory::where('type',2)->get();
         return view('admin/pages/properties/kinds/create', compact('selected','commercial'));

    }

    //delete
     public function delete($id){
        Kind::find($id)->delete();
        return response()->json(['status' => 200, 'message' => 'kind Deleted
         successfuly']);
    }
}
