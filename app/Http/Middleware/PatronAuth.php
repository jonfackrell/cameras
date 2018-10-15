<?php

namespace App\Http\Middleware;

use App\Models\Patron;
use Closure;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class PatronAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\Auth::guard('patrons')->guest()){
            cas()->authenticate();

            /*$user = \App\Models\Patron::whereNetid(cas()->getCurrentUser())->first();
            if(is_null($user)){
                $user = \App\Models\Patron::create([
                    'netid' => cas()->getCurrentUser()
                ]);
            }*/
            $user = Patron::firstOrNew(['netid' => cas()->getCurrentUser()]);

            $username = "byui:$user->netid";

            $provider = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId' => env('BYUI_OAUTH_CLIENTID'),    // The client ID assigned to you by the provider
                'clientSecret' => env('BYUI_OAUTH_CLIENTSECRET'),   // The client password assigned to you by the provider
                'redirectUri' => 'https://www.getpostman.com/oauth2/callback',
                'urlAuthorize' => env('BYUI_API_BASE_URL') . '/authorize',
                'urlAccessToken' => env('BYUI_API_BASE_URL') . '/token',
                'urlResourceOwnerDetails' => 'https://ids.byui.edu/oauth2/userinfo?schema=openid'
            ]);

            $accessToken = $provider->getAccessToken('client_credentials');
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', env('BYUI_API_BASE_URL') . "/librarybridge/v1/cclaUser/".trim($username),
                [
                    'connect_timeout' => 20,
                    'allow_redirects' => true,
                    'timeout' => 2000,
                    'headers' => [
                        'Authorization' => "Bearer $accessToken"
                    ]
                ]);

            // Here the code for successful request

            // TODO: Actually do something with this rather than dump it to the screen
            $byuiUser = json_decode($response->getBody());

            $user->first_name = $byuiUser->prefferedName;
            $user->last_name = $byuiUser->surname;
            if(strlen($byuiUser->personalContact->email) > 5){
                $user->email = $byuiUser->personalContact->email;
            }else{
                $user->email = $byuiUser->workContact->email;
            }
            $user->roles = $byuiUser->roles;

            $user->save();


            auth()->guard('patrons')->login($user);
            /*if((\Route::currentRouteName() != '3d.register' && \Route::currentRouteName() != '3d.update.patron.info') && strlen(auth()->guard('patrons')->user()->email) < 3){
               return redirect()->to( route('3d.register') );
            }*/
        }

        return $next($request);
    }
}
