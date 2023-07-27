<?php

declare (strict_types = 1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Closure;

final class index_table extends Component
{
    public function __construct(
        public Collection $users,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.users.index_table');
    }
}
