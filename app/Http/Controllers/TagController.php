<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index', [
            'tags' => Tag::orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        //return view('post.create', ['categories' => Category::all(), 'tags'=> Tags::all()]);
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
        $this->validate($request, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required','max:70'],
            'slug' => ['required','string','max:30'],
        ]);

        $pathFeaturedImg = $data->file('featured_img')->storeAs(
            'tags/'.$request->input('name').'/featured', $request->file('featured_img')->getClientOriginalName()
        );
        $data = [

            'name' => $request->input('name'),
            'decription' => $request->input('decription'),
            'featured_img' => $pathFeaturedImg,
            'slug' => $request->input('slug'),
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
        $this->validate($request, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required','max:70'],
            'slug' => ['required','string','max:30'],
        ]);

        $pathFeaturedImg = $data->file('featured_img')->storeAs(
            'tags/'.$request->input('name').'/featured', $request->file('featured_img')->getClientOriginalName()
        );
        $data = [

            'name' => $request->input('name'),
            'decription' => $request->input('decription'),
            'featured_img' => $pathFeaturedImg,
            'slug' => $request->input('slug'),
        ];

        /*if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadOne($request->file('cover_image'));
        }*/

        $tag = Tag::find($id);
        $tag->update($data);

       /* if ($request->has('category')) {
            $post->categories()->sync($request->input('category'));
        } else {
            $post->categories()->detach();
        }*/

        return redirect()->route('tag.edit', $post->id)->with('success', 'Etiqueta actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        return redirect()->route('tag.index')->with('success', 'Etiqueta eliminada correctamente!');
    }
}
