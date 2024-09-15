@component('mail::message')
{{--{{ __('You have been invited to join the :team team!', ['team' => $invitation->team->name]) }}--}}
{{ __('Has sido invitado a unirte a  :team !', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('Primero debes crear tu cuenta. Después de crear tu cuenta, debes dar click al botón de Aceptar invitación para aceptar la invitación de equipo.') }}

@component('mail::button', ['url' => route('register')])
{{ __('Crear cuenta') }}
@endcomponent

{{ __('Da click, para aceptar la invitación al equipo.') }}

@else
{{ __('Acepta la invitación dando click al botón.') }}
@endif


@component('mail::button', ['url' => $acceptUrl])
{{ __('Aceptar invitación') }}
@endcomponent

{{ __('Si no esperabas recibir este correo, simplemente ignoralo.') }}
@endcomponent
