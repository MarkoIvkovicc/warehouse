<nav class="navbar" role="navigation" aria-label="main navigation">

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            @if (!is_null(request()->user()) && !request()->user()->hasRole('employee'))
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/products">Products</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/products/create">Create Product</a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/categories">Categories</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/categories/create">Create Category</a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/suppliers">Suppliers</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/suppliers/create">Create Supplier</a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/warehouses">Warehouses</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/warehouses/create">Create Warehouse</a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/employees">Employees</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/employees/create">Create Employee</a>
                    </div>
                </div>

                <div>
                    <a class="navbar" href="/home">Home</a>
                </div>
            @endif

            @if (!is_null(request()->user()) && !request()->user()->hasRole('manager'))
                <div class="navbar-item has-dropdown is-hoverable" id="arrivalNavbar">
                    <a class="navbar-link" href="/arrivals">Arrivals</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/arrivals/create">Create Arrivals</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
