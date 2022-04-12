<div>
    <div xmlns:wire="http://www.w3.org/1999/xhtml">
        <x-slot name="header">
            <h2 class="text-center">Категории</h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if ( session()->has('message') )
                        <div
                            class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <button wire:click="create()"
                            class="bg-indigo-500 text-white font-bold py-2 px-4 rounded my-3">Добавить
                    </button>
                    @if( $isDialogOpen )
                        @include('livewire.admin.category-create')
                    @endif
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">ID</th>
                            <th class="px-4 py-2">Наименование</th>
                            <th class="px-4 py-2">Описание</th>
                            <th class="px-4 py-2">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $categories as $category )
                            <tr>
                                <td class="border px-4 py-2">{{ $category->id }}</td>
                                <td class="border px-4 py-2">{{ $category->title }}</td>
                                <td class="border px-4 py-2">{{ $category->description }}</td>
                                <td class="border px-4 py-2">
                                    <button wire:click="edit({{ $category->id }})"
                                            class="bg-green-700 text-white font-bold py-2 px-4">ред.
                                    </button>
                                    <button wire:click="delete({{ $category->id }})"
                                            class="bg-red-700 text-white font-bold py-2 px-4">удал.
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
