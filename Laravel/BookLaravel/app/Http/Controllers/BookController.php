<?php

namespace App\Http\Controllers;

// BookController.php

use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use Illuminate\Http\Request;


class  BookController extends Controller {
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'isbn' => 'required|numeric',
        'details' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    

    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    // Store the book data including the image name
    $book = new Book($request->all());
    $book->image = $imageName;
    $book->save();

    return redirect('/books')
        ->with('success','You have successfully upload image.')
        ->with('image',$imageName);
}
    public function show($id) {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    public function edit($id) {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|numeric',
            'details' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::find($id);

        // Update other fields
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->details = $request->details;

        // Check if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the existing image if it exists
            if ($book->image) {
                Storage::delete('public/images/' . $book->image);
            }

            // Move the new image to the storage
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);

            // Update the book with the new image name
            $book->image = $imageName;
        }

        $book->save();

        return redirect('/books');
    }

    public function destroy($id) {
        Book::find($id)->delete();
        return redirect('/books');
    }
}
