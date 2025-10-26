<?php
namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Autocompleter;
class NoteController extends Controller
{
   public function index()
   {
       $notes = Note::all();
       return view('notes.index', compact('notes'));
   }
    public function create()
    {
         return view('notes.create');
    }

   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        'user_id' => 'required',
        'category_id' => 'nullable',
        'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->with('warning', 'Tous les champs sont requis');
    }

    // Traitement du fichier après validation
    $image = $request->file('photo');
    $fileName = time() . '.' . $image->getClientOriginalExtension();
    $path = $image->storeAs('images/upload', $fileName, 'public');

    Note::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'user_id' => $request->input('user_id'),
        'category_id' => $request->input('category_id'),
        'photo' => $fileName,
    ]);

    return redirect('/')->with('success', 'Note ajoutée avec succès');
}
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')
                         ->with('success', 'Note updated successfully.');
    }
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
                         ->with('success', 'Note deleted successfully.');
    }
    
/*     public function apropos()
    {
        return view('apropos');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function indexWelcome()
    {
        $notes = Note::all();
        return view('welcome', compact('notes'));
  
        } */
       public function Autocomplete( Request $request)
       {
          // return response()->json(Note::all());
         $search = $request->search;
         $notes = Note::orderBy('title','ASC')
                 ->where('title','LIKE',"%$search%")
                 ->get();
                 $response = array();
                 foreach ($notes as $note){
                     $response[] = array("value"=>$note->title,"id"=>$note->id);
                 }
                 return response()->json($response);
       }
}
