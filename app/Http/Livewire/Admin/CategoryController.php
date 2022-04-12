<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Category\CreateRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CategoryController extends Component
{
    public $categories = [], $category_id, $title, $description;
    public $isDialogOpen = false;

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        $this->categories = Category::all();
        return view('livewire.admin.category-controller');
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
        $this->title = '';
        $this->description = '';
    }

    public function store(CreateRequest $request)
    {
        $category = Category::editOrCreate($request->validated());
        if ($category) {
            session()->flash('message', 'Категория успешно создана');
        } else {
            session()->flash('message', 'Не удалось создать категорию');
        }
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->title = $category->title;
        $this->description = $category->description;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        $status = Category::find($id)->delete();
        if (!$status) {
            session()->flash('message', 'Не удалось удалить категорию');
        }
        session()->flash('message', 'Категория удалена');
    }
}
