<?php
namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Services\SocialFacebookAccountService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(Request $request, SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);

        // update last login
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp(),
        ]);

        // login history
        $position = \Location::get();
        LoginHistory::create([
            'user_id'      => $user->id,
            'ip'           => @$position->ip,
            'country_name' => @$position->countryName,
            'country_code' => @$position->countryCode,
            'region_code'  => @$position->regionCode,
            'region_name'  => @$position->regionName,
            'city_name'    => @$position->cityName,
            'zip_code'     => @$position->zipCode,
            'iso_code'     => @$position->isoCode,
            'postal_code'  => @$position->postalCode,
            'latitude'     => @$position->latitude,
            'longitude'    => @$position->longitude,
            'metro_code'   => @$position->metroCode,
            'area_code'    => @$position->areaCode,
        ]);

        return redirect()->to('/my/profile');
    }
}
