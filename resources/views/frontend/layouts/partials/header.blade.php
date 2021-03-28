<header class="main-header">
    <div class="topbar">
        <div class="container">
            Öffnungszeiten: Di-Sa: 11:00 - 21:30 So &amp; Feiertage: 15:00 - 21:00 Uhr
            <span><i class="fa fa-phone"></i> <a href="tel:+4936373159572">036373 - 159572</a></span>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="./">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navigation" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="./">Home</a>
                    <a class="nav-link {{ Request::is('speisekarte') ? 'active' : '' }}" href="./speisekarte">Speisekarte</a>
                    <a class="nav-link {{ Request::is('lieferservice') ? 'active' : '' }}" href="./lieferservice">Lieferservice</a>
                    <a class="nav-link {{ Request::is('kontakt') ? 'active' : '' }}" href="./kontakt">Kontakt</a>
                </div>
            </div>
        </div>
    </nav>
</header>