<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('post.create', ['categories' => Category::all(), 'tags'=> Tags::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required','string','max:20'],
            'status' => ['required','string',Rule::in(['publiced,draff']),'max:10'],//draff como borrador
            'id_author' => ['required','integer','max:20'],
            'published_at'=>['nullable','date'],
            'plain_text' => ['required','string','nullable'],
            'html' => ['required','string'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required','max:70'],
            'cover_image' => ['image', 'mimes:png,jpg,jpeg,bmp', 'required','max:70'],
            'featured' => ['required','boolean'],
            'custom_except' => ['required','string','nullable','max:100'],
            'slug' => ['required','string','max:30'],
            'tags' => ['required','array','max:200'],
            'category' => ['required','string','nullable','max:30']
        ]);

        $user = Auth::user();

        $pathFeaturedImg = $data->file('featured_img')->storeAs(
            'posts/'.$request->input('title').'/featured', $request->file('profile_img')->getClientOriginalName()
        );

        $pathCovImg = $request->file('cover_image')->storeAs(
            'posts/'.$request->input('title').'/cover', $request->file('cover_img')->getClientOriginalName()
        );
        $data = [

            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'published_at' => $request->input('published_at'),
            'plain_text' => $request->input('plain_text'),
            'html' => $request->input('html'),
            'featured_img' => $pathFeaturedImg,
            'cover_image' => $pathCovImg,
            'slug' => $request->input('slug'),
            'id_author' => $user->id,
            'featured' => $request->input('featured'),
            'custom_except' => $request->input('custom_except'),
            'tags' => implode(',',$request->input('tags')),
            'category' => $request->input('category'),
        ];

        $post = Post::create($data);

     /*   if ($request->has('category')) {
            $post->categories()->sync($request->input('category'));
        }
    */
        return redirect()->route('post.index')->with('success', 'entrada creada correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', [
            'post' => $post,
            'tags' => Tags::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required','string','max:20'],
            'status' => ['required','string',Rule::in(['publiced,draff']),'max:10'],//draff como borrador
            'id_author' => ['required','integer','max:20'],
            'published_at'=>['nullable','date'],
            'plain_text' => ['required','string','nullable'],
            'html' => ['required','string'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required','max:70'],
            'cover_image' => ['image', 'mimes:png,jpg,jpeg,bmp', 'required','max:70'],
            'featured' => ['required','boolean'],
            'custom_except' => ['required','string','nullable','max:100'],
            'slug' => ['required','string','max:30'],
            'tags' => ['required','array','max:200'],
            'category' => ['required','string','nullable','max:30']
        ]);

        $data = [

            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'published_at' => $request->input('published_at'),
            'plain_text' => $request->input('plain_text'),
            'html' => $request->input('html'),
            'featured_img' => $pathFeaturedImg,
            'cover_image' => $pathCovImg,
            'slug' => $request->input('slug'),
            'id_author' => $user->id,
            'featured' => $request->input('featured'),
            'custom_except' => $request->input('custom_except'),
            'tags' => implode(',',$request->input('tags')),
            'category' => $request->input('category'),
        ];

        /*if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadOne($request->file('cover_image'));
        }*/
        $pathFeaturedImg = $data->file('featured_img')->storeAs(
            'posts/'.$request->input('title').'/featured', $request->file('profile_img')->getClientOriginalName()
        );

        $pathCovImg = $request->file('cover_image')->storeAs(
            'posts/'.$request->input('title').'/cover', $request->file('cover_img')->getClientOriginalName()
        );

        $post = Post::find($id);
        $post->update($data);

       /* if ($request->has('category')) {
            $post->categories()->sync($request->input('category'));
        } else {
            $post->categories()->detach();
        }*/

        return redirect()->route('post.edit', $post->id)->with('success', 'Entrada actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('post.index')->with('success', 'Entrada eliminada correctamente!');
    }
}
