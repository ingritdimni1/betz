<?php

namespace VanguardLTE\Http\Middleware
{
    class Authenticate
    {
        protected $auth = null;

        public function __construct(\Illuminate\Contracts\Auth\Guard $auth)
        {
            $this->auth = $auth;
        }

        public function handle($request, \Closure $next)
        {
            if ($this->auth->guest()) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Unauthorized.', 401);
                } elseif (! $request->is('api*')) {
                    if ($request->is('backend*')) {
                        return redirect()->guest('/backend/login');
                    }

                    return redirect()->guest('login');
                }
            } elseif (! $request->is('api*')) {
                if ($request->is('backend*') && ! $this->auth->user()->hasPermission('access.admin.panel')) {
                    return redirect()->to('/');
                }
                if (! $request->is('backend*') && $this->auth->user()->hasPermission('access.admin.panel')) {
                    return redirect()->to('/backend/');
                }
            }

            return $next($request);
        }
    }

}
