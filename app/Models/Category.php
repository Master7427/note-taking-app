<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function create()
{
    $categories = Category::all();
    return view('notes.create', compact('categories'));
}
public function edit($id)
{
    $note = Note::findOrFail($id);
    $categories = Category::all();
    return view('notes.edit', compact('note', 'categories'));

}
}