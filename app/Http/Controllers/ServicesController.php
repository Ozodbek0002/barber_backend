<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servic = Services::OrderBy('id', 'DESC')->get();
        return view('admin.services.index', [
            'services' => $servic
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $services = new Services();
        $services->services_name = $request->services_name;
        $services->cost = $request->cost;
        $services->barber_id = $request->barber_id;
        $services->save();
        $request->validate([
            'services_name' => 'required',
            'cost' => 'required',
            'barber_id' => 'required'
        ]);
        Services::create($request->all());
        return redirect()->route('admin.services.index');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services,$id)
    {
        $services=Services::findor($id);
        return view('admin.services.show', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services, $id)
    {
//        dd($services->id);
        $services = Services::find($id);

        return view('admin.services.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'services_name'=>'required',
            'cost'=>'required',
            'barber_id'=>'required'
        ]);
//        dd($request->);
$services=Services::find($id);
$services->services_name=$request->services_name;
$services->cost=$request->cost;
$services->barber_id=$request->barber_id;
$services->save();

//        $services->update($request->all());
        return  redirect(route('admin.services.index'));
    }


    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}