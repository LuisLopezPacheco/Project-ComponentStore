<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Componentes') }}
        </h2>
    </x-slot>
    <x-table>
        <div class="px-6 py-4 flex item-center">
            {{-- <input type="text" wire:model="search"> --}}
            <x-jet-input class="w-full mr-1" placeholder="Buscar..." type="text" wire:model="search"></x-jet-input>
            @livewire('create-post')
        </div>        
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
                <th class=" w-20 px-6 py-4">Acciones</th>
            </tr>
            <tbody class="border-b border-indigo-400">
                @foreach($posts as $item)
                <tr class="">
                    <td class="px-6 py-4">{{$item->id}}</td>
                    <td class="px-6 py-4">{{$item->title}}</td>
                    <td class="px-6 py-4">{{$item->content}}</td>
                    {{-- Componentes de anidamiento --}}
                    <td class="">                    
                        {{--  @livewire('edit-post', ['post' => $post], key($post->id))   --}}
                        <a class="font-bold text-white py-2 px-2 rounded cursor-pointer
                        bg-purple-600 hover:bg-purple-700" wire:click="">
                            <i class="fas fa-search fa-solid fa-eye-dropper-half"></i>
                        </a>
                        <a class="font-bold text-white py-2 px-2 rounded cursor-pointer
                        bg-green-600 hover:bg-green-700" wire:click="edit({{$item}})">
                            <i class="fas fa-edit fa-solid fa-eye-dropper-half"></i>
                        </a>
                        <a class="font-bold text-white py-2 px-2 rounded cursor-pointer
                        bg-red-600 hover:bg-red-700" wire:click="$emit('deletePost', {{$item->id}})">
                            <i class="fas fa-trash fa-solid fa-eye-dropper-half"></i>
                        </a>                        
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

        @if($posts->hasPages())
            <div class="px-6 py-3">
                {{$posts->links()}}
            </div>
        @endif
    </x-table>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'> 
            <div class=" text-black">
                Editar el post: {{ $post->title }}
            </div>                            
        </x-slot>
        <x-slot name='content'>
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando...</strong>
                <span class="block sm:inline">Espere un momento.</span>
            </div>

            @if ($image)              
                <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">
            @else
                <img class="mb-4" src="{{ Storage::url($post->image) }}" >
            @endif
            
            <div class="mb-4 text-black">
                <x-jet-label value="Título del Post" />
                <x-jet-input wire:model="post.title" type="text" class="w-full"/>
            </div>   
            <div class="mb-4 text-black">
                <x-jet-label value="Contenido del Post" />
                <textarea rows="6" wire:model="post.content" class="form-control w-full"></textarea>
            </div>
            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image"/>
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>

           {{--  <x-jet-danger-button wire:loading.class= wirew:target="save" wire:click="save"> --}}
            <x-jet-danger-button wire:loading.attr="disabled" wire:click="update" class="disabled:opacity-25">
                Actualizar 
            </x-jet-danger-button>
        </x-slot>      
    </x-jet-dialog-modal>  
    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>  
        <script>
        Livewire.on('deletePost', postId => {
           Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('show-posts', 'delete', postId);
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
        });
        </script>
    @endpush
</div>
