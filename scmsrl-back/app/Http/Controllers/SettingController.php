<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Config;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Setting::class, 'setting');
    }

    public function index()
    {
        return view('setting.index', ['title'=>Setting::where('name', 'title')->first(),
        'desc'=>Setting::where('name', 'desc')->first(),'lang'=>Setting::where('name', 'lang')->first(),
        'facebook'=>Setting::where('name', 'facebook')->first(),'twitter'=>Setting::where('name', 'twitter')->first(),
        'email'=>Setting::where('name', 'email')->first(),'github'=>Setting::where('name', 'github')->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {

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
        $this->validate($request, [
            'title' => ['required','string','max:200'],
            'desc' => ['required','string','max:250'],
            'lang' => ['required','string','max:10'],
            'cover_img' => ['image', 'mimes:png,jpg,jpeg,bmp','nullable'],
            'facebook' => ['required','string','max:200'],
            'twitter' => ['required','string','max:200'],
            'email' => ['required','string','max:200'],
            'github' => ['required','string','max:200']
        ]);

        if (!empty($request->file('cover_img'))) {
            $extension = $request->file('cover_img')->extension();

            Storage::deleteDirectory('public/uploads/header-img');
            $request->file('cover_img')->storeAs(
                'public/uploads/header-img',
                'header-img.'.$extension
            );
            $pathCoverImg = 'storage/uploads/header-img.'.$extension;
            $data = [

            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'lang' => $request->input('lang'),
            'cover_image' => $pathCoverImg,
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'email' => $request->input('email'),
            'github' => $request->input('github'),
        ];
        } else {
            $data = [

            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'lang' => $request->input('lang'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'email' => $request->input('email'),
            'github' => $request->input('github'),
        ];
        }


        foreach ($data as $name => $value) {
            $data = [
                'name' => $name,
                'value' => $value,
                'type' => 'page'
            ];
            /* if (Str::of($name)->exactly('title')) {
                config(['.env.site_title' => 'hola']);
                return redirect()->route('setting.index')->with('success', 'troll');
            } */
            $setting = Setting::where('name', $name);
            $setting->update($data);
            //Setting::create($data);
        }
        return redirect()->route('setting.index')->with('success', 'ajustes guardados correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //Setting::find($id)->delete();
    }
}