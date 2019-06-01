<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('commodit*') ? 'active' : '') }}" href="/commodities">
                    <span data-feather="shopping-cart"></span>
                    商品管理
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ((Request::is('/') || Request::is('activities*')) ? 'active' : '') }}" href="/">
                    <span data-feather="file"></span>
                    团购管理
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('distributor*') ? 'active' : '') }}" href="/distributors">
                    <span data-feather="bar-chart-2"></span>
                    商家管理
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('order*') ? 'active' : '') }}" href="/orders">
                    <span data-feather="bar-chart-2"></span>
                    订单管理
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('customer*') ? 'active' : '') }}" href="/customers">
                    <span data-feather="bar-chart-2"></span>
                    顾客管理
                </a>
            </li>

            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ (Request::is('user*') ? 'active' : '') }}" href="/users">--}}
                    {{--<span data-feather="users"></span>--}}
                    {{--登录人管理--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>


    </div>
</nav>