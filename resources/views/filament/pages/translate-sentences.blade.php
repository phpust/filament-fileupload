<x-filament-panels::page>
    @if ($this->hasInfolist())
        {{ $this->infolist }}
    @endif

	<x-filament-panels::form wire:submit="save"> 
        {{ $this->form }}
        <x-filament-panels::form.actions 
            :actions="$this->getFormActions()"
        /> 
    </x-filament-panels::form>
    Winners form will be here 
</x-filament-panels::page>
