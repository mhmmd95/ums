<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Users;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;

final class IndexController extends Controller
{
    public function __invoke(): View|Factory {

        $this->authorize('viewAny', User::class);

        $users = User::clients()->paginate(10);
        return view('users.index', compact('users'));
    }
}
