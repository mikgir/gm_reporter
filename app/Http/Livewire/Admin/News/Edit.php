<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Edit extends Component
{
    /**
     * @param News $news
     * @return Factory|View|Application
     */
    public function render(News $news): Factory|View|Application
    {
        return view('livewire.admin.news.edit', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }
}
