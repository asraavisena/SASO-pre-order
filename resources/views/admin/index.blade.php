<x-admin-master>
    @section('content')
    <h1 class="h2 mb-4 text-gray-800">Dashboard</h1>
    <h2 class= "h4 mb-2">Welcome 
        @if(Auth::check())
            {{auth()->user()->name}}
        @endif</h2>
    @endsection
</x-admin-master>