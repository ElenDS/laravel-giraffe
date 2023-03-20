<form action="{{route('login')}}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="col">
            <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <div class="col">
            <button type="submit" class="form-control btn btn-outline-light align-top">Sign in</button>
        </div>
        <div class="col">
            <a href="{{route('registration')}}" class="form-control btn btn-outline-light align-top">Sign Up</a>
        </div>
    </div>
</form>
