<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;

class profileController extends Controller
{
    public $Profile;
    public function __construct()
    {
        $this->Profile = new Admin();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->Profile->getProfile();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("profile/create?id=$row->id").'" class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="productDelete('. $row->id .')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/profile/index');
    }
    public function create(Request $request){
        $profile = [];
        $selected = [
            'id' => null,
            'name' => null,
            'email' => null,
            'mobile_number' => null,
            'image' => null,
            'location' => null,
        ];

        if($request->input('id')){
            $profile_val = Admin::find($request->input('id'));

            $selected['id'] = $profile_val ->id;
            $selected['name'] = $profile_val ->name;
            $selected['email'] = $profile_val ->email;
            $selected['mobile_number'] = $profile_val ->mobile_number;
            $selected['image'] = $profile_val ->image;
            $selected['location'] = $profile_val ->location;
            if($profile_val ->image != 'not-found.png'){
                $selected['image'] = url('/').'/admin/products/images/'.$profile_val->image;
            }
        }
        if($request->isMethod('post')){
            if($request->hasFile('image')){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('admin/products/images'), $imageName);
            }else{
                if($request->input('id') > 0){
                    $imageName = $profile_val->image;
                }else{
                    $imageName = 'not-found.png';
                }
            }
            $profile = [
                "name" => $request->name,
                "email" => $request->email,
                "mobile_number" => $request->mobile_number,
                "image" => $request->image,
                "location" => $request->location
            ];

            if($request->input('id') > 0){
                $message = "Updated";
                Admin::find($request->input('id'))->update($profile);
            }else{
                $message = "Created";
                Admin::create($profile);
            }

            return response()->json(['status' => 200, 'message' => 'User '.$message.' successfuly']);
        }
        return view('admin/pages/profile/create',compact('selected'));
    }
}
