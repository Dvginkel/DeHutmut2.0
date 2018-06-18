<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/">De Hutmut</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-center">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/actievelotingen">Actieve Lotingen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/faq">FAQ</a>
      </li>
      <div class="dropdown-divider"></div>
      <li class="nav-item">
        <a class="nav-link" href="/store">De Winkel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/winnaars">Winnaars</a>
      </li>
      <div class="dropdown-divider"></div>
    </ul>
    @guest
    <ul class="navbar-nav ml-auto">
      <li>
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
    </ul>
    @else
    <div class="nav-item dropdown ml-auto">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        {{Auth()->user()->name}}
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/account/tickets">Mijn Lotingen</a>
        <a class="dropdown-item" href="/account/info">Mijn Gegevens</a>
        <a class="dropdown-item" href="/account/inbox">Mijn Inbox</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/logout">Uitloggen</a>
        @if(Auth()->user()->hasRole('Beheerder'))
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/beheer">Beheer</a>
        @endif
      </div>
    </div>
    @endguest
  </div>
</nav>