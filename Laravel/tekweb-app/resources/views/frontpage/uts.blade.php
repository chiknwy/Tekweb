<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Collection Management</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-blue-400">

<header class="px-5 sticky top-0  bg-gray-900 py-5 opacity-95 backdrop-blur-sm z-10">
    <nav class="container mx-auto flex items-center justify-between opacity-100">
        <div class="uppercase text-lg flex items-center space-x-2">
            <a href="https://chiknwy.github.io/Tekweb/porto/">
                <span class="font-extrabold text-blue-400">Chiko</span><br>
                <span class="font-extralight text-indigo-500">Satria</span>
            </a>
        </div>
        <!-- Responsive Navigation Menu -->
        <div class="text-blue-400 items-center space-x-4 hidden sm:flex"> <!-- Hide on small screens -->
            <h1 class="text-3xl font-bold mb-4">Library Book Collection Management</h1>
        </div>

        <!-- End Responsive Dropdown Menu -->
        <div class="w-11 h-11 flex">
            <!-- <img src="img/skull.gif" alt="skull"> -->
        </div>
        <!-- Responsive Dropdown Menu (Hidden on larger screens) -->
        <div class="sm:hidden relative">
            <button id="menu-toggle" class="text-blue-400 hover:text-white transition-transform transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
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

<div id="app" class="container mx-auto p-4">

    <div class="flex bg-gray-800 text-blue-800">

        <!-- Input Form -->
        <form @submit.prevent="saveBook" class="p-4 border border-transparent rounded-lg my-4 w-1/3 mr-4">
            <label for="title" class="block font-bold text-lg ">Title:</label>
            <input v-model="title" type="text" id="title" name="title" required class="w-full py-2 px-3 bg-gray-900">

            <label for="author" class="block font-bold text-lg">Author:</label>
            <input v-model="author" type="text" id="author" name="author" required class="w-full py-2 px-3 bg-gray-900">

            <label for="isbn" class="block font-bold text-lg">ISBN:</label>
            <input v-model="isbn" type="number" id="isbn" name="isbn" required class="w-full py-2 px-3 bg-gray-900">

            <label for="details" class="block font-bold text-lg">Details:</label>
            <input v-model="details" type="text" id="details" name="details" required class="w-full py-2 px-3 bg-gray-900">

            <label for="bookImage" class="block font-bold text-lg">Book Image:</label>
            <input type="file" id="bookImage" name="bookImage" accept="image/*" @change="handleImageUpload" class="bg-gray-800">

            <br>

            <button type="submit" class="bg-gray-900 text-white py-2 px-4 rounded mt-4">Save</button>
        </form>

        <!-- Table -->
        <table class="w-2/3 border-collapse border my-4 text-blue-400">
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
                <tr v-if="books.length === 0" class="bg-gray-800">
                    <td colspan="6" class="border border-black py-3 px-4 text-lg">No books available</td>
                </tr>
                <tr v-for="(book, index) in books" class="bg-gray-800">
                <td class="border border-black py-3 px-4 text-lg">@{{ book.title }}</td>
                <td class="border border-black py-3 px-4 text-lg">@{{ book.author }}</td>
                <td class="border border-black py-3 px-4 text-lg">@{{ book.isbn }}</td>
                <td class="border border-black py-3 px-4 text-lg">@{{ book.details }}</td>
                <td class="border border-black py-3 px-4 w-10 h-10">
                    <img :src="book.bookImage" alt="Book Image" style="max-width: 200px; max-height: 200px;">
                </td>
                <td class="border border border-black py-3 px-4">
                    <button @click="editBook(index)" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</button>
                    <button @click="deleteBook(index)" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                </td>
            </tr>
            </tbody>

        </table>
    </div>
</div>

<script>
    new Vue({
    el: '#app',
    data: {
        books: [],
        title: '',
        author: '',
        details: '',
        isbn: '',
        bookImage: null,
        editIndex: -1,
    },
    methods: {
        saveBook: function () {
            axios.post('/lib', {
                title: this.title,
                author: this.author,
                details: this.details,
                isbn: this.isbn,
                bookImage: this.bookImage,
            })
                .then(response => {
                    console.log(response.data.message);
                    this.title = '';
                    this.author = '';
                    this.details = '';
                    this.isbn = '';
                    this.bookImage = null;
                    // Fetch updated book list after saving
                    this.fetchBooks();
                })
                .catch(error => {
                    console.log(error);
                });
        },
        fetchBooks: function () {
            axios.get('/lib')
                .then(response => {
                    this.books = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        mounted: function () {
            this.fetchBooks();
        },
        editBook: function (index) {
            this.editIndex = index;
            this.title = this.books[index].title;
            this.author = this.books[index].author;
            this.details = this.books[index].details;
            this.isbn = this.books[index].isbn;
            this.bookImage = this.books[index].bookImage;
        },
        deleteBook: function (index) {
            this.books.splice(index, 1);
        },
        handleImageUpload: function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.bookImage = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    }
});

</script>
</body>
</html>
