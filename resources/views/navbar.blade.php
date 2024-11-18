
@section('page-css')
    @vite('resources/css/navbar.css')
@endsection

<nav class="bg-gray-800 text-white shadow-md">
    <div class="container  bg-gray-800 mx-auto flex items-center justify-between px-4 py-3">
        <!-- Logo Section -->
        <div class="text-2xl font-bold">
            <a href="{{ url('/') }}" class="hover:text-gray-300">MyWebsite</a>
        </div>

        <!-- Navigation Links -->
        <ul class="flex space-x-4">
            <li>
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition duration-300">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ url('/second') }}" class="text-gray-300 hover:text-white transition duration-300">
                    Second
                </a>
            </li>
            <li>
                <a href="{{ url('/third') }}" class="text-gray-300 hover:text-white transition duration-300">
                    Third
                </a>
            </li>
        </ul>
    </div>
</nav>


@section('page-js')
    @vite('resources/js/navbar.js')
@endsection