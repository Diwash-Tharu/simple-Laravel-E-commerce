<section class="py-8">
    <div
        class="max-w-screen-xl mx-auto text-gray-600 gap-x-12 items-center justify-between overflow-hidden md:flex md:px-8">
        <div class="flex-none space-y-5 px-4 sm:max-w-lg md:px-0 lg:max-w-xl">
            <h1 class="text-sm text-teal-600 font-medium">
                Discover the Latest Trends
            </h1>
            <h2 class="text-4xl text-gray-800 font-extrabold md:text-5xl">
                Elevate Your Style with Our Fashion Collections
            </h2>
            <p>
                Explore a world of fashion and express your unique style. Find the perfect outfits that resonate with
                your personality and make a statement wherever you go.
            </p>
            <div class="items-center gap-x-3 space-y-3 sm:flex sm:space-y-0">
                <a href="{{ url('all-product') }}"
                    class="block py-2 px-4 text-center text-white font-medium bg-teal-600 duration-150 hover:bg-teal-500 active:bg-teal-700 rounded-lg shadow-lg hover:shadow-none">
                    Start Shopping
                </a>
                <a href="{{ url('register') }}"
                    class="flex items-center justify-center gap-x-2 py-2 px-4 text-gray-700 hover:text-gray-500 font-medium duration-150 active:bg-gray-100 border rounded-lg md:inline-flex">Exclusive
                    Access
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="flex-none mt-4 md:mt-0 md:max-w-xl">
            @include('layouts.incFront.slider')
        </div>

    </div>
</section>