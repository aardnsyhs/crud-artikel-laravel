<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Article</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        header {
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    @include ('include.navbar')

    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
    <section class="bg-white dark:bg-gray-900 mt-12">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white shadow-md rounded-md overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $article->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ $article->category_name }}</p>
                            <p class="text-gray-700 leading-relaxed">{{ $article->description }}</p>
                            <div class="flex items-center justify-between mt-6">
                                <div class="flex items-center">
                                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                        alt="Author" class="w-10 h-10 rounded-full mr-2">
                                    <span class="text-sm text-gray-700">{{ $article->author_name }}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span
                                        class="text-sm text-gray-500">{{ $article->created_at->diffForHumans() }}</span>
                                    @if ($article->user_id === auth()->id())
                                        <a href="{{ route('article.destroy', ['id' => $article->id]) }}"
                                            class="text-sm font-semibold text-red-600 hover:text-red-800">Delete</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
