<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    // authentication to use username instead of email
    public function username()
    {
        return 'username';
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, LoginRequest $request2)
    {
        if ($request->input('email') != 'masquerade@strathmore.edu' && is_null($request->input('username'))){

            $request2->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }
        try{

            /*
                init code
            */
            // $request2->authenticate();

            // $request2->session()->regenerate();

            // // return redirect()->intended(RouteServiceProvider::HOME);
            // return redirect()->intended('/');

            /*
                init code
            */

            /*
                other code
            */
            // check if username and password have been entered
            if (is_null($request->input('username')) || is_null($request->input('password'))) {
                return Redirect::back()->withErrors(['username' => ['Username is required'], 'password' => ['Password is required']]);
            }

            // get ldap credentials
            $ldap_host = env("LDAP_HOSTS");
            $ldap_domain = env("STRATHMORE_DOMAIN");
            $ldap_std_domain = env("STUDENTS_DOMAIN");
            // if it is a student the admission is a numeric, so change domain
            if (is_numeric($request->input('username'))) {
                $ldap_domain = $ldap_std_domain;
            }

            // connect to ldap server
            $ad = ldap_connect("ldap://{$ldap_host}") or die('Could not connect to LDAP server.');
            ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 2);
            ldap_set_option($ad, LDAP_OPT_REFERRALS, 1);
            $bind = @ldap_bind($ad, "{$request->input('username')}@{$ldap_domain}", $request->input('password'));
            // test
            // $bind = true;

            // if was able to connect successfully
            if ($bind) {
                // try and find if user exists in local db
                $findUser = User::where('username', $request->input('username'))->get();

                //  if user is not in local db, create them
                if (empty(array_filter($findUser->toArray()))){
                    // check the Web Service and create the user
                    $arrContextOptions = array(
                        "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                        ),
                    );
                    if (is_numeric($request->input('username'))) {
                        // currently the students data service is temprarily down, so redirect to page that gives
                        // a message that any new student logins will not be working for a time until the dataservice is up again

                        // comment this out, will be uncommented when the student datservice is up and running again
                        // $user_details_web_service = file_get_contents(env('STUDENT_DATASERVICE_URL').$request->input('username'), false, stream_context_create($arrContextOptions));

                        // redirect
                        return redirect('/student/policies');
                    } else {
                        $user_details_web_service = file_get_contents(env('STAFF_DATASERVICE_URL').$request->input('username'), false, stream_context_create($arrContextOptions));
                    }

                    // test
//                     dd($user_details_web_service);

                    // check that the $user_details_web_service is not empty - for full-time staff and students it's going to return info, so won't be empty
                    // for staff interns no info will be returned so $user_details_web_service will be empty
                    if (!empty($user_details_web_service)) {
                        if (is_numeric($request->input('username'))) {
                            $student_details = json_decode($user_details_web_service);

                            // add student user to db
                            $new_user = new User;

                            $new_user->name = $student_details->studentNames;
                            $new_user->username = $student_details->studentNo;
                            $new_user->email = $student_details->email;

                            $new_user->save();

                            // test
                            // dd($student_details);
                        }else{
                            $staff_details = json_decode($user_details_web_service);
                            // add staff user to db
                            $new_user = new User;
                            $new_user->name = $staff_details->lastName.' '.$staff_details->middleName.' '.$staff_details->firstName;
                            $new_user->username = $staff_details->username;
                            $new_user->email = $staff_details->username.'@strathmore.edu';
                            $new_user->save();

                            // test
                            // dd($staff_details);
                        }

                        // finally login user
                        // find user
                        $user = User::where('username', $request->input('username'))->first();

                        // log them in and create session
                        Auth::login($user);
                        $request2->session()->regenerate();

                        // redirect
                        return redirect()->intended('/');
                    }

                    // if it's a staff intern
                    else{
                        // add staff intern user to db
                        $new_user = new User;
                        $new_user->name = $request->input('username');
                        $new_user->username = $request->input('username');
                        $new_user->email = $request->input('username').'@strathmore.edu';

                        $new_user->save();

                        // finally login user
                        // find user
                        $user = User::where('username', $request->input('username'))->first();

                        // log them in and create session
                        Auth::login($user);
                        $request2->session()->regenerate();

                        // redirect
                        return redirect()->intended('/');
                    }
                }

                // if user is found just log them in(no need to create them in the system)
                else{
                    // find user
                    $user = User::where('username', $request->input('username'))->first();

                    // log them in and create session
                    Auth::login($user);
                    $request2->session()->regenerate();

                    // redirect
                    return redirect()->intended('/');

                }
            }
            // if was not able to connect successfully
            else{
                if (ldap_errno ($ad) == 49) {
                    // invalid credentials
                    return Redirect::back()->withErrors(['error' => ['Invalid credentials']/*'username' => ['Invalid credentials'],'password' => ['Invalid credentials']*/]);

                } else {
                    // ldap connection to ldap server failed
                    return Redirect::back()->withErrors(['error' => ['Connection to LDAP Server Failed']/*'username' => ['Invalid credentials'],'password' => ['Invalid credentials']*/]);
                }
            }
            /*
                other code
            */
        }
        catch(\Throwable $exception){
            \Log::error($exception);
            if($exception->getMessage() == "Can't contact LDAP server"){
                $err_message = "Can't contact server, check your internet connection";
                return back()->withErrors(["error" => $err_message]);
            }
            return back()->withErrors(["error" => $exception->getMessage()]);
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        try{
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            // return redirect('/');
            return redirect('/login');
        }
        catch(\Throwable $exception){
            \Log::error($exception);
            if($exception->getMessage() == "Can't contact LDAP server"){
                $err_message = "Can't contact server, check your internet connection";
                return back()->withErrors(["error" => $err_message]);
            }
            return back()->withErrors(["error" => $exception->getMessage()]);
        }

    }
}

