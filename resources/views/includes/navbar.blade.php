<!-- Navbar of the page -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Historical Quotes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="{{ (request()->is('companies/create')) ? 'nav-item active' : '' }}">
                <a class="nav-link" href="/companies/create">Insert Data</a>
            </li>
            <li class="{{ (request()->is('companies')) ? 'nav-item active' : '' }}">
                <a class="nav-link" href="/companies">View All Records</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li>
                <b>{{'Guest'}}</b>
            </li>
        </ul>
    </div>
</nav> <!-- End of NavBar-->
