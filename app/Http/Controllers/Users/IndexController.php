<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Users;

use Illuminate\Database\Eloquent\Builder;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

final class IndexController extends Controller
{
    public function __invoke(Request $request): View|Factory {

        $this->authorize('viewAny', User::class);

        $users = User::clients()
            ->when($request->has('name'), function(Builder $query) use ($request){
                $query->where('name', 'like', '%'.$request->name.'%');
            })->when($request->has('email'), function(Builder $query) use ($request){
                $query->where('email', 'like', '%'.$request->email.'%');
        })->paginate($request->perpage ?? 8)->withQueryString();

        return view('users.index', compact('users'));
    }
}
