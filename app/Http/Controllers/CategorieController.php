<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $notes = $category->notes;

        return view('categories.show', compact('category', 'notes'));
    }
}