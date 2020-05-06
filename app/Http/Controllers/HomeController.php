<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $books=Book::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
       
        
        return view('home')->with('books',$books);
    }

    public function adminHome(){
        $books=Book::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->simplePaginate(7);
        return view('admin.home')->with('books',$books);
    }

   
}
