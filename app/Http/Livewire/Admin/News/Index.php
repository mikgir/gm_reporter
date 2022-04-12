<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News;
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
        $newsList = News::with('categories')
            ->paginate(5);
        return view('livewire.admin.news.index', [
            'newsList' => $newsList
        ]);
    }
}
