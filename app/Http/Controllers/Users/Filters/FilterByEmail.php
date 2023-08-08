<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Users\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UserIndexRequest;
use Closure;

final class FilterByEmail {

    public function __construct(public UserIndexRequest $request){}

    public function __invoke(Builder $query, Closure $next) {
        if($this->request->has('email')) {
            $query->where('email', 'REGEXP', $this->request->email);
        }

        return $next($query);
    }
}
