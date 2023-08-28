<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\admin;
use App\Models\PropertyCategory;
use DataTables;
use Session;
use Auth;
use Hash;
use Schema;
use Redirect;


class categoryController extends Controller
{

    //for view Properties...

    public $Property_Category;
    public function __construct()
    {
        $this->Property_Category = new PropertyCategory();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->Property_Category->getCategories();
            return Datatables::of($data)
            ->editColumn('type', function ($row) {
                return  $row->type == 1 ? 'Residential' : 'Commercial';
            })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("property/create?id=$row->id").'" class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="proptyDelete('. $row->id .')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/categories/index');
    }

    // is for create $ update 
    public function create(request $request){
        $selected = [
            'id' => null,
            'name' => null,
            'type' => null,
        ];
        if($request->isMethod('post')){
            $category = [
                'name' => $request->name,
                'type' => $request->type,
            ];

            if($request->input('id') > 0){
                $message = "Updated";
                PropertyCategory::find($request->input('id'))->update($category);
            }else{
                $message = "Created";
                PropertyCategory::create($category);
            }

            
            return response()->json(['status' => 200, 'message' => 'Category '. $message.' successfuly']);
        }
         // This section is for edit page
         if($request->input('id')){
            $categories_val = PropertyCategory::find($request->input('id'));

            $selected['id'] = $categories_val->id;
            $selected['name'] = $categories_val->name;
            $selected['type'] = $categories_val->type;

        }
         return view('admin/pages/categories/create', compact('selected'));

    }

     //delete
     public function delete($id){
        PropertyCategory::find($id)->delete();
        return response()->json(['status' => 200, 'message' => 'Category Deleted
         successfuly']);
    }
}