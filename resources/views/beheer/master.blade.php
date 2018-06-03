<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Beheer | Hutmut West-Friesland</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

  <!-- jQuery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <!-- <link href="../../../css/beheer/master.css" rel="stylesheet"> -->
  <link href="../../../css/jumbotron.css" rel="stylesheet">
  <link href="../../../css/buttons/buttonStyle.css" rel="stylesheet">
  <link href="../../../css/faq.css" rel="stylesheet">
  <script src="../../../js/beheer/checkbox.js"></script>
  <script src="../../../js/misc.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Hutmut Beheer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">
            <span data-feather="home"></span>
            WWW
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/">
            <span data-feather="home"></span>
            Dashboard
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/products">
            <span data-feather="file"></span>
            Producten
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/categories">
            <span data-feather="file"></span>
            Categorieen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/winners">
            <span data-feather="shopping-cart"></span>
            Winnaars
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/todo">
            <span data-feather="todo"></span>
            ToDo
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/users">
            <span data-feather="users"></span>
            Gebruikers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/beheer/posts">
            <span data-feather="users"></span>
            Nieuwsberichten
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <br>

  <div class="container-fluid">
      @include('messages.success')
      @include('messages.error')
      @include('messages.warning')
      
    <div class="row">
      <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">

        @yield('content')
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  </script>
</body>

</html>