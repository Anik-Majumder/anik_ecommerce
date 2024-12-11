<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    User Dashboard, welcome {{ Auth::user()->name }}
</h2>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button>logout</button>
</form>
