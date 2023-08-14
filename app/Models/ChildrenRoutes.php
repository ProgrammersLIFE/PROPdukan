<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ChildrenRoutes extends Model
{
    use HasFactory;
    protected $table= "children_routes";
    protected $guarded;

    public function getRoutes(){
        return DB::table('children_routes')
            ->rightJoin('routes', 'routes.id', 'children_routes.parents_id')
            ->select('children_routes.*', 'routes.label AS parent_label')
            ->get();
    }
}
