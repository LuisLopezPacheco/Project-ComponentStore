<div>
    <a  class="font-bold text-white py-2 px4 rounded cursor-pointer
    bg-green-600 hover:bg-green-500" 
    wire:click="$set('open',true)">
        <i class="fa-solid fa-eye-dropper-half"></i>
    </a>

    //Se despliegue el modal
    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>        
            Editar el post: {{ $post->title }}                 
        </x-slot>
        <x-slot name='content'></x-slot>
        </x-slot>
        <X-slot name='footer'></X-slot>
        </x-slot>
    </x-jet-dialog-modal>
</div>
