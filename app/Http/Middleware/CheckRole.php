<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class CheckRole {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $userRole = $request->user()->role()->first();
        Log::info(sprintf("Check role Voici le role : %d %s", $userRole->user_id, $userRole->role));
        if ($userRole) {
            Log::info(sprintf("Check role, j'ajoute le scope : %s", $userRole->role));
            // Set scope as admin/moderator based on user role
            $request->request->add([
                'scope' => $userRole->role
            ]);
        }

        return $next($request);
    }
}
