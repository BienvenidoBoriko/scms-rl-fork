<?php

namespace App\Http\Controllers;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class SettingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Setting::class, 'setting');
    }

    public function index()
    {
        return view('setting.index', ['title'=>Setting::where('name','title')->first(),
        'desc'=>Setting::where('name','desc')->first(),'lang'=>Setting::where('name','lang')->first(),
        'admin'=>Setting::where('name','admin')->first(),
        'users' => User::with('rol')->get()
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
        $settings = $request->all();
        foreach($settings as $name => $value) {
            $data = [

                'name' => $name,
                'value' => $value,
                'type' => 'page'
            ];
            $setting = Setting::where('name',$name);
            $setting->update($data);
            Setting::create($data);
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
