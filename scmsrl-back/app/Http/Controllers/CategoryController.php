<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Category::class);
    }

    public function index()
    {
        $this->authorize('viewAny', Category::class);
        return view('category.index', [
            'categories' => Category::withCount('posts')->orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('category.create');
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
        $this->authorize('create', Category::class);
        $this->validate($request, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required'],
            'slug' => ['required','string','max:30'],
            'meta_title' => ['required','string','max:70'],
            'meta_desc' => ['required','string','max:200'],
            'visibility'=>['required','string']
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
            'visibility'=>$request->input('visibility'),
            'meta_title' => $request->input('meta_title'),
            'meta_desc' => $request->input('meta_desc')
        ];

        $post = Category::create($data);

        /*   if ($request->has('category')) {
               $post->categories()->sync($request->input('category'));
           }
    */
        return redirect()->route('category.index')->with('success', 'categoria creada correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $this->authorize('update', $category);
        return view('category.edit', [
            'category' => $category,
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
        $category = Category::find($id);
        $this->authorize('update', $category);
        $this->validate($request, [
            'name' => ['required','string','max:30'],
            'description' => ['required','string','max:250'],
            'featured_img' => ['image', 'mimes:png,jpg,jpeg,bmp','required'],
            'slug' => ['required','string','max:30'],
            'meta_title' => ['required','string','max:70'],
            'meta_desc' => ['required','string','max:200'],
            'visibility'=>['required',Rule::in(['true','false'])]
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
            'visibility'=>$request->input('visibility'),
            'meta_title' => $request->input('meta_title'),
            'meta_desc' => $request->input('meta_desc')
        ];

        /*if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadOne($request->file('cover_image'));
        }*/
        $oldImg=\explode('/', $category->featured_img)[2];
        Storage::delete('public/uploads/'.$oldImg);
        $category->update($data);
        /* if ($request->has('category')) {
             $post->categories()->sync($request->input('category'));
         } else {
             $post->categories()->detach();
         }*/

        return redirect()->route('category.index')->with('success', 'categoria actualizada correctamente!');
    }

    public function filterBy(Request $request)
    {
        $this->authorize('viewAny', Category::class);

        $this->validate($request, [
            'filterParameter' => ['required','string','max:20', Rule::in(['name'])],
            'name' => ['required','string','max:200'],
        ]);

        if (Str::of($request->filterParameter)->exactly('name')) {
            $categories = Category::where('name', '=', $request->name)->orderBy('created_at', 'desc')->paginate(7);
        }

        return view('category.index', [
            'categories' => $categories
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
        $category = Category::find($id);
        $this->authorize('delete', $category);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'categoria eliminada correctamente!');
    }
}