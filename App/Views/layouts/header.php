<header style="background-color: black;">
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <div class="d-flex">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="/book/catalog">
                    <img src="../../../Public/Assets/img/logoAd.png" height="20" alt="Logo" loading="lazy" style="margin-top: 2px;" />
                </a>
            </div>

            <ul class="navbar-nav flex-row d-none d-md-flex">
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="/book/catalog" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">CATALOG</a>
                </li>
                <?php
                if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] == 'admin') {
                ?>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/admin/bookManagement" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MANAGE BOOKS</a>
                    </li>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/admin/orderManagement" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MANAGE ORDERS</a>
                    </li>
                <?php
                }
                if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] === 'client') {
                ?>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/order/orders" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MY ORDERS</a>
                    </li>

                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/order/orders" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">FAVORITES</a>
                    </li>
                <?php
                }
                if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] === 'delivery_person') {
                ?>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/delivery/orders" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">ORDERS</a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <ul class="navbar-nav flex-row">
                <?php
                if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] == 'client') {
                ?>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link d-sm-flex align-items-sm-center" href="/cart/shoppingCart">
                            <img class="cart-icon" src="../../../Public/Assets/img/cart-icon.svg" height="22" alt="Cart Icon" loading="lazy" />
                        </a>
                    </li>
                <?php
                }
                ?>

                <li class="nav-item dropdown me-3 me-lg-1">
                    <ul class="navbar-nav flex-row">
                        <?php if (isset($_SESSION['userLogged'])): ?>
                            <li class="nav-item dropdown me-3 me-lg-1">
                                <a class="nav-link d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                    <img class="user-icon rounded-circle" src="../../../Public/Assets/img/user-icon.svg" height="22" alt="User Icon" loading="lazy" />
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                    <?php if ($_SESSION['userLogged']['rol'] === 'client'): ?>
                                        <li>
                                            <a class="dropdown-item" href="/user/profile">My profile</a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <a class="dropdown-item" href="/user/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item me-3 me-lg-1">
                                <a class="nav-link d-flex align-items-center hidden-arrow" href="/auth/login">
                                    <img class="user-icon rounded-circle" src="../../../Public/Assets/img/user-icon.svg" height="22" alt="User Icon" loading="lazy" />
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>