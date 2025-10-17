@auth
    <!-- Show Profile/Logout -->
    <div>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('auth.newservice') }}">Your Services</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endauth

@guest
    <!-- Show Sign In -->
    <a href="{{ route('login') }}">Sign in</a>
@endguest
