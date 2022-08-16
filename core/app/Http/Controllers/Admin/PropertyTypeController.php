<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Property-Type';
        $data['propertytypeActive'] = "active";
        $data['types'] = PropertyType::when($request->has('trashed'), function ($query) {
                $query->onlyTrashed();
            })
            ->latest()
            ->get();

        return view('backend.property_type.index')->with($data);
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
            'name' => 'required|unique:property_types',
        ]);

        PropertyType::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Property Type added successfully');
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
        $data = PropertyType::findOrFail($id);
        $this->validate($request, [
            "name" => 'required|unique:property_types,name,' . $data->id,
        ]);

        $data->name = $request->name;

        $data->save();

        return back()->with('success', 'Property Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PropertyType::findOrFail($id)->delete();

        return back()->with('success', 'Property Type Deleted successfully');
    }

    public function propertytypeRestore($id){        
        PropertyType::withTrashed()->findOrFail($id)->restore();
  
        return back()->with('success','Property Type Successfully Restore');
    }

    public function propertytypeDelete($id){
       PropertyType::onlyTrashed()->findOrFail($id)->forceDelete();
        
        return back()->with('success', 'Property Type Deleted successfully');
    }
}
