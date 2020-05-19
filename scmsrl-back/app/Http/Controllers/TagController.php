<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        return view('tag.index', [
            'tags' => Tag::withCount('posts')->orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Tag::class);
        return view('tag.create');
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
        $this->authorize('create', Tag::class);
        $this->validate($request, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required'],
            'slug' => ['required','string','max:30'],
            'meta_title' => ['required','string','max:70'],
            'meta_desc' => ['required','string','max:200'],
        ]);
        $tiempo=time();
        $request->file('featured_img')->storeAs(
            'public/uploads/',
            $tiempo .  \trim($request->file('featured_img')->getClientOriginalName())
        );
        $pathFeaturedImg = 'storage/uploads/'. $tiempo .\trim($request->file('featured_img')->getClientOriginalName());
        $data = [

            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'featured_img' => $pathFeaturedImg,
            'slug' => $request->input('slug'),
            'meta_title' => $request->input('meta_title'),
            'meta_desc' => $request->input('meta_desc'),
        ];

        $post = Tag::create($data);

        /*   if ($request->has('category')) {
               $post->categories()->sync($request->input('category'));
           }
    */
        return redirect()->route('tag.index')->with('success', 'etiqueta creada correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $this->authorize('update', $tag);
        return view('tag.edit', [
            'tag' => $tag,
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
        $tag = Tag::find($id);
        $this->authorize('update', $tag);
        $this->validate($request, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required'],
            'slug' => ['required','string','max:30'],
            'meta_title' => ['required','string','max:70'],
            'meta_desc' => ['required','string','max:200'],
        ]);
        if (!empty($request->file('featured_img'))) {
            $tiempo=time();
            $request->file('featured_img')->storeAs(
                'public/uploads/',
                $tiempo .  \trim($request->file('featured_img')->getClientOriginalName())
            );
            $pathFeaturedImg = 'storage/uploads/'. $tiempo .\trim($request->file('featured_img')->getClientOriginalName());
        } else {
            $pathFeaturedImg=$post->featured_img;
        }
        $data = [

            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'featured_img' => $pathFeaturedImg,
            'slug' => $request->input('slug'),
            'meta_title' => $request->input('meta_title'),
            'meta_desc' => $request->input('meta_desc')
        ];

        /*if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadOne($request->file('cover_image'));
        }*/

        $oldImg=\explode('/', $tag->featured_img)[2];
        Storage::delete('public/uploads/'.$oldImg);
        $tag->update($data);

        return redirect()->route('tag.index')->with('success', 'Etiqueta actualizada correctamente!');
    }

    public function filterBy(Request $request)
    {
        $this->authorize('viewAny', Tag::class);
        $this->validate($request, [
            'filterParameter' => ['required','string','max:20', Rule::in(['name'])],
            'name' => ['required','string','max:200'],
        ]);

        if (Str::of($request->filterParameter)->exactly('name')) {
            $tags = Tag::where('name', '=', $request->name)->orderBy('created_at', 'desc')->paginate(7);
        }

        return view('tag.index', [
            'tags' => $tags
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $tag= Tag::find($id);
        $this->authorize('delete', $tag);
        $tag->delete();
        return redirect()->route('tag.index')->with('success', 'Etiqueta eliminada correctamente!');
    }
}