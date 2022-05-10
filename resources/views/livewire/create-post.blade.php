<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Nuevo Registro
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Creando nuevo registro
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando...</strong>
                <span class="block sm:inline">Espere un momento.</span>
            </div>

            @if ($image)              
                <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">
            @endif

            <div class="mb-4">
                <x-jet-label value="Título del post"></x-jet-label>
                {{--difer hacer que no se renderice con cada tecla presionada  --}}
                {{-- <x-jet-input type="text" class="w-full" wire:model.difer="title"></x-jet-input>     --}}
                <x-jet-input type="text" class="w-full" wire:model="title"></x-jet-input>
                {{-- @error('title')
                    <span>
                        {{$message}}
                    </span>
                @enderror --}}
                <x-jet-input-error for="title"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del post"></x-jet-label>
                <textarea wire:model.defer="content" class="form-control w-full" name="" id="" cols="30" rows="6"></textarea>
                <x-jet-input-error for="content"/>
            </div>

            <div>
                <input type="file" wire:model="image" id="{{$identificador}}" >
                <x-jet-input-error for="image"/>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

           {{--  <x-jet-danger-button wire:loading.class= wirew:target="save" wire:click="save"> --}}
            <x-jet-danger-button wire:loading.attr="disabled" wirew:target="save, image" wire:click="save" class="disabled:opacity-25">
                Crear registro
            </x-jet-danger-button>

            <{{-- span wire:loading wirew:target="save">Cargando...</span> --}}
        </x-slot>
    </x-jet-dialog-modal>
</div>
