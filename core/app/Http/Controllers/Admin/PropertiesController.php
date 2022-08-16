<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Properties;
use App\Models\PropertiesGallery;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = 'properties';
        $data['propertiesActive'] = "active";
        $data['allproperties'] = Properties::with('location', 'type')
            ->when($request->has('trashed'), function ($query) {
                $query->onlyTrashed();
            })
            ->latest()
            ->get();
        return view('backend.property.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'properties-create';
        $data['propertiesActive'] = "active";
        $data['locations'] = Location::all();
        $data['property_types'] = PropertyType::all();
        return view('backend.property.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'property_type' => 'required',
            'status' => 'required',
            'land_area' => 'required',
            'apartment_size' => 'required',
            'room' => 'required',
            'bathroom' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $properties = new Properties();

        $properties->name = $request->name;
        $properties->slug = $request->slug;
        $properties->address = $request->address;
        $properties->location_id = $request->location;
        $properties->property_type_id = $request->property_type;
        $properties->status = $request->status;
        $properties->completion_date = $request->completion_date;
        $properties->launch_date = $request->launch_date;
        $properties->land_area = $request->land_area;
        $properties->apartment_size = $request->apartment_size;
        $properties->no_of_floors = $request->no_of_floor;
        $properties->apartment_floor = $request->apartment_floor;
        $properties->room = $request->room;
        $properties->bathroom = $request->bathroom;
        $properties->bedroom = $request->bedroom;
        $properties->garages = $request->garages;
        $properties->property_vedio = $request->vedio_link;
        $properties->property_map_link = $request->map_link;
        $properties->details = $request->details;


        if ($request->has('image')) {

            $path = filePath('properties');

            $filename = uploadImage($request->image, $path, $properties->picture);

            $properties->picture = $filename;
        }

        if ($request->has('floor_image')) {

            $path = filePath('properties');

            $filename = uploadImage($request->floor_image, $path, $properties->floor_plan_image);

            $properties->floor_plan_image = $filename;
        }

        $properties->save();

        $count = 1;
        if ($request->has('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery_image = $file;
                $path = filePath('properties-gallery');
                $filename = uploadImage($gallery_image, $path);
                $property_gallery = new PropertiesGallery();
                $property_gallery->property_id = $properties->id;
                $property_gallery->image = $filename;
                $property_gallery->save();
                $count++;
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'property Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['property'] = Properties::findOrFail($id);
        $data['pageTitle'] = 'properties-edit';
        $data['propertiesActive'] = "active";
        $data['locations'] = Location::all();
        $data['property_types'] = PropertyType::all();
        return view('backend.property.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'property_type' => 'required',
            'status' => 'required',
            'land_area' => 'required',
            'apartment_size' => 'required',
            'room' => 'required',
            'bathroom' => 'required',
            'details' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $properties = Properties::findOrFail($id);

        $properties->name = $request->name;
        $properties->slug = $request->slug;
        $properties->address = $request->address;
        $properties->location_id = $request->location;
        $properties->property_type_id = $request->property_type;
        $properties->status = $request->status;
        $properties->completion_date = $request->completion_date;
        $properties->launch_date = $request->launch_date;
        $properties->land_area = $request->land_area;
        $properties->apartment_size = $request->apartment_size;
        $properties->no_of_floors = $request->no_of_floor;
        $properties->apartment_floor = $request->apartment_floor;
        $properties->room = $request->room;
        $properties->bathroom = $request->bathroom;
        $properties->bedroom = $request->bedroom;
        $properties->garages = $request->garages;
        $properties->property_vedio = $request->vedio_link;
        $properties->property_map_link = $request->map_link;
        $properties->details = $request->details;


        if ($request->has('image')) {

            $path = filePath('properties');

            $size = "";

            $filename = uploadImage($request->image, $path, $size, $properties->picture);

            $properties->picture = $filename;
        }

        if ($request->has('floor_image')) {

            $path = filePath('properties');

            $size = "";

            $filename = uploadImage($request->floor_image, $path, $size, $properties->floor_plan_image);

            $properties->floor_plan_image = $filename;
        }

        $properties->save();

        $count = 1;
        if ($request->has('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery_image = $file;
                $path = filePath('properties-gallery');
                $filename = uploadImage($gallery_image, $path);
                $property_gallery = new PropertiesGallery();
                $property_gallery->property_id = $properties->id;
                $property_gallery->image = $filename;
                $property_gallery->save();
                $count++;
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'property Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Properties::find($id)->delete();

        return back()->with('success', 'Property Deleted successfully');
    }

    public function propertyRestore($id)
    {
        Properties::withTrashed()->find($id)->restore();

        return back()->with('success', 'Property Successfully Restore');
    }


    public function propertyDelete($id)
    {

        $property = Properties::onlyTrashed()->findOrFail($id);

        if ($property->picture) {
            removeFile(filePath('properties') . '/' . @$property->picture);
        }

        $image = PropertiesGallery::where('property_id', $id)->get();

        foreach ($image as $image) {
            removeFile(filePath('properties-gallery') . '/' . @$image->image);
        }

        $property->forceDelete();

        return back()->with('success', 'Property Deleted successfully');
    }


    public function propertyStatusUpdate(Request $request, $id)
    {
        $status = Properties::find($id);
        $status->is_active = $request->status;
        $status->save();
        return response()->json('Status Successfully Updated');
    }

    public function propertyFeaturedUpdate(Request $request, $id)
    {
        $fetaured = Properties::find($id);
        $fetaured->is_featured = $request->featured;
        $fetaured->save();
        return response()->json('Status Successfully Updated');
    }

    public function propertyPopularUpdate(Request $request, $id)
    {
        $popular = Properties::find($id);
        $popular->is_popular = $request->popular;
        $popular->save();
        return response()->json('Status Successfully Updated');
    }
}
