<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1>Hola amigos</h1>

    <x-table>
        <div class="px-6 py-4">
            {{-- <input type="text" wire:model="search"> --}}
            <x-jet-input class="w-full" placeholder="Buscar..." type="text" wire:model="search"></x-jet-input>
        </div>
        <p class="text-lg text-center font-bold m-5">Componentes</p>
        @if($posts->count())
        <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
            <tr class="text-left border-b-2 border-indigo-300">
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Title</th>
                <th class="px-6 py-4">Content</th></th>
                <th class="px-6 py-4">Acciones</th>
            </tr>
            <tbody class="border-b border-indigo-400">
                @foreach($posts as $post)
                <tr class="">
                    <td class="px-6 py-4">{{$post->id}}</td>
                    <td class="px-6 py-4">{{$post->title}}</td>
                    <td class="px-6 py-4">{{$post->content}}</td>
                    <td class="px-6 py-4">Male</td>
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
