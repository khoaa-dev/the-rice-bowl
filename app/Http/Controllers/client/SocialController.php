<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userInfo = Socialite::driver($provider)->user(); 
        
        $userExist = User::where('email', '=', '' . $userInfo->email)->first();
        
        if ($userExist === null) {
            $fileContents = file_get_contents($userInfo->getAvatar());
            File::put('public/front-end/images/' . $userInfo->getId() . '.jpg', $fileContents);

            $user = $this->createUser($userInfo, $provider); 
            auth()->login($user); 
        } else {
            auth()->login($userExist);
        }

        return redirect()->to('/home');
    }

    function createUser($userInfo, $provider)
    {
        $user = User::create([
            'fullName'     => $userInfo->name,
            'email'    => $userInfo->email,
            'provider' => $provider,
            'provider_id' => $userInfo->id,
            'username' => null,
            'dob' => null,
            'phone' => null,
            'houseNumber' => null,
            'street' => null,
            'villageId' => null,
            'roleId' => 2,
            'avatarUrl' => $userInfo->getId() . '.jpg'
        ]);

        return $user;
    }
}
