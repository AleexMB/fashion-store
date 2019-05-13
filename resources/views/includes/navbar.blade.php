<nav>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="/">Dashboard</a>
            </div>

            <div class="col-6 text-right">
                <a id="log_out" href="{{ route('logout') }}">Log out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>