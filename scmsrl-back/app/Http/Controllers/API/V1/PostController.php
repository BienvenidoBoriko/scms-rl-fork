<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['tags','category','metaTags'])->orderBy('created_at', 'desc')->paginate(7);
        return response([ 'posts' => PostResource::collection($posts), 'message' => 'Retrieved successfully'], 200);
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
            'title' => ['required','string','max:200'],
           // 'status' => ['required','string',Rule::in(['publiced,draff']),'max:10'],//draff como borrador
            'author_id' => ['required','integer','max:20'],
            'published_at'=>['nullable','date'],
            'html' => ['required','string'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required'],
            'featured' => ['required','boolean'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'custom_except' => ['required','string','nullable','max:200'],
            'slug' => ['required','string','max:200'],
            'tags' => ['required','array'],
            'category_id' => ['required','string','nullable']
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        try {
            $post = Post::create($data);
            $tags = Tag::find($request->input('tags'));
            $post->tags()->attach($tags);
            Meta_tags::create([
            'name' => 'meta_title',
            'value'=>$request->input('meta_title'),
            'post_id'=>$post->id
        ]);

            Meta_tags::create([
            'name' => 'meta_desc',
            'value'=>$request->input('meta_desc'),
            'post_id'=>$post->id
        ]);
            DB::commit();
            return response([ 'user' => new PostResource($user), 'message' => 'Created successfully'], 200);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::with(['tags','category','metaTags'])->where('id', $id)->get();
        return response([ 'post' => new PostResource($post), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return response([ 'user' => new PostResource($post), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response(['message' => 'Post Deleted']);
    }
}