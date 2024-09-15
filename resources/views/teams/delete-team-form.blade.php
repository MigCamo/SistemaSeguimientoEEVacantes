<x-jet-action-section>
    <x-slot name="title">
        {{ __('Eliminar equipo') }}
    </x-slot>

    <x-slot name="description">
        {{ __('El equipo será eliminado definitivamente.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Una vez el equipo sea eliminado, la información será eliminada definitivamente. Antes de eliminar este equipo, por favor respalda la información que consideres necesaria.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Eliminar equipo') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Eliminar equipo') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Estás seguro de querer eliminar el equipo? Una vez que el equipo sea eliminado, toda la información se eliminará definitivamente. Por favor ingresa tu contraseña para confirmar esta acción.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Eliminar equipo') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </x-slot>
</x-jet-action-section>
