@component('mail::message')
# Lootje gewonnen

Beste {{ $user->name }},
@component('mail::panel', ['url' => ''])
    Je hebt 1 of meerdere loting(en) gewonnen, maak binnen 12 uur een afspraak met Doreth van Dam
    @component('mail::button', ['url' => 'http://hutmut.test:8000/account/afspraak'])
    Maak ophaal afspraak met Doreth van Dam
    @endcomponent
@endcomponent

@component('mail::panel', ['url' => ''])
    Wist je dat je ook een Push Notificatie kan ontvangen op je mobiel of tablet als je iets gewonnen hebt.
    @component('mail::button', ['url' => 'http://hutmut.test:8000/account/info'])
    Aanmelden voor Push Notificaties
    @endcomponent
@endcomponent


Groeten,<br>
{{ config('app.name') }}
@endcomponent
