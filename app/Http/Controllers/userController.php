<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public $Users;
    public function __construct()
    {
        $this->Users = new User();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->Users->getUsers();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="#" class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="#" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/users/index');
    }

    //ADD users
    public function create(Request $request){
        $user = [];
        $selected = [
            'id' => null,
            'name' => null,
            'email' => null,
            'password' => null
        ];
        if($request->isMethod('post')){
            $user = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ];
            User::create($user);
            return response()->json(['status' => 200, 'message' => 'User created successfuly']);
        }
        return view("admin/pages/users/create");
    }
}
