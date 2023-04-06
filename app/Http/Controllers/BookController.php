<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'author' => 'required|min:2',
            'category_id' => 'required',
            'content' => 'required|min:30|max:500',
            'age' => 'required',
            'count_list' => 'required|min:2',
            'year' => 'required',

            'image' => 'mimes:png,jpeg,jpg',
            'file' => 'mimes:pub,pdf,epub',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $image_path = null;
        $file_path = null;

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('public/images');
        }
        if ($request->file('file')) {
            $file_path = $request->file('file')->store('public/files');
        }

        Book::query()->create([
                'image' => $image_path,
                'file_path' => $file_path
            ] + $validator->validated());

        return redirect()->route('main');
    }

    public function show($id)
    {
        $favBook = [];
        if(Auth::check()){
            $user_id = auth()->user()->id;
            $favBook = Favorite::query()->where('user_id','=',$user_id)->where('book_id','=',$id)->get();

        }





        $book = Book::query()->find($id);

        $category = Category::query()->find($book->category_id);

        $sameBook = Book::query()->where('category_id', $book->category_id)->whereNot('id', $book->id)->limit(3)->get();

        if ($book === null) {
            return redirect()->route('main');
        }

        return view('singleBook', ['book' => $book, 'favBook'=>$favBook,'category' => $category, 'sameBook' => $sameBook]);
    }

    public function update(Request $request,Book $book){
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'author' => 'required|min:2',
            'category_id' => 'required',
            'content' => 'required|min:30|max:300',
            'age' => 'required',
            'count_list' => 'required|min:2',
            'year' => 'required',

            'image' => 'mimes:png,jpeg,jpg',
            'file' => 'mimes:pub,pdf,epub',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();

        $path_file = $book->file_path;
        $path = $book->image;

        if ($request->file('image')) {

            $path = $request->file('image')->store('public/images');

            $validated['image'] = $path;
        }

        if ($request->file('file')) {

            $path_file = $request->file('file')->store('public/files');

            $validated['file'] = $path;
        }

        $book->update(['file_path'=>$path_file,'image'=>$path]+$validated);

        return redirect()->route('main');

    }

    public function destroy($id){
        Book::destroy($id);
        return redirect()->route('main');
    }

    public  function addFavorite($id){
        $book_id = $id;
        $user_id = auth()->user()->id;

        Favorite::query()->create(['user_id'=>$user_id,'book_id'=>$book_id]);

        return redirect()->route('singleBook',$id);
    }

    public function deleteFavorite($id){
        $user_id = auth()->user()->id;
        $book_id = $id;

        Favorite::query()->where('user_id',$user_id)->where('book_id',$book_id)->delete();

        return redirect()->route('singleBook',$id);
    }
}
