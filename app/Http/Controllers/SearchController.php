<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class SearchController extends Controller
{
    public function search(Request $request){
        $q=$request->input('search');
        $books=Book::where('name','LIKE','%' .$q . '%')->orWhere('author','LIKE','%' .$q . '%')->orWhere('publication','LIKE','%' .$q . '%')->get();
        return view('search')->with('books',$books)->with('query',$q);
    }
}
