<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Edit extends Component
{
    /**
     * @param Category $category
     * @return Factory|View|Application
     */
    public function render(Category $category): Factory|View|Application
    {
        return view('livewire.admin.category.edit', [
            'category' => $category
        ]);
    }
}
