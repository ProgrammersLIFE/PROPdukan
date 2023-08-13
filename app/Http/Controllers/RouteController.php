<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\ChildrenRoutes;
use App\Models\Route;
use League\CommonMark\Extension\InlinesOnly\ChildRenderer;

class RouteController extends Controller
{
    public $children_route;
    public function __construct()
    {
        $this->children_route = new ChildrenRoutes();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->children_route->getRoutes();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/routes/index');
    }

    public function routes(request $request){
        if($request->isMethod('post')){
            $route = [
                "label" => $request->label,
                "icon" => $request->icon,
                "route" => isset($request->route) ? $request->route : '#',
                "is_active" => 1,
                "is_parent" => isset($request->is_parents   ) ? 1 : 0,
            ];
            Route::create($route);
            $routes = Route::latest()->first();
            foreach($request->data as $key => $value){
                $data = [
                    "parents_id" => $routes->id,
                    "label" => $value['label'],
                    "route" => $value['route'],
                    "is_active" => 1,
                ];
                ChildrenRoutes::create($data);
            }
            return response()->json(['status' => 200, 'message' => 'Route created successfuly']);
        }
        return view("admin/pages/routes/create");
    }
}
