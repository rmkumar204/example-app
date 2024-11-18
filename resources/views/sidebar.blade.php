@section('page-css')
    @vite('resources/css/sidebar.css')
@endsection
<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="bg-gray-800 text-white h-screen w-64 shadow-md">
    <div class="py-4 px-6 text-2xl font-bold border-b border-gray-700">
        Sidebar
    </div>
    <ul class="space-y-2 mt-4">
        <li>
            <a href="{{ url('/') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition duration-300">
                Initial Page
            </a>
        </li>
        <li>
            <a href="{{ url('/second') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition duration-300">
                Second Page
            </a>
        </li>
        <li>
            <a href="{{ url('/third') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition duration-300">
                Third Page
            </a>
        </li>
    </ul>
</aside>


@section('page-js')
    @vite('resources/js/sidebar.js')
@endsection