<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\Filters\FilterByEmail;
use App\Http\Controllers\Users\Filters\FilterByName;
use Illuminate\Support\Facades\Pipeline;
use \Illuminate\Contracts\View\Factory;
use App\Http\Requests\UserIndexRequest;
use \Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;

final class IndexController extends Controller
{
    public function __invoke(UserIndexRequest $request): View|Factory {

        $this->authorize('viewAny', User::class);

        $users = Pipeline::send(User::clients())
            ->through([
                FilterByName::class,
                FilterByEmail::class,
            ])
            ->thenReturn()
            ->paginate($request->perpage ?? 8)
            ->withQueryString();

        return view('users.index', compact('users'));
    }
}
