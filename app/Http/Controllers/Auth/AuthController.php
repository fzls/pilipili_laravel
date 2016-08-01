<?php

namespace Pilipili\Http\Controllers\Auth;

use Pilipili\Http\Controllers\Controller;
use Pilipili\Image;
use Pilipili\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * where to redirect users after logout
     *
     * @var string
     */
    protected $redirectAfterLogout = '/welcome';

    /**
     * change the field used to act as the username for log in
     * in this case we want to use email or id to log in
     * to do that, we have to override the getCredentials func
     *
     * @var string
     */
    protected $username = 'email_or_id';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function show_welcome_page() {
        return view('auth.welcome');
    }

    public function change_background() {
        return url(Image::orderByRaw("rand()")->first()->filepath);
    }

    /**
     * check if the email_or_id field is email or not
     * if is, then we set the credentials to email and password
     * otherwise, we use pilipili_id and password to log in
     * @param Request $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $email_or_id = filter_var($request->input('email_or_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'pilipili_id';
        $request->merge([$email_or_id => $request->input('email_or_id')]);
        return $request->only($email_or_id, 'password');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pilipili_id' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
                                'pilipili_id'                      => $data['pilipili_id'],
                                'email'                            => $data['email'],
                                'password'                         => bcrypt($data['password']),
                                'avatar_filepath'                  => 'uploaded_img/avatar_mock_2.jpg',
                                'custom_background_image_filepath' => 'uploaded_img/detail_background_image_mock_2.jpg',
                                'role'                             => 'user',
        ]);
    }
}
