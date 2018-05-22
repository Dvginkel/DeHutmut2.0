@component('mail::message')
# Lootje gewonnen

Hoi {{ $username }},
@component('mail::panel', ['url' => ''])
    Je hebt de een loting gewonnen, maak binnen 12 uur een afspraak met Doreth van Dam
    @component('mail::button', ['url' => 'https://dev.dehutmut.nl/account/afspraak'])
    Maak ophaal afspraak met Doreth van Dam
    @endcomponent
@endcomponent

@component('mail::panel', ['url' => ''])
    Wist je dat je ook een Push Notificatie kan ontvangen op je mobiel of tablet als je iets gewonnen hebt.
    @component('mail::button', ['url' => 'https://dev.dehutmut.nl/account/info'])
    Aanmelden voor Push Notificaties
    @endcomponent
@endcomponent


Groeten,<br>
{{ config('app.name') }}
@endcomponent
