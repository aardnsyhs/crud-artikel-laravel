<header class="fixed inset-x-0 top-0 z-50 bg-transparent mx-auto max-w-screen shadow-lg">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Article</span>
                <h1 class="text-2xl text-normal"><span class="font-bold">Art</span>icle</h1>
            </a>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/article" class="text-sm font-semibold leading-6 text-gray-900">Article</a>
            <a href="/about" class="text-sm font-semibold leading-6 text-gray-900">About</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @auth
                <a class="text-sm font-semibold leading-6 mx-2 mt-0.5 text-gray-900">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-sm font-semibold leading-6 text-gray-900">Log Out <span>&rarr;</span></button>
                </form>
            @endauth
        </div>
    </nav>
</header>
