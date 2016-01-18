<?php namespace App\Http\Middleware;

use Closure;

class EncodingValidateParams
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
        foreach ($request->all() as $val) {
            if (! $this->isValidEncoding($val)) {
                abort(400, 'Bad Request');
            }
        }

        return $next($request);
    }

    /**
     * @param string $val
     * @return bool
     */
    private function isValidEncoding($val)
    {
        if (mb_check_encoding($val, mb_internal_encoding())) {
            return true;
        }

        return false;
    }
}
