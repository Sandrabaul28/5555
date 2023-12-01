<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::OrderBy('id', 'ASC')
                        ->paginate(2);

    	return view('admin.books.index',[
    		'pagetitle' => 'Books',
    		'title' => 'Books | Admin',
            'books' => $books
    	]);
    }
    public function create()
    {
    	return view('admin.books.create',[
    		'pagetitle' => 'Books',
    		'title' => 'Books | Admin'
    	]);
    }
    public function view(Request $request)
    {
        $book = Book::where('id', $request->id)
                        ->first();

        return view('admin.books.view',[
            'pagetitle' => 'View',
            'title' => 'View | Admin',
            'book' => $book
        ]);
    }
    public function store(Request $request)
    {
        $saveBooks = new Book;
        $saveBooks->title = $request->title;
        $saveBooks->author = $request->author;
        $saveBooks->pages = $request->pages;
        $saveBooks->date_published  = $request->pubdate;
         // Check if the file was uploaded without errors
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                
                // Specify the directory where you want to save the uploaded file
                $target_dir = "images/books/";
                
                // Create the directory if it doesn't exist
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Get the temporary name of the file
                $temp_name = $_FILES["image"]["tmp_name"];
                
                // Generate a unique name for the file
                $target_file = $target_dir . uniqid() . '_' . basename($_FILES["image"]["name"]);
                
                // Move the file to the desired location
                if (move_uploaded_file($temp_name, $target_file)) {
                    $saveBooks->img =  $target_file;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Error: " . $_FILES["image"]["error"];
            }

        if ($saveBooks->save()) {
            return redirect()->back();
        }
    }
    public function searchtitle(Request $resquest)
    {
        $book = Book::where('title', $resquest->title)->first();
        return json_encode($book);
    }
}
