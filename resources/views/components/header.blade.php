<header class="w-100 bg-info py-4 fs-2" style="background-color: #0dcaf0;">
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #0dcaf0;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    @guest
                        @include('components.login')
                    @else
                        <div class="row">
                            <div class="col">
                                <p class="text-light">{{Auth::user()->username}}</p>
                            </div>
                            <div class="col">
                                <a class="btn btn-outline-light" href="{{route('logout')}}">Logout</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-outline-light" href="">CreateAd</a>
                            </div>
                        </div>
                    @endguest
            </div>
        </div>
    </nav>
</header>



