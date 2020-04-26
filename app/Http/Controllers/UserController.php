<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\rol;
use DB;
use App\Meta_tags;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.index', [
            'authors' => User::withCount('posts')->orderBy('created_at', 'desc')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('post.create', ['categories' => Category::all(), 'tags'=> Tags::all()]);
        return view('author.create',[
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
        try {
            $tiempo=time();
             $request->file('profile_img')->storeAs(
                'public/uploads/',
                $tiempo . trim($request->file('profile_img')->getClientOriginalName())
            );

            $pathProfileImg = 'uploads/'. $tiempo . trim($request->file('profile_img')->getClientOriginalName());

            $request->file('cover_img')->storeAs(
                'public/uploads/',
                $tiempo . trim($request->file('cover_img')->getClientOriginalName())
            );

            $pathCovImg = "uploads/". $tiempo . trim($request->file('cover_img')->getClientOriginalName());

            DB::beginTransaction();

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
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                ]);

            Meta_tags::create([
                    'name' => 'meta_title',
                    'value'=>$request['meta_title'],
                    'type'=>'author',
                    'id_owner'=>$user->id
                ]);

            Meta_tags::create([
                    'name' => 'meta_desc',
                    'value'=>$request['meta_desc'],
                    'type'=>'author',
                    'id_owner'=>$user->id
                ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('author.index')->with('success', 'autor creado correctamente!');

        }

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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user= User::findOrFail($id);

        if (Auth::user()->id = $user->id && $this->user->role != "admin") {
            return redirect()->route('tag.index')->with('Error', 'No estas Autorizado');

        }
        try
        {
            $user->delete();
            return redirect()->route('post.index')->with('success', 'usuario eliminado correctamente!');
        } catch (Exception $e) {
            return redirect()->route('post.index')->with('Error_eliminando_usuario', $e->getStatusCode());
        }
    }
}
