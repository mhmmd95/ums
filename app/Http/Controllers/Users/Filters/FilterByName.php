<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Users\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UserIndexRequest;
use Closure;

final class FilterByName {

    public function __construct(public UserIndexRequest $request){}

    public function __invoke(Builder $query, Closure $next) {
        if($this->request->has('name')) {
            $query->where('name', 'REGEXP', $this->request->name);
        }

        return $next($query);
    }
}
