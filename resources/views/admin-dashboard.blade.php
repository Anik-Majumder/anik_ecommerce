<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Admin Dashboard, welcome {{ Auth::guard('admin')->user()->name ?? '' }}
</h2>

<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button>logout</button>
</form>
