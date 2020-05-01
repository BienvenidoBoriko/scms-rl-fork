<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\rol;
use DB;
use App\Meta_tags;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function __construct()
    {
       // $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        return view('author.index', [
            'authors' => User::with('rol')->withCount('posts')->orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('author.create', [
            'rols'=> rol::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'profile_img'=>['required', 'image','mimes:png,jpg,jpeg,bmp'],
            'cover_img'=>['required', 'image', 'mimes:png,jpg,jpeg,bmp'],
            'bio'=>['required', 'string', 'max:255'],
            'github'=>['string', 'max:70'],
            'website'=>['string', 'max:100'],
            'twitter'=>['string', 'max:50'],
            'slug'=>['required', 'string', 'max:50'],
            'rol_id'=>['required', 'integer'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $tiempo=time();
        $request->file('profile_img')->storeAs(
            'public/uploads/',
            $tiempo . trim($request->file('profile_img')->getClientOriginalName())
        );

        $pathProfileImg = 'storage/uploads/'. $tiempo . trim($request->file('profile_img')->getClientOriginalName());

        $request->file('cover_img')->storeAs(
            'public/uploads/',
            $tiempo . trim($request->file('cover_img')->getClientOriginalName())
        );

        $pathCovImg = "storage/uploads/". $tiempo . trim($request->file('cover_img')->getClientOriginalName());


        $user= User::create([
                'name' => $request['name'],
                'status'=>'ofline',
                'profile_img'=>$pathProfileImg,
                'cover_img'=>$pathCovImg,
                'bio'=>$request['bio'],
                'github'=>$request['github'],
                'website'=>$request['website'],
                'twitter'=>$request['twitter'],
                'slug'=>$request['slug'],
                'rol_id'=>$request['rol_id'],
                'meta_title'=>$request['meta_title'],
                'meta_desc'=>$request['meta_desc'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                ]);

        return redirect()->route('author.index')->with('success', 'autor creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update',$user);
        return view('author.edit', [
            'author' => $user,
            'rols'=> rol::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'profile_img'=>['required', 'image','mimes:png,jpg,jpeg,bmp'],
            'cover_img'=>['required', 'image', 'mimes:png,jpg,jpeg,bmp'],
            'bio'=>['required', 'string', 'max:255'],
            'github'=>['string', 'max:70'],
            'website'=>['string', 'max:100'],
            'twitter'=>['string', 'max:50'],
            'slug'=>['required', 'string', 'max:50'],
            'rol_id'=>['required', 'integer'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'password' => ['required', 'string', 'min:8'],
        ]);



        $tiempo=time();
        $request->file('profile_img')->storeAs(
            'public/uploads/',
            $tiempo . trim($request->file('profile_img')->getClientOriginalName())
        );

        $pathProfileImg = 'storage/uploads/'. $tiempo . trim($request->file('profile_img')->getClientOriginalName());

        $request->file('cover_img')->storeAs(
            'public/uploads/',
            $tiempo . trim($request->file('cover_img')->getClientOriginalName())
        );

        $pathCovImg = "storage/uploads/". $tiempo . trim($request->file('cover_img')->getClientOriginalName());

        $oldImg=\explode('/' ,$user->profile_img)[2];
        Storage::delete('public/uploads/'.$oldImg);
        $oldImg=\explode('/' ,$user->cover_img)[2];
        Storage::delete('public/uploads/'.$oldImg);

        $data=([
                'name' => $request['name'],
                'status'=>'ofline',
                'profile_img'=>$pathProfileImg,
                'cover_img'=>$pathCovImg,
                'bio'=>$request['bio'],
                'github'=>$request['github'],
                'website'=>$request['website'],
                'twitter'=>$request['twitter'],
                'slug'=>$request['slug'],
                'rol_id'=>$request['rol_id'],
                'meta_title'=>$request['meta_title'],
                'meta_desc'=>$request['meta_desc'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                ]);

         $user->update($data);

        return redirect()->route('author.index')->with('success', 'autor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user= User::find($id);
        $this->authorize('delete', $user);
        $user->delete();
         return redirect()->route('author.index')->with('success', 'usuario eliminado correctamente!');
    }
}
