<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\metaTags;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'profile_img'=>['required', 'string', 'max:255'],
            'cover_img'=>['required', 'string', 'max:255'],
            'bio'=>['required', 'string', 'max:255'],
            'github'=>['string', 'max:70'],
            'website'=>['string', 'max:100'],
            'twitter'=>['string', 'max:50'],
            'slug'=>['required', 'string', 'max:50'],
            'rol'=>['required', 'integer'],
            'meta_title'=>['required', 'string'],
            'meta_desc'=>['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data) {
            try {
              DB::beginTransaction();

            $user= User::create([
                'name' => $data['name'],
                'profile_img'=>$data['profile_img'],
                'cover_img'=>$data['cover_img'],
                'bio'=>$data['bio'],
                'github'=>$data['github'],
                'website'=>$data['website'],
                'twitter'=>$data['twitter'],
                'slug'=>$data['slug'],
                'rol'=>$data['rol'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                ]);

                metaTags::create([
                    'name' => 'meta_title',
                    'value'=>$data['meta_title'],
                    'type'=>'post',
                    'id_owner'=>$user->id()
                ]);

                metaTags::create([
                    'name' => 'meta_desc',
                    'value'=>$data['meta_desc'],
                    'type'=>'post',
                    'id_owner'=>$user->id()
                ]);
              DB::commit();
            } catch (Exception $e) {
              db::rollback();
            }

            return $user;
          }

    }
}

