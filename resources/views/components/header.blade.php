<header class="w-100 bg-info py-3 fs-2" style="background-color: #0dcaf0;">
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #0dcaf0;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    @guest
                    <form action="/login" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Enter username" name="username">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Enter password" name="password">
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column">
                                    <button type="submit" class="form-control btn btn-outline-light align-top">Sign in</button>
                                    <a class="mt-1" style="text-decoration: none; font-size:1rem;" href="/forgot-password">Forgot your password?</a>
                                </div>
                            </div>
                            <div class="col">
                                <a href="{{route('registration')}}" class="form-control btn btn-outline-light align-top">Sign Up</a>
                            </div>
                        </div>
                    </form>
                @else
                        <div class="row">
                            <div class="col">
                                <p class="text-light">{{Auth::user()->username}}</p>
                            </div>
                            <div class="col">
                                <a class="btn btn-outline-light" href="{{route('logout')}}">Logout</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-outline-light" href="/edit">CreateAd</a>
                            </div>
                        </div>
                    @endguest
            </div>
        </div>
    </nav>
</header>



