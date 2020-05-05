<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name')->get();
        return view('book.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'author'=>'required',
            'publication'=>'required',
            'edition'=>'required',
            'price'=>'required',
            
        ]);

        

        if($request->hasFile('image')){
            
            $this->validate($request,[
                'image'=>'file|image|max:5000'
            ]);

            $fileNameWithExt=$request->file('image')->getClientOriginalName();

            // Just file name

            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //get file extension 
            $extension=$request->file('image')->getClientOriginalExtension();

            // filename to store

            $fileNameToStore=$fileName . '_' . time() . '.' . $extension;

            $path=$request->file('image')->storeAs('public/book_images',$fileNameToStore);
        }
        
        $book=new Book();
        
        $book->name=$request->input('name');
        $book->publication=$request->input('publication');
        $book->author=$request->input('author');
        $book->price=$request->input('price');
        $book->edition=$request->input('edition');
        $book->cover_img=$fileNameToStore;
        $book->isSold=false;
        $book->category_id=Category::where('name',$request->input('category'))->first()->id;
        $book->user_id=Auth::user()->id;
        $book->save();
         return redirect('/home')->with('success','Book added to sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $book=Book::find($id);
        $user=User::where('id',$book->user_id)->first();
        $categories=Category::orderBy('name','asc')->get();
        $books=Book::where('category_id',$book->category_id)->orderBy('created_at','asc')->get()->take(5);
        // return $user->email;
        // return $books;
        return view('book.show')->with('book',$book)->with('user',$user)->with('books',$books)->with('categories',$categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $book=Book::find($id);
       $categories=Category::orderBy('name')->get();
       return view('book.edit')->with('book',$book)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'author'=>'required',
            'publication'=>'required',
            'edition'=>'required',
            'price'=>'required',
            
        ]);

        
        $book=Book::find($id);
        if($request->hasFile('image')){

            $this->validate($request,[
                'image'=>'file|image|max:5000'
            ]);

            $fileNameWithExt=$request->file('image')->getClientOriginalName();

            // Just file name

            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //get file extension 
            $extension=$request->file('image')->getClientOriginalExtension();

            // filename to store

            $fileNameToStore=$fileName . '_' . time() . '.' . $extension;

            $path=$request->file('image')->storeAs('public/book_images',$fileNameToStore);
        }

      else{
          $fileNameToStore=$book->cover_img;
      }
        
      if($request->has('isSold')){
          $book->isSold=true;
      }
      else{
        $book->isSold=false;
      }
      $category=Category::where('name',$request->input('category'))->first();
        $book->name=$request->input('name');
        $book->publication=$request->input('publication');
        $book->author=$request->input('author');
        $book->price=$request->input('price');
        $book->edition=$request->input('edition');
        $book->cover_img=$fileNameToStore;
        
        $book->category_id=$category->id;
        $book->user_id=Auth::user()->id;
        $book->save();
        
         return redirect('/home')->with('success','Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::find($id);
        $book->delete();
        return redirect('/home')->with('error','Book has been deleted');
    }
}
