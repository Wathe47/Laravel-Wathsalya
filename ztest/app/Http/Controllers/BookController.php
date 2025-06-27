<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function getAllBooks(){
      $books = Book::all();
      return response()->json($books);
    }
    

    public function getBookById($id){
      $book = Book::find($id);
      if(!$book){
         return response()->json(['message'=>'Book not found!' ]);
      }

      return response()->json($book);
    }


    public function createBook(Request $request){
      $book = BooK::create([
         "name"=> $request->name,
         "author"=> $request->author,
      ]);
      return response()->json([
         "message" => "Book has been created!",
         "book"=> $book
      ]);
    }

    public function updateBook($id,Request $request){
      $book = Book::find($id);
      if(!$book){
         return response()->json(['message'=>'Book not found!' ]);
      }

      $book->update($request->all());
      return response()-> json([
         "message" => "Book has been updated!",
         "book"=> $book
      ]);

    }

    public function deleteBook($id){
      $book = Book::find($id);
      if(!$book){
         return response()->json(['message'=>'Book not found!' ]);
      }

      $book->delete();
      return response()-> json([
         "message" => "Book has been deleted!",
      ]);
    }
}
