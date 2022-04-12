<?php

namespace App\Http\Livewire\Main;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application    {

        return view('livewire.main.index')
            ->layout('layout.guest');
    }
}
