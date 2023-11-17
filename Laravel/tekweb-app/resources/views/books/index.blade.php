<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Collection</title>
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div id="menu" class="hidden absolute right-0 mt-2 py-2 bg-gray-700 rounded-lg shadow-lg">
                    <a href="#home" class="block px-4 py-2 text-blue-200 hover:text-white">Home</a>
                    <a href="#about" class="block px-4 py-2 text-blue-200 hover:text-white">About</a>
                    <a href="#portfolio" class="block px-4 py-2 text-blue-200 hover:text-white">Portfolio</a>
                    <a href="#contact" class="block px-4 py-2 text-blue-200 hover:text-white">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-blue-400">Book Collection</h1>

        <a href="{{ url('/books/create') }}" class="text-blue-400 mb-4 inline-block">Add New Book</a>

        <table class="w-full border-collapse border my-4 text-blue-400">
            <thead>
                <tr class="bg-gray-900">
                    <th class="border border-black py-2 px-3">Title</th>
                    <th class="border border-black py-2 px-3">Author</th>
                    <th class="border border-black py-2 px-3">ISBN</th>
                    <th class="border border-black py-2 px-3">Details</th>
                    <th class="border border-black py-2 px-3">Book Image</th>
                    <th class="border border-black py-2 px-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr class="bg-gray-800">
                    <td class="border border-black py-3 px-4 text-lg">{{ $book->title }}</td>
                    <td class="border border-black py-3 px-4 text-lg">{{ $book->author }}</td>
                    <td class="border border-black py-3 px-4 text-lg">{{ $book->isbn }}</td>
                    <td class="border border-black py-3 px-4 text-lg">{{ $book->details }}</td>
                    <td class="border border-black py-3 px-4 w-10 h-10">
                        <img src="{{ asset('images/' . $book->image) }}" alt="Book Image" style="max-width: 200px; max-height: 200px;">
                    </td>
                    <td class="border border-black py-3 px-4">
                        <a href="{{ url('/books/' . $book->id . '/edit') }}" class="text-blue-400">Edit</a>
                        <form method="post" action="{{ url('/books/' . $book->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-400">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="bg-gray-800">
                    <td colspan="6" class="border border-black py-3 px-4 text-lg">No books available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
