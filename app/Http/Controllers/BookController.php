<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Laravel\Lumen\Routing\Controller;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class BookController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return Books Lists.
     *
     * @return Illuminate\Http\Response;
     */
    public function index(){
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * Create an instance of Book.
     *
     * @return Illuminate\Http\Response;
     */
    public function store(Request $request){
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1'
        ];

        $this->validate($request, $rules);

        $books = Book::create($request->all());

        return $this->successResponse($books, Response::HTTP_CREATED);
    }

    /**
     * Return an specific Book.
     *
     * @return Illuminate\Http\Response;
     */
    public function show($id){
        $books = Book::findOrFail($id);

        return $this->successResponse($books);
    }


    /**
     * Update the information of an existing Book
     *
     * @return Illuminate\Http\Response;
     */
    public function update(Request $request, $id){
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1'
        ];
        $this->validate($request, $rules);

        $book = Book::findOrFail($id);

        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return  $this->successResponse($book);
    }

    /**
     * Remove an existing Book
     *
     * @return Illuminate\Http\Response;
     */
    public function destroy($id){
        $books = Book::findOrFail($id);

        $books->delete();

        return $this->successResponse($books);
    }
    //

}
