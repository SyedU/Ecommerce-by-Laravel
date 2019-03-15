<?php

namespace App\Http\Controllers;

use Socialite;
use App\user;
use Carbon\Carbon;
use Auth;

class GithubController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        if (User::where('email',$user->getEmail())->exists()){
          $user_info = User::where('email',$user->getEmail())->first();
          Auth::guard()->login($user_info);
          return redirect('/home');
          echo "User exist" ;
        }
        else
        {
          $user_id =  User::insertGetId([
          'name' => $user->getname(),
          'email' => $user->getEmail(),
          'password' => bcrypt('secret'),
          'user_type' => 1,
          'created_at' => Carbon::now()
            ]);
          $user_info = User::find($user_id);
          Auth::guard()->login($user_info);
          return redirect('/home');

        echo "Done";
      }
    }

}
