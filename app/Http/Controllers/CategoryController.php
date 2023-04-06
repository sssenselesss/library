<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:5'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        Category::query()->create([]+$validator->validated());

        return redirect()->route('main');
    }

    public function destroy(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required'
        ]);
        Category::destroy($validator->validated());

        return redirect()->route('main');
    }
}
