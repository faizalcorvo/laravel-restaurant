<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-lg-4">
    <strong class="brand-text mx-sm-3">{{ auth()->user()->name }}</strong><br>
    <small class="brand-text mx-sm-3"><i class="fa fa-circle text-success"></i> {{ auth()->user()->role }}</small>
    <hr>
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/*') ? 'active' : 'text-dark' }}" aria-current="page" href="/dashboard">
                        <i class="fa-solid fa-house fa-xl"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link {{ Request::is('customer/*') ? 'active' : 'text-dark' }}" href="/customer/index">
                    <i class="fa-solid fa-users fa-xl"></i>
                    <span class="ml-2">Customers</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('menu/*') ? 'active' : 'text-dark' }}" href="/menu">
                    <i class="fa-solid fa-utensils fa-xl"></i>
                    <span class="ml-2">Menu</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request::is('order/*') ? 'active' : 'text-dark' }}" href="/order/index">
                    <i class="fa-solid fa-cart-shopping fa-xl"></i>
                    <span class="ml-2">Orders</span>
                </a>
            </li>                      
        </ul>
    </div>
</nav>