<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $cat_last = Category::query()->orderByDesc('id')->limit(3)->get();
        $book_last = Book::query()->orderByDesc('id')->limit(5)->get();
        return view('main', ['book_last' => $book_last, 'cat_last' => $cat_last]);
    }

    public function single()
    {
        return view('singleBook');
    }

    public function adminUsers()
    {

        $users = User::query()->whereNot('id', Auth::user()->id)->get();
        return view('adminUsers', ['users' => $users]);
    }

    public function adminAddBook()
    {
        $categories = Category::all();
        return view('adminAddBook', ['categories' => $categories]);
    }

    public function adminAddCategory()
    {
        $categories = Category::all();
        return view('adminAddCategory', ['categories' => $categories]);
    }

    public function favorite()
    {
        if(Auth::check()){
            $userId = auth()->user()->id;
        }

        $favs = DB::table('books AS book')
            ->join('favorites AS fav', 'book.id', '=', 'fav.book_id')
            ->select(['book.id','book.title','book.author','book.image'])
            ->where('user_id', '=',$userId)->get();






        return view('favorite', ['favs' => $favs]);
    }

    public function login()
    {
        return view('login');
    }

    public function update(Book $book)
    {
        $categories = Category::all();

        return view('update', ['categories' => $categories, 'book' => $book]);
    }

    public function catalog($categoryId = null)
    {
        $books = Book::query();

        if (isset($categoryId)) {

            if ($categoryId === 0) {
                $books->orderByDesc('id');
            }
            $books->where('category_id', $categoryId);
        }


        $categories = Category::all();
        return view('catalog', ['categories' => $categories, 'books' => $books->get()]);
    }
}
