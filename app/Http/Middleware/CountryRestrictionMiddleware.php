<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\IpAddress;
class CountryRestrictionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userIp = $request->header('X-Forwarded-For') ?? $request->ip();

        $geoData = json_decode(file_get_contents("http://ip-api.com/json/{$userIp}"), true);

        if ($geoData && isset($geoData['countryCode'])) {
            $userCountry = $geoData['countryCode'];

            // $blockedCountries = ['PK', 'GB']; 
            $blockedCountries = Country::where('status', 1)->pluck('code')->toArray();


            // $allowedIps = [];
            $allowedIps = IpAddress::pluck('ip')->toArray();


            if (in_array($userCountry, $blockedCountries) && !in_array($userIp, $allowedIps)) {
                // return response()->json([
                //     'message' => 'Access denied. Your country is restricted.'
                // ], 403);
                // return redirect('https://www.google.com/');
                return response()->view('access-denied', [
                    'country' => $geoData['country']
                ], Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}
