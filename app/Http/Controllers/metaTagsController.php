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


    public function getMetags()
    {
       return response()->json(metaTags::all());
    }


    public function getMetag($id)
    {
        $metaTag = metaTags::find($id);
        return response()->json($metaTag);
    }


    public function update($id,$data)
    {
        $metaTag = metaTags::find($id);
        $metaTag->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\metaTags  $metaTags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        metaTags::destroy($id);

       // $metaTag->delete();
    }
}
