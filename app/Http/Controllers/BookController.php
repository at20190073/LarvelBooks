<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return $books;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|',
            'author_name' => 'required|string|',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'mark'=>'integer',
           // 'user_id'=>'required|integer',
            'genre_id'=>'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $book = Book::create([
            'title' => $request->title,
            'author_name' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
            'mark'=>$request->mark,
            'user_id'=>Auth::user()->id,
            'genre_id'=>$request->genre_id,
        ]);

        return response()->json(['Book created successfully', new BookResource($book)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      
        $books = Book::where('author_name', $request->author)->get();

        if ($books->isEmpty()) {
            return response()->json('Data not found', 404);
        }
        return ($books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|',
            'author_name' => 'required|string|',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'mark'=>'integer',
            'user_id'=>'required|integer',
            'genre_id'=>'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $book->title=$request->title;
        $book->author=$request->author;
        $book->description=$request->description;
        $book->price=$request->price;
        $book->mark=$request->mark;
        $book->genre_id=$request->genre_id;
        $book->user_id=$request->user_id;
        $book->save();
        return response()->json(['Book is updated successfully', new BookResource($book)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json('Book is deleted successfully');
    }
}
