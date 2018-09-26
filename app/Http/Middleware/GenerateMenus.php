<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
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
        \Menu::make('topMenu', function ($menu) {
            $menu->add('Dashboard');
            $menu->add('Property listings', 'property-listing');
        });

        return $next($request);
    }
}
