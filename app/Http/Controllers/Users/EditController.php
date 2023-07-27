<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Users;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;

final class EditController extends Controller
{
    public function __invoke(User $user): View|Factory {

        return view('profile.edit', compact('user'));
    }
}
