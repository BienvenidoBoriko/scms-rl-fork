<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return response([ 'tags' => TagResource::collection($tags), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required'],
            'slug' => ['required','string','max:30'],
            'meta_title' => ['required','string','max:70'],
            'meta_desc' => ['required','string','max:200'],
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $tag = Tag::create($data);


        return response([ 'tag' => new TagResource($tag), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response([ 'tag' => new TagResource($tag), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return response([ 'tag' => new TagResource($tag), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response(['message' => 'tag Deleted']);
    }
}
