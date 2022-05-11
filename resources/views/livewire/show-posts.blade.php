<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-table>
        <div class="px-6 py-4 flex item-center">
            {{-- <input type="text" wire:model="search"> --}}
            <x-jet-input class="w-full mr-1" placeholder="Buscar..." type="text" wire:model="search"></x-jet-input>
            @livewire('create-post')
        </div>
        <p class="text-lg text-center font-bold m-5">Componentes</p>
        @if($posts->count())
        <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
            <tr class="text-left border-b-2 border-indigo-300">
                <th class="cursor-pointer px-6 py-4 w-24" wire:click="order('id')">ID
                    @if($sort == 'id')
                    @if ($direction == 'asc')
                        <i class="fa-solid fa-arrow-down-short-wide float-right mt-1"></i>
                    @else
                        <i class="fa-solid fa-arrow-down-wide-short float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
                </th>
                <th class="cursor-pointer px-6 py-4" wire:click="order('title')">Title
                    @if($sort == 'title')
                        @if ($direction == 'asc')
                            <i class="fa-solid fa-arrow-down-a-z float-right mt-1"></i>
                        @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                    @else
                        <i class="fas fa-sort float-right mt-1"></i>
                    @endif
                </th>
                <th class="cursor-pointer px-6 py-4" wire:click="order('content')">Content
                    @if($sort == 'content')
                        @if ($direction == 'asc')
                            <i class="fa-solid fa-arrow-down-a-z float-right mt-1"></i>
                        @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                    @else
                        <i class="fas fa-sort float-right mt-1"></i>
                    @endif
                </th>
                <th class="px-6 py-4">Acciones</th>
            </tr>
            <tbody class="border-b border-indigo-400">
                @foreach($posts as $post)
                <tr class="">
                    <td class="px-6 py-4">{{$post->id}}</td>
                    <td class="px-6 py-4">{{$post->title}}</td>
                    <td class="px-6 py-4">{{$post->content}}</td>
                    {{-- Componentes de anidamiento --}}
                    <td class="px-6 py-4">                    
                        @livewire('edit-post', ['post' => $post], key($post->id))
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="px-6 py-4">
                No coincide ningún registro...
            </div>
        @endif
    </x-table>
</div>
