
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>De Hutmut West-Friesland</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('/css/store/products.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/breadcrumb.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/hutmut.css') }}" rel="stylesheet">


    <!-- Custom Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <!--<script src="../js/bugReport.js" ></script>-->
    <!--     <script src="../js/misc.js" ></script> -->
    <script src="{{ URL::asset('/js/misc.js') }}"></script>
</head>
<body>
  @include('layouts.navbar')
    <main role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="container mt-10" id="logo">
          <img src="https://www.dehutmut.nl//images/hutmutlogo_klein.png" class="img-fluid rounded mx-auto d-block">
        </div>
        <br>
      <div class="container" id="content">
          @if (session('status'))
            <div class="alert alert-success justify-content-center align-items-center" id="msgSuccess">
                {{ session('status') }}
            </div>
          @endif

        <!-- Example row of columns -->

        @yield('content')
        <hr>

      </div> <!-- /container -->

    </main>

@include ('layouts.footer')
