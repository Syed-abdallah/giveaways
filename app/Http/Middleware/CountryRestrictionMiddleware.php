<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CountryRestrictionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userIp = $request->header('X-Forwarded-For') ?? $request->ip();

        $geoData = json_decode(file_get_contents("http://ip-api.com/json/{$userIp}"), true);

        if ($geoData && isset($geoData['countryCode'])) {
            $userCountry = $geoData['countryCode'];

            $blockedCountries = ['PK'];

            $allowedIps = [];

            if (in_array($userCountry, $blockedCountries) && !in_array($userIp, $allowedIps)) {
                // return response()->json([
                //     'message' => 'Access denied. Your country is restricted.'
                // ], 403);
                return redirect('https://www.google.com/');
            }
        }

        return $next($request);
    }
}
