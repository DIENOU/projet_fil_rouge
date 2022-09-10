<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Accueil</p>
    </a>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('inventaireLignes.index') }}"
        class="nav-link {{ Request::is('inventaireLignes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inventaire Lignes</p>
    </a>
</li> --}}


<li class="nav-item">
    <a href="{{ route('bonLivraisons.index') }}" class="nav-link {{ Request::is('bonLivraisons*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Bon Livraisons</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sortieStocks.index') }}" class="nav-link {{ Request::is('sortieStocks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-upload"></i>
        <p>Sortie Stocks</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('entreeStocks.index') }}" class="nav-link {{ Request::is('entreeStocks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-download"></i>
        <p>Entree Stocks</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('produits.index') }}" class="nav-link {{ Request::is('produits*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-box"></i>
        <p>Produits</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('inventaires.index') }}" class="nav-link {{ Request::is('inventaires*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-check"></i>
        <p>Inventaires</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Clients</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fournisseurs.index') }}" class="nav-link {{ Request::is('fournisseurs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Fournisseurs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('unites.index') }}" class="nav-link {{ Request::is('unites*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-ruler"></i>
        <p>Unites</p>
    </a>
</li>
