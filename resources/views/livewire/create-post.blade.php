<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Nuevo Registro
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Creando nuevo registro
        </x-slot>
        <x-slot name="content">
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
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                Crear registro
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
