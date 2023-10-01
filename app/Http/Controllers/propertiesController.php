<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Models\Property;
use App\Models\Kind;
use DataTables;
use Session;
use Auth;
use Hash;
use Schema;
use Redirect;

class propertiesController extends Controller
{

    public $Properties;
    public function __construct()
    {
        $this->Properties = new Property();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->Properties->getProperties();
            return DataTables::of($data)
            ->editColumn('property_cat', function ($row) {
                return  $row->property_cat == 1 ? 'Residential' : 'Commercial';
            })
                    ->addIndexColumn()
                   
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("properties/create?id=$row->id").'"  class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="propertyDelete('.$row->id.')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/properties/index');
    }

    public function create(request $request){

        $selected = [
            'id' => null,
            'property_type' =>null,
            'properties_type' =>null,
            'property_cat' =>null,
            'what_kind' =>null,
            'city' =>null,
            'apartment'=>null,
            'project'=>null,
            'sub_locality'=>null,
            'locality'=>null,
            'house_no'   =>null,
            'address'=>null,
            'zone_type'=>null,
            'your_apartment'=>null,
            'no_of_bathrooms'=>null,
            'no_of_bedrooms'=>null,
            'balconie'=>null,
            'breadth'=>null,
            'length'=>null,
            'carpet_area'=>null,
            'built_area'=>null,
            'super_area'=>null,
            'other_rooms'=>null,
            'furnishing'=>null,
            'reserve_parking'=>null,
            'floor_details'=>null,
            'floor_details_type'=>null,
            'floors_allowed'=>null,
            'boundary'=>null,
            'open_sides'=>null,
            'any_construction'=>null,
            'availability_status'=>null,
            'age_of_property' =>null,
            'possession' =>null,
            'available_date' =>null,
            'Willing' =>null,
            'brokers_contacting' =>null,
            'avaiable_type' =>null,
            'suitable' =>null,
            'ownership'=>null,
            'excepted_price'=>null,
            'persft_price'=>null,
            'price_tax'=>null,
            'additoinal_price'=>null,
            'additoinal_price_type'=>null,
            'booking'=>null,
            'width'=>null,
            'lease_type'=>null,
            'rent_month'=>null,
            'lease_year'=>null,
            'textarea'=>null,
            'amenities'=>null,
            'propert_features'=>null,
            'society_building'=>null,
            'additional_feature'=>null,
            'water_source'=>null,
            'overlooking'=>null,
            'other_features'=>null,
            'power_back_up'=>null,
            'property_facing'=>null,
            'type_of_flooring'=>null,
            'Width_of_faching'=>null,
            'location'=>null,
            'avaiable_type'=>null,
            'faching_type'=>null,
            'property_suggest'=>null,
            'apartment_society'=>null,
            'Located_inside'=>null,
            'existing_image'=>null,
            'property_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png',
        ];

        if($request->input('id') > 0){
            $properties_val = Property::find($request->input('id'));

            $selected['id'] = $properties_val->id;
            $selected['property_type']= $properties_val->property_type;
            $selected['properties_type']= $properties_val->properties_type;
            $selected['what_kind']= $properties_val->what_kind;
            $selected['property_cat']=$properties_val->property_cat;
            $selected['city']=$properties_val->city;
            $selected['apartment']=$properties_val->apartment;
            $selected['project']=$properties_val->project;
            $selected['sub_locality']=$properties_val->sub_locality;
            $selected['locality']=$properties_val->locality;
            $selected['house_no']=$properties_val->house_no;
            $selected['address']=$properties_val->address;
            $selected['zone_type']=$properties_val->zone_type;
            $selected['your_apartment']=$properties_val->your_apartment;
            $selected['no_of_bathrooms']=$properties_val->no_of_bathrooms;
            $selected['no_of_bedrooms']=$properties_val->no_of_bedrooms;
            $selected['balconie']=$properties_val->balconie;
            $selected['carpet_area']=$properties_val->carpet_area;
            $selected['built_area']=$properties_val->built_area;
            $selected['super_area']=$properties_val->super_area;
            $selected['other_rooms']=$properties_val->other_rooms;
            $selected['length']=$properties_val->length;
            $selected['breadth']=$properties_val->breadth;
            $selected['furnishing']=$properties_val->furnishing;
            $selected['reserve_parking']=$properties_val->reserve_parking;
            $selected['floor_details']=$properties_val->floor_details;
            $selected['property_type']=$properties_val->property_type;
            $selected['floor_details_type']=$properties_val->floor_details_type;
            $selected['boundary']=$properties_val->boundary;
            $selected['open_sides']=$properties_val->open_sides;
            $selected['any_construction']=$properties_val->any_construction;
            $selected['availability_status']=$properties_val->availability_status;
            $selected['age_of_propertyd']=$properties_val->age_of_property;
            $selected['possession']=$properties_val->possession;
            $selected['available_date']=$properties_val->available_date;
            $selected['Willing']=$properties_val->Willing;
            $selected['brokers_contacting']=$properties_val->brokers_contacting;
            $selected['avaiable_type']=$properties_val->avaiable_type;
            $selected['suitable']=$properties_val->suitable;
            $selected['property_image']=$properties_val->property_image;;
            $selected['ownership']=$properties_val->ownership;
            $selected['excepted_price']=$properties_val->excepted_price;
            $selected['persft_price']=$properties_val->persft_price;
            $selected['price_tax']=$properties_val->price_tax;
            $selected['additoinal_price']=$properties_val->additoinal_price;
            $selected['additoinal_price_type']=$properties_val->additoinal_price_type;
            $selected['booking']=$properties_val->booking;
            $selected['width']=$properties_val->width;
            $selected['lease_type']=$properties_val->lease_type;
            $selected['rent_month']=$properties_val->rent_month;
            $selected['lease_year']=$properties_val->lease_year;
            $selected['textarea']=$properties_val->textarea;
            $selected['amenities']=$properties_val->amenities;
            $selected['propert_features']=$properties_val->propert_features;
            $selected['society_building']=$properties_val->society_building;
            $selected['additional_feature']=$properties_val->additional_feature;
            $selected['water_source']=$properties_val->water_source;
            $selected['overlooking']=$properties_val->overlooking;
            $selected['other_features']=$properties_val->other_features;
            $selected['power_back_up']=$properties_val->power_back_up;
            $selected['property_facing']=$properties_val->property_facing;
            $selected['type_of_flooring']=$properties_val->type_of_flooring;
            $selected['Width_of_faching']=$properties_val->Width_of_faching;
            $selected['location']=$properties_val->location;
            $selected['avaiable_type']=$properties_val->avaiable_type;
            $selected['faching_type']=$properties_val->faching_type;
            $selected['property_suggest']=$properties_val->property_suggest;
            $selected['apartment_society']=$properties_val->apartment_society;
            $selected['Located_inside']=$properties_val->Located_inside;
            $selected['floors_allowed']=$properties_val->floors_allowed;
            $selected['existing_image']=$properties_val->property_image;

        }

        
        if($request->isMethod('post')){
            if($request->hasFile('property_image')){
                $imageName = time().'.'.$request->property_image->extension();
                $request->property_image->move(public_path('admin/products/images'), $imageName);
            }else{
                if($request->input('id') > 0){
                    $imageName = $properties_val->property_image;
                }else{
                    $imageName = $request->existing_image;
                }
            }

            $properties = [
            'property_type' =>$request->property_type,
            'property_cat' =>$request->property_cat,
            'properties_type' =>$request->properties_type,
            'what_kind' =>$request->what_kind,
            'city' =>$request->city,
            'apartment'=>$request->apartment,
            'project'=>$request->project,
            'sub_locality'=>$request->sub_locality,
            'locality'=>$request->locality,
            'house_no'   =>$request->house_no,
            'address'=>$request->address,
            'zone_type'=>$request->zone_type,
            'your_apartment'=>$request->your_apartment,
            'no_of_bathrooms'=>$request->no_of_bathrooms,
            'no_of_bedrooms'=>$request->no_of_bedrooms,
            'balconie'=>$request->balconie,
            'carpet_area'=>$request->carpet_area,
            'built_area'=>$request->built_area,
            'super_area'=>$request->super_area,
            'other_rooms'=>$request->other_rooms,
            'length'=>$request->length,
            'breadth'=>$request->breadth,
            'furnishing'=>$request->furnishing,
            'reserve_parking'=>$request->reserve_parking,
            'floor_details'=>$request->floor_details,
            'floor_details_type'=>$request->floor_details_type,
            'floors_allowed'=>$request->floors_allowed,
            'boundary'=>$request->boundary,
            'open_sides'=>$request->open_sides,
            'any_construction'=>$request->any_construction,
            'availability_status'=>$request->availability_status,
            'age_of_property' =>$request->age_of_property,
            'possession' =>$request->possession,
            'available_date' =>$request->available_date,
            'Willing' =>$request->Willing,
            'brokers_contacting' =>$request->brokers_contacting,
            'avaiable_type' =>$request->avaiable_type,
            'suitable' =>$request->suitable,
            'property_image'=>$imageName,
            'ownership'=>$request->ownership,
            'excepted_price'=>$request->excepted_price,
            'persft_price'=>$request->persft_price,
            'price_tax'=>$request->price_tax,
            'additoinal_price'=>$request->additoinal_price,
            'additoinal_price_type'=>$request->additoinal_price_type,
            'booking'=>$request->booking,
            'width'=>$request->width,
            'lease_type'=>$request->lease_type,
            'rent_month'=>$request->rent_month,
            'lease_year'=>$request->lease_year,
            'textarea'=>$request->textarea,
            'amenities'=>$request->amenities,
            'propert_features'=>$request->propert_features,
            'society_building'=>$request->society_building,
            'additional_feature'=>$request->additional_feature,
            'water_source'=>$request->water_source,
            'overlooking'=>$request->overlooking,
            'other_features'=>$request->other_features,
            'power_back_up'=>$request->power_back_up,
            'property_facing'=>$request->property_facing,
            'type_of_flooring'=>$request->type_of_flooring,
            'Width_of_faching'=>$request->Width_of_faching,
            'location'=>$request->location,
            'avaiable_type'=>$request->avaiable_type,
            'faching_type'=>$request->faching_type,
            'faching_type'=>$request->faching_type,
            'apartment_society'=>$request->apartment_society,
            'property_suggest'=>$request->property_suggest,
            'Located_inside'=>$request->Located_inside,
            ];
            // return $properties;

            if($request->input('id') > 0){
                $message = "Updated";
                Property::find($request->input('id'))->update($properties);
            }else{
                $message = "Created";
                Property::create($properties);
            }
            return response()->json(['status' => 200, 'message' => 'Properties '.$message.' Successfuly']);
        }
        $residential = PropertyCategory::where('type',1)->get();
        $commercial = PropertyCategory::where('type',2)->get();
        $kind = Property::where('properties_type',$selected['properties_type'])->get();

        return view("admin/pages/properties/create",compact('selected', 'residential','commercial', 'kind'));
    }


    //detete

    //delete
    public function delete($id){
        Property::find($id)->delete();
        return response()->json(['status' => 200, 'message' => 'Property Deleted
         successfuly']);
    }


    public function getting(request $request){
        $categories_val = PropertyCategory::where('type', $request->p_type)->get();
        $selected= "";
        $selected = '<option value="">Select</option>';
        foreach ($categories_val as $key => $value) {
            $selected.= '<option value="'. $value["name"] .'" >'. $value["name"] .'</option>';
        }
        return response()->json(['status' => 200, 'data' => $selected]);

    }


    public function kindGet(request $request){
        $kind_val = Kind::where('kinds_type', $request->data)->get();
        $selected= "";
        $selected = '<option value="">Select</option>';
        foreach ($kind_val as $key => $value) {
            $selected.= '<option value="'. $value["kind"] .'" >'. $value["kind"] .'</option>';
        }
        return response()->json(['status' => 200, 'data' => $selected]);

    }


}
