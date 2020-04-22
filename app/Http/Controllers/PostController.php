<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Tag;
use App\Meta_tags;
use App\Category;
use App\User;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::with(['tags', 'category'])->orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('post.create', ['users'=>User::all(),
        'categories' => Category::all(), 'tags'=> Tag::all()
        ]);
        //return view('post.create');
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
        try {
            $this->validate($request, [
            'title' => ['required','string','max:20'],
           // 'status' => ['required','string',Rule::in(['publiced,draff']),'max:10'],//draff como borrador
            'author_id' => ['required','integer','max:20'],
            'published_at'=>['nullable','date'],
            'html' => ['required','string'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required','max:70'],
            'featured' => ['required','boolean'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'custom_except' => ['required','string','nullable','max:100'],
            'slug' => ['required','string','max:30'],
            'tags' => ['required','array'],
            'category_id' => ['required','string','nullable','max:30']
        ]);

            $pathFeaturedImg = $request->file('featured_img')->storeAs(
                'posts/'.$request->input('title').'/featured',
                $request->file('featured_img')->getClientOriginalName()
            );
            $data = [

            'title' => $request->input('title'),
            'status' => 'publiced',
            'published_at' => $request->input('published_at'),
            'plain_text' => $request->input('plain_text'),
            'html' => $request->input('html'),
            'featured_img' => $pathFeaturedImg,
            'cover_image' => $pathFeaturedImg,//eliminar
            'slug' => $request->input('slug'),
            'user_id' => $request->input('author_id'),
            'featured' => $request->input('featured'),
            'custom_except' => $request->input('custom_except'),
            'category_id' => $request->input('category_id'),
        ];

            $post = Post::create($data);
            $tags = Tag::find($request->input('tags'));
            $post->tags()->attach($tags);
            Meta_tags::create([
                    'name' => 'meta_title',
                    'value'=>$request->input('meta_title'),
                    'type'=>'post',
                    'id_owner'=>$request->input('author_id')
                ]);

            Meta_tags::create([
                    'name' => 'meta_desc',
                    'value'=>$request->input('meta_desc'),
                    'type'=>'post',
                    'id_owner'=>$request->input('author_id')
                ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
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
            'author_id' => ['required','integer','max:20'],
            'published_at'=>['nullable','date'],
            'plain_text' => ['required','string','nullable'],
            'html' => ['required','string'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required','max:70'],
            'featured' => ['required','boolean'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'custom_except' => ['required','string','nullable','max:100'],
            'slug' => ['required','string','max:30'],
            'tags' => ['required','array','max:200'],
            'category_id' => ['required','string','nullable','max:30']
        ]);

        $data = [

            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'published_at' => $request->input('published_at'),
            'plain_text' => $request->input('plain_text'),
            'html' => $request->input('html'),
            'featured_img' => $pathFeaturedImg,
            'slug' => $request->input('slug'),
            'user_id' => $request->input('author_id'),
            'featured' => $request->input('featured'),
            'custom_except' => $request->input('custom_except'),
            'tags' => implode(',', $request->input('tags')),
            'category_id' => $request->input('category_id'),
        ];

        /*if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadOne($request->file('cover_image'));
        }*/
        $pathFeaturedImg = $request->file('featured_img')->storeAs(
            'posts/'.$request->input('title').'/featured',
            $request->file('profile_img')->getClientOriginalName()
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
