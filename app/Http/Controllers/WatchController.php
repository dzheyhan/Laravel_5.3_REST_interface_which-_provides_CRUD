<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\WatchRequest;
use App\Watch;
use App\watch_model;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watches = Watch::all();
        return  view('watches.index', compact('watches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::lists('brand','id');
        $models = watch_model::lists('model','id');

        return  view ('watches.create', compact('brands','models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WatchRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(WatchRequest $request)
    {
        $new_watch =  new Watch;
        $new_watch -> brand_id = $request->brand_id;
        $new_watch -> model_id = $request->model_id;
        $new_watch -> movement = $request->movement;
        $new_watch -> gender   = $request->gender;
        $new_watch -> save();

        Flash::success('The record is added');
        return  redirect('watches/');
    }

    /**
     * Display the specified resource.
     *
     * @param Watch $watches
     * @internal param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Watch $watches)
    {
        return  view('watches.show', compact('watches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Watch $watches
     * @internal param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Watch $watches)
    {
        $brands = Brand::lists('brand','id');
        $models = watch_model::lists('model','id');

        return  view('watches.edit', compact('watches','brands', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WatchRequest|Request $request
     * @param Watch $watches
     * @internal param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WatchRequest $request,Watch $watches)
    {

        $watches->update($request->all());
        Flash::success('The recording update is success');

        return redirect('watches/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Watch $watches
     * @throws \Exception
     * @internal param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watch $watches)
{
    $watches->delete();
    Flash::success('The record was deleted successfully');

    return redirect('watches/');
}

    /**
     * Get the Model witch ID.
     *
     * @param $id
     * @internal param int $id
     * @return \Illuminate\Http\Response
     */
    public function getModel($id)
    {
        if(!is_numeric($id) ){
            return false;
        }
        $models = watch_model::where('brand_id', '=', $id)->get();
        return $models;

    }

}
