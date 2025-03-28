<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CountryRestrictionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Get the user's public IP
        $userIp = $request->header('X-Forwarded-For') ?? $request->ip();
        
        // Use an external API to get country data
        $geoData = json_decode(file_get_contents("http://ip-api.com/json/{$userIp}"), true);

        // Check if the API call was successful
        if ($geoData && isset($geoData['countryCode'])) {
            $userCountry = $geoData['countryCode']; // e.g., "PK" for Pakistan

            // List of blocked countries (modify as needed)
            $blockedCountries = ['PK']; // Add more if needed

            // Allowed users (specific IPs)
            $allowedIps = ['182.176.100.87']; // Add your own IP to bypass restriction

            if (in_array($userCountry, $blockedCountries) && !in_array($userIp, $allowedIps)) {
                return response()->json([
                    'message' => 'Access denied. Your country is restricted.'
                ], 403);
            }
        }

        return $next($request);
    }
}
