<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Meta_tags;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'profile_img'=>['required', 'image','mimes:png,jpg,jpeg,bmp', 'max:2048'],
            'cover_img'=>['required', 'image', 'mimes:png,jpg,jpeg,bmp', 'max:2048'],
            'bio'=>['required', 'string', 'max:255'],
            'github'=>['string', 'max:70'],
            'website'=>['string', 'max:100'],
            'twitter'=>['string', 'max:50'],
            'slug'=>['required', 'string', 'max:50'],
            'rol_id'=>['required', 'integer'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\User
     */
    protected function create(Request $request)
    {
        try {
             $request->file('profile_img')->storeAs(
                'public/users/'.$request['name'].'/avatar',
                $request->file('profile_img')->getClientOriginalName()
            );

            $pathProfileImg = "storage/users/".$request['name']."/avatar/".$request->file('profile_img')->getClientOriginalName();

            $request->file('cover_img')->storeAs(
                'public/users/'.$request['name'].'/cover',
                $request->file('cover_img')->getClientOriginalName()
            );

            $pathCovImg = "storage/users/".$request['name']."/cover/".$request->file('cover_img')->getClientOriginalName();

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
        }

        return redirect()->route('author.index')->with('success', 'autor creado correctamente!');
    }
}
