<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        $categories = Category::with('news')
            ->paginate(5);
        return view('livewire.admin.category.index', [
            'categories' => $categories
        ]);
    }
}
