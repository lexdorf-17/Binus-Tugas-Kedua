@auth
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <p>You are not logged in.</p>
    <a href="{{ route('login') }}">Login</a>
@endauth
