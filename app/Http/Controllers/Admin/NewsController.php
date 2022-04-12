<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\News\Create;
use App\Http\Livewire\Admin\News\Edit;
use App\Http\Livewire\Admin\News\Index;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Index $index
     * @return Index
     */
    public function index(Index $index): Index
    {
        return $index;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Create $create
     * @return Create
     */
    public function create(Create $create): Create
    {
        return $create;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());
        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));

    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Edit $edit
     * @return Edit
     */
    public function edit(Edit $edit): Edit
    {
        return $edit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $status = $news->fill($request->validated())
            ->save();
        if ($status) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function destroy(News $news): RedirectResponse
    {
        $status = $news->delete();
        if ($status) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.destroy.success'));
        }
        return redirect()->route('admin.news.index')
            ->with('error', __('messages.admin.news.destroy.fail'));
    }
}
