<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $availableLocales = ['en', 'ar'];
        $locale = $request->segment(1); // Extract language from URL

        if (!$locale) {
            // Detect browser language
            $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            // If browser language is available, use it; otherwise, default to 'en'
            $locale = in_array($browserLocale, $availableLocales) ? $browserLocale : 'en';

            return redirect("/$locale" . $request->getRequestUri());
        }

        // Set app locale if it's available; otherwise, default to English
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
        } else {
            return redirect('/en' . $request->getRequestUri()); // Redirect to English if invalid
        }

        return $next($request);
    }
}
