<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\News\CreateRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class NewsController extends Component
{
    public $newsList = [], $news_id, $title, $categori_id,
        $author, $description, $image;
    public $isDialogOpen = false;

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        $this->newsList = News::all();
        return view('livewire.admin.news-controller');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isDialogOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isDialogOpen = false;
    }

    public function resetCreateForm()
    {
        $this->categori_id = '';
        $this->title = '';
        $this->author = '';
        $this->image = '';
        $this->description = '';
    }

    public function store(CreateRequest $request)
    {
        $news = News::editOrCreate($request->validated());
        if ($news) {
            session()->flash('message', 'Новость успешно создана');
        } else {
            session()->flash('message', 'Не удалось создать новость');
        }
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $this->news_id = $id;
        $this->title = $news->title;
        $this->categori_id = $news->category_id;
        $this->author = $news->author;
        $this->image = $news->image;
        $this->description = $news->description;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        $status=News::find($id)->delete();
        if (!$status) {
            session()->flash('message', 'Не удалось удалить новость');
        }
        session()->flash('message', 'Новость удалена');
    }
}
