@extends('beheer.master') @section('content')
<main role="main" class="container">
    <div class="starter-template">
        <h1>Nieuwsberichten Beheren</h1>
        <p class="lead">Op deze pagina kan je berichten plaatsen, wijzigen en verwijderen.</p>
    </div>
    <hr> @include('beheer.posts.add') @include('beheer.posts.edit')



</main>
<!-- /.container -->
@endsection