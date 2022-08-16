<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['pageTitle'] = 'Locations';
        $data['locationsActive'] = "active";
        $data['locations'] = Location::
        when($request->has('trashed'),function($query){
         $query->onlyTrashed();
        })
        ->latest()
        ->get();
        return view('backend.location.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:locations',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $location = new Location();

        $location->name = $request->name;

        if ($request->has('image')) {

            $path = filePath('location');
            $size = '750x500';
            $filename = uploadImage($request->image, $path, $size, $location->image);

            $location->image = $filename;
        }

        $location->save();

        return back()->with('success', 'Location added successfully');
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
        //
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
        $data = Location::find($id);
        $this->validate($request, [
            "name" => 'required|unique:locations,name,' . $data->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $data->name = $request->name;

        if ($request->has('image')) {

            $path = filePath('location');
            $size = '750x500';
            $filename = uploadImage($request->image, $path, $size, $data->image);

            $data->image = $filename;
        }

        $data->save();

        return back()->with('success', 'Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);

        $location->delete();

        return back()->with('success', 'Location Deleted successfully');
    }

    public function locationRestore($id){
        Location::withTrashed()->find($id)->restore();
  
        return back()->with('success','Location Successfully Restore');
    }

    public function Delete($id){
        $location = Location::onlyTrashed()->findOrFail($id);

        if ($location->image) {
            removeFile(filePath('location') . '/' . @$location->image);
        }

        $location->forceDelete();

        return back()->with('success', 'Location Deleted successfully');
    }

    

    public function locationPopularUpdate(Request $request, $id)
    {
        $location = Location::find($id);
        $location->popular_location = $request->status;
        $location->save();
        return response()->json('Status Successfully Updated');
    }
}
