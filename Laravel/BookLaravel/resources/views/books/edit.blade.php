<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-blue-400">

    <header class="px-5 sticky top-0 bg-gray-900 py-5 opacity-95 backdrop-blur-sm z-10">
        <nav class="container mx-auto flex items-center justify-between opacity-100">
            <div class="uppercase text-lg flex items-center space-x-2">
                <a href="https://chiknwy.github.io/Tekweb/porto/">
                    <span class="font-extrabold text-blue-400">Chiko</span><br>
                    <span class="font-extralight text-indigo-500">Satria</span>
                </a>
            </div>
            <div class="text-blue-400 items-center space-x-4 hidden sm:flex">
                <h1 class="text-3xl font-bold mb-4">Library Book Collection Management</h1>
            </div>
            <div class="w-11 h-11 flex">
                <!-- <img src="img/skull.gif" alt="skull"> -->
            </div>
            <div class="sm:hidden relative">
                <button id="menu-toggle" class="text-blue-400 hover:text-white transition-transform transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div id="menu"
                    class="hidden absolute right-0 mt-2 py-2 bg-gray-700 rounded-lg shadow-lg">
                    <a href="#home"
                        class="block px-4 py-2 text-blue-200 hover:text-white">Home</a>
                    <a href="#about"
                        class="block px-4 py-2 text-blue-200 hover:text-white">About</a>
                    <a href="#portfolio"
                        class="block px-4 py-2 text-blue-200 hover:text-white">Portfolio</a>
                    <a href="#contact"
                        class="block px-4 py-2 text-blue-200 hover:text-white">Contact</a>
                </div>
            </div>
        </nav>
    </header>


    <div class="container mx-auto flex items-center justify-center">
        <h1 class="text-4xl font-bold text-blue-400">Edit a Book</h1>
    </div>

    <div class="container mx-auto flex items-center justify-center ">
        <form method="post" action="{{ url('/books/' . $book->id) }}"
            class="max-w-md bg-gray-900 p-6 rounded-md" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-4">
                <label class="block text-sm text-blue-400">Title:</label>
                <input type="text" name="title" value="{{ $book->title }}"
                    class="w-full px-3 py-2 border rounded-md text-blue-400 bg-gray-900 focus:outline-none focus:border-blue-400 border-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-blue-400">Author:</label>
                <input type="text" name="author" value="{{ $book->author }}"
                    class="w-full px-3 py-2 border rounded-md text-blue-400 bg-gray-900 focus:outline-none focus:border-blue-400 border-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-blue-400">ISBN:</label>
                <input type="text" name="isbn" value="{{ $book->isbn }}"
                    class="w-full px-3 py-2 border rounded-md text-blue-400 bg-gray-900 focus:outline-none focus:border-blue-400 border-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-blue-400">Details:</label>
                <input type="text" name="details" value="{{ $book->details }}"
                    class="w-full px-3 py-2 border rounded-md text-blue-400 bg-gray-900 focus:outline-none focus:border-blue-400 border-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-blue-400">Current Image:</label>
                @if ($book->image)
                <img src="{{ asset('images/' . $book->image) }}" alt="Current Book Image"
                    class="mt-2 max-w-xs">
                @else
                <p class="text-blue-400">No image available</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-sm text-blue-400">New Image:</label>
                <input type="file" name="image"
                    class="w-full px-3 py-2 border rounded-md text-blue-400 bg-gray-900 focus:outline-none focus:border-blue-400 border-blue-200">
            </div>

            <button type="submit"
                class="bg-blue-400 text-gray-900 px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Update</button>
        </form>
    </div>

</body>

</html>
