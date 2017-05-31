<nav class="navbar navbar-default navbar-static-top" id="navbar-second">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbar-links">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('home') ? 'active' :'' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="dropdown {{ Route::is('about') || Route::is('contact') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Info <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('about') }}">Over ons</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('downloads') ? 'active' : '' }}"><a href="{{ url('downloads') }}">Downloads</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Webshop <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('catalog::assortment.index') }}">Assortiment</a></li>
                        <li><a href="{{ url('search') }}">Zoeken</a></li>
                        <li><a href="{{ route('catalog::assortment.specials') }}">Acties</a></li>
                        <li><a href="{{ url('clearance') }}">Opruiming</a></li>
                    </ul>
                </li>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <li><a href="{{ route('admin::dashboard') }}">Admin</a></li>
                @endif
            </ul>

            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li class="{{ request()->is('cart') ? 'active' : '' }}">
                            <a href="{{ route('checkout::cart.index') }}" style="height: 50px">
                                Winkelwagen <span class="badge" id="cart-badge">{{ $quote->getItemCount() }}</span>
                            </a>
                        </li>
                        <li class="dropdown {{ request()->is('account/*') ? 'active' : '' }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('customer::account.dashboard') }}"><span class="glyphicon glyphicon-user"></span> Gegevens</a></li>
                                <li><a href="{{ route('customer::account.favorites::view') }}"><span class="glyphicon glyphicon-heart"></span> Favorieten</a></li>
                                <li><a href="{{ route('customer::account.history::view') }}"><span class="glyphicon glyphicon-time"></span> Geschiedenis</a></li>
                                <li><a href="{{ route('customer::account.discountfile::view') }}"><span class="glyphicon glyphicon-euro"></span> Kortingsbestand</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="document.getElementById('logout-form').submit()"><span class="glyphicon glyphicon-off"></span> Loguit</a></li>
                            </ul>
                        </li>

                        <form class="hidden" action="{{ route('auth::logout') }}" method="post" id="logout-form">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <li><a class="register-button" href="{{ route('auth::register.form') }}">Registreren</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>