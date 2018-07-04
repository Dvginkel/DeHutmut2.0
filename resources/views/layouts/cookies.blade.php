@extends('layouts.master') @section('content')
<h1>Informatie Omtrent Cookies</h1>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
    aria-controls="collapseExample">
    Wat zijn Cookies
</button>

<div class="collapse" id="collapseExample">
    <hr>
    <div class="blog-post">
        <h2 class="blog-post-title">Wat zijn cookies en hoe werken ze?</h2>
        Een cookie is een klein tekstbestandje dat een website op de harde schijf van je computer zet op het moment dat je de site
        bezoekt. De belangrijkste functie van cookies is om de ene gebruiker van de andere te onderscheiden. Je komt cookies
        dan ook veel tegen bij websites waarbij je moet inloggen. Een cookie zorgt dat je ingelogd blijft terwijl je de site
        gebruikt.
    </div>
    <hr>
    <div class="blog-post">
        <h2 class="blog-post-title">Looptijd van cookies</h2>
        Cookies hebben een looptijd. Sommige cookies worden verwijderd als je je browser afsluit. Andere (bijvoorbeeld die met inloggegevens)
        kunnen jaren op je computer blijven staan als je ze niet verwijdert. Je kunt meestal niet zien waar een cookie precies
        voor dient. Cookies zijn tekstbestandjes, maar de inhoud van die bestandjes is meestal onleesbare computercode. De
        echte gegevens over je staan in de database van de website.
    </div>
    <hr>
    <div class="blog-post">
        <h2 class="blog-post-title">Advertenties op maat</h2>
        De mogelijkheid om gebruikers te identificeren en volgen is voor veel websites waardevol. Door te volgen wat voor pagina's
        de gebruiker bezoekt, kan het aanbod aan de gebruiker worden aangepast. Denk aan webwinkels die producten 'aanraden'.
    </div>
    <hr>
    <div class="blog-post">
        <h2 class="blog-post-title">Tracking cookies</h2>
        Hoe werkt dit? Een website (A) kan bijvoorbeeld een adverteerder toestemming geven om een cookie te plaatsen. Die adverteerder
        weet dan ook dat je de website of pagina hebt bezocht. Het echte voordeel voor die derde partij (de adverteerder)
        ontstaat als de gebruiker ook op een andere site (B) komt die ook toestemming heeft gegeven aan de adverteerder om
        cookies te plaatsen. De adverteerder kan het cookie van site A dan uitlezen, en op die manier weet de adverteerder
        dat deze gebruiker zowel sites A en B bezocht heeft. En hij heeft meer informatie dan website A of B los van elkaar
        over de gebruiker hebben. Cookies die het 'volgen' van mensen mogelijk maken, noemen we tracking cookies.
    </div>
</div>
<hr>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#usedcookies" aria-expanded="false"
    aria-controls="collapseExample">
    Welke Cookies worden gebruikt door De Hutmut?
</button>

<div class="collapse" id="usedcookies">
    <hr>
    <div class="blog-post">
        <h2 class="blog-post-title">Persoonlijke cookies</h2>
        Deze cookies zijn individuele cookies voor het account dat ingelogd is op dat moment. Hier mee weten we onder andere wie
        waar op mee loot.
    </div>
    <hr>
    <div class="blog-post">
        <h2 class="blog-post-title">Tracking cookies</h2>
        Op dit moment maakt de Hutmut geen gebruik van tracking cookies. Mocht dit in de toekomst veranderen zal hier vooraf over
        gecommuniceerd worden.
    </div>
</div>
<hr> @endsection