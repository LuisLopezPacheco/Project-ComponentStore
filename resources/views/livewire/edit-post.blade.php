<div>
    <a class="font-bold text-white  py-2 px-3 rounded cursor-pointer
    bg-green-600 hover:bg-green-600" 
    wire:click="$set('open',true)">
        <i class="fas fa-edit fa-solid fa-eye-dropper-half"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">
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
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

           {{--  <x-jet-danger-button wire:loading.class= wirew:target="save" wire:click="save"> --}}
            <x-jet-danger-button wire:loading.attr="disabled" wirew:target="save, image" wire:click="save" class="disabled:opacity-25">
                Actualizar 
            </x-jet-danger-button>
        </x-slot>      
    </x-jet-dialog-modal>  
</div>
