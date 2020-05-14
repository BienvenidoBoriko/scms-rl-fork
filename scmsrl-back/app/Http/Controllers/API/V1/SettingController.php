<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Setting::class, 'setting');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return response([ 'settings' => ApiResource::collection($settings), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response(['message'=>'option not sopported'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return response(['message'=>'option not sopported'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());

        return response([ 'setting' => new ApiResource($setting), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        return response(['message'=>'option not sopported'], 200);
    }
}