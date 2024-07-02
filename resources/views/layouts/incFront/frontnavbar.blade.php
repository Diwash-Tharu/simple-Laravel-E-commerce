<nav class="bg-gray-800">

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-0 pb-0">
        <div class="relative flex h-16 items-center justify-between">
            <div class="sm:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false" onclick="toggleMobileMenu()">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                </button>
            </div>

            <!-- Logo and Navigation Links -->
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a class="flex flex-shrink-0 items-center" href="{{ url('/') }}">
                            <img class="h-16 w-auto" src="{{ asset('images/logo-re.png') }}" alt="Your Company">
                        </a>
                        <!-- Navigation Links -->
                        <a href="{{ url('category') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-4 text-sm font-medium">Category</a>
                        <a href="{{ url('cart') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-4 text-sm font-medium">Cart</a>
                        <a href="{{ url('wishlist') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-4 text-sm font-medium">Wishlist</a>
                        <a href="{{ url('all-product') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-4 text-sm font-medium">Products</a>


                    </div>
                </div>
            </div>

            <!-- Notifications and Profile Dropdown -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button"
                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    <button type="button"
                        class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleUserDropdown()">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="{{ asset('images/user_icon.png') }}" alt="">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="user-dropdown"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                        style="display: none;">
                        <!-- Paste the content of the first dropdown here -->
                        <div class="py-1">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                            @endif

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                            @endif
                            @else
                            <button @click="openDropdown = !openDropdown"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            <a href="{{ url('my-orders') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            @endguest
                            <!-- End Authentication Links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ url('category') }}"
                    class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Category</a>
                <a href="{{ url('cart') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Cart</a>
                <a href="{{ url('wishlist') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Wishlist</a>
                <a href="{{ url('all-product') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Product</a>
            </div>
        </div>
    </div>

</nav>

<script>

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        var isClickInside = document.getElementById('user-menu-button').contains(event.target) || document.getElementById('user-dropdown').contains(event.target);
        if (!isClickInside) {
            document.getElementById('user-dropdown').style.display = 'none';
        }
    });

    function toggleUserDropdown() {
        var userDropdown = document.getElementById('user-dropdown');
        userDropdown.style.display = (userDropdown.style.display === 'none' || userDropdown.style.display === '') ? 'block' : 'none';
    }

    function toggleMobileMenu() {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.style.display = (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') ? 'block' : 'none';
    }
</script>