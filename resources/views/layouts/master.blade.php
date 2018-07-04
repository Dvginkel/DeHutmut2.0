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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
    crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('/css/store/products.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/css/jumbotron.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/css/breadcrumb.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/css/hutmut.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/css/modal.css') }}" rel="stylesheet">


  <!-- Custom Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

  <!--<script src="../js/bugReport.js" ></script>-->
  <!-- <script src="../js/misc.js" ></script> -->
  <script src="{{ URL::asset('js/misc.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css"
  />
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
  <script>
    window.addEventListener("load", function () {
      window.cookieconsent.initialise({
        "palette": {
          "popup": {
            "background": "#64386b",
            "text": "#ffcdfd"
          },
          "button": {
            "background": "#f8a8ff",
            "text": "#3f0045"
          }
        },
        "position": "bottom-right",
        "type": "opt-out",
        "content": {
          "message": "De Hutmut maakt gebruikt van cookies voor lotingen en statistieken.",
          "dismiss": "Begrepen",
          "deny": "Weigeren",
          "link": "Meer info",
          "href": "https://dev.dehutmut.nl/cookies"
        }
      })
    });
  </script>
</head>

<body>

  @include('layouts.navbar')
  <main role="main">
    <div class="container mt-10" id="logo">
      <img src="https://www.dehutmut.nl//images/hutmutlogo_klein.png" class="img-fluid rounded mx-auto d-block">
    </div>
    <br>
    <div class="er">
      @include('messages.success') @include('messages.error') @include('messages.warning')
    </div>

    <div class="container" id="content">
      @yield('content')
    </div>
    <!-- /container -->

  </main>

  @include ('layouts.footer')