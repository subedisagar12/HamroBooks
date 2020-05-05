<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
class WelcomeController extends Controller
{
    public function index(){
        $books=Book::orderBy('created_at','desc')->get();
        $categories=Category::all();
        $counter=0;
        $filter_cat=array();
        foreach ($categories as $category){
            if(count(Category::find($category->id)->Books)>=5){
                array_push($filter_cat,$category);
            }
        }

        
        // foreach($filter_cat as $category){
        //     foreach($books as $book){
        //         if($book->category_id==$category->id){
        //             echo $book->name;
        //         }
        //     }
        // }
        return view('welcome')->with('books',$books)->with('filter_cat',$filter_cat)->with('counter',$counter);
    }
}
