<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
        
        
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Action</p>
        
        
    </a>
</li>











<li class="nav-item">
    <a href="{{ route('clients.index') }}"
       class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <p>Clients</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fournisseurs.index') }}"
       class="nav-link {{ Request::is('fournisseurs*') ? 'active' : '' }}">
        <p>Fournisseurs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('inventaires.index') }}"
       class="nav-link {{ Request::is('inventaires*') ? 'active' : '' }}">
        <p>Inventaires</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('unites.index') }}"
       class="nav-link {{ Request::is('unites*') ? 'active' : '' }}">
        <p>Unites</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('produits.index') }}"
       class="nav-link {{ Request::is('produits*') ? 'active' : '' }}">
        <p>Produits</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('inventaireLignes.index') }}"
       class="nav-link {{ Request::is('inventaireLignes*') ? 'active' : '' }}">
        <p>Inventaire Lignes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('entreeStocks.index') }}"
       class="nav-link {{ Request::is('entreeStocks*') ? 'active' : '' }}">
        <p>Entree Stocks</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bonLivraisons.index') }}"
       class="nav-link {{ Request::is('bonLivraisons*') ? 'active' : '' }}">
        <p>Bon Livraisons</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sortieStocks.index') }}"
       class="nav-link {{ Request::is('sortieStocks*') ? 'active' : '' }}">
        <p>Sortie Stocks</p>
    </a>
</li>


