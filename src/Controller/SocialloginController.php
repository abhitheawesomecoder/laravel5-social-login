<?php

namespace Abhitheawesomecoder\Sociallogin\Controller;

//use Abhitheawesomecoder\Profilepic\Model\Profile;
use App\Http\Controllers\Controller;
use Abhitheawesomecoder\Sociallogin\Model\Profile;
use App\User;
use Auth;
use Socialite;

class SocialloginController extends Controller
{	
	/**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $data = Socialite::driver('facebook')->user();

        $token = $data->token;
        $uid = $data->getId();
        $email = $data->getEmail();
        $name = $data->getName();
        $nickname = $data->getNickname();
        $avatar = $data->getAvatar();

        // if already registerd
        $profile = Profile::where('uid',$uid)->first();

        if (empty($profile)) {

        	 $user = User::where('email',$email)->first();

        	  if (empty($user)) {

        	  	$user = new User;
                $user->name = $name;              
                $user->email = $data->email;
                $user->save();

        	  }

        	  $profile = Profile::where('user_id',$user->id)->first();

        	    if (empty($profile)) 
        	    $profile = new Profile();

        	    $profile->user_id = $user->id;
                $profile->uid = $uid;
                $profile->save();


              }
                 $profile->provider = 'facebook';
                 $profile->access_token = $token;
                 $profile->save();               
 
                Auth::login($user);

                return redirect('/');

     }       
    

}

