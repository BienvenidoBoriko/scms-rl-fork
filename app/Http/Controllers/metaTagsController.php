<?php

namespace App\Http\Controllers;

use App\metaTags;
use Illuminate\Http\Request;

class metaTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(array $data)
    {
        //validar los datos a insertar en la metaTags
        $validator = Validator::make($data, [
            'name' => ['required','string','max:25'],
            'value' => ['required','string','max:50'],
            'type' => ['required','string',Rule::in(['post','tag','category','author'])],
            'id_owner' => ['required','string','max:20'],
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        return metaTags::create([
                'name' => $data['name'],
                'value'=>$data['value'],
                'type'=>$data['type'],
                'id_owner'=>$data['id_owner']
            ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\metaTags  $metaTags
     * @return \Illuminate\Http\Response
     */
    public function show(metaTags $metaTags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\metaTags  $metaTags
     * @return \Illuminate\Http\Response
     */
    public function edit(metaTags $metaTags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\metaTags  $metaTags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, metaTags $metaTags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\metaTags  $metaTags
     * @return \Illuminate\Http\Response
     */
    public function destroy(metaTags $metaTags)
    {
        //
    }
}
