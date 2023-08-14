<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategorie extends Model
{
    use HasFactory;
    protected $table= "property_categories";
    protected $guarded;

    public function getRoutes(){
        return DB::table('property_categories')
            ->rightJoin('routes', 'routes.id', 'children_routes.parents_id')
            ->select('children_routes.*', 'routes.label AS parent_label')
            ->get();
    }
}
