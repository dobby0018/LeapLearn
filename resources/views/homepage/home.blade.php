{{ auth()->user()->userType }}
@if (Auth::check())
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endif
