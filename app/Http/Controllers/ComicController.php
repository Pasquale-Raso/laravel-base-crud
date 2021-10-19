<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComicModel;

// use Rule per validazione titolo in edit
use Illuminate\Validation\Rule;
// --------------------------------------


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //! per fare la ricerca aggiungi (Request $request) in index qui sopra e scrivi questo sotto
        $search = $request->query('search');
        //! in più si cancella $comics = ComicModel::all(); che no sarà più all e si scrive questo sotto
        
        $comics = ComicModel::where('title', 'LIKE', "%$search%")->get();

        //! ----------------------------------in piu passi 'search' a return qui sotto

        return view("comics.index", compact('comics','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comic = new ComicModel();
        return view("comics.create", compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //todo VALIDAZIONE viene fatta qui per in create
        $request->validate([
            // unique verifica se ci sono altri titoli uguali
            'title'=> ['required','string','unique:comics','min:2','max:255'],
            'description'=> ['required','string','min:2','max:1000'],
            'img'=> ['required','string','min:2','max:500'],
            'price'=> ['required','numeric','min:-100', 'max:200']
        ], [
            'required' => "il campo del :attribute è obbligatorio",
            'price.numeric' => "Il prezzo deve essere un numero",
            'title.unique' => "il fumetto $request->title esiste già",

        ]);
        //todo ----------------------------

        $data = $request->all();
        $comic = new ComicModel();

        $comic->fill($data);
        // se usi fill devi andare ad inserire in ComicModel questo sotto:
        // protected $fillable= ['title', 'description', 'img', 'price'];


        // altro metodo

        // $comic->title = $data['title'];
        // $comic->description = $data['description'];   
        // $comic->img = $data['img'];  
        // $comic->price = (float)$data['price'];
        
        $comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ComicModel $comic)
    {
        return view("comics.show", compact('comic'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ComicModel $comic)
    {
        return view("comics.edit", compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComicModel $comic)
    {

        //todo VALIDAZIONE viene fatta qui per l'edit
        $request->validate([
            // unique verifica se ci sono altri titoli uguali

            // quando si modifica un campo in edit e si salva, laravel non riconosce il titolo dicendo che è gia presente e non ti da il lascito alla nuova creazione del fumetto. per questo si aggiunge il metodo Rule (con questa dicitura in basso: Rule::unique('comics')->ignore($comic->id)) sia in update e sia in 'use' (con questa dicitura in alto: use Illuminate\Validation\Rule;)
            
            'title' => ['required', 'string', Rule::unique('comics')->ignore($comic->id), 'min:2', 'max:255'],
            'description' => ['required', 'string', 'min:2', 'max:1000'],
            'img' => ['required', 'string', 'min:2', 'max:500'],
            'price' => ['required', 'numeric', 'min:-100', 'max:200']
        ], [
            'required' => "il campo del :attribute è obbligatorio",
            'price.numeric' => "Il prezzo deve essere un numero",
            'title.unique' => "il fumetto $request->title esiste già",

        ]);
        //todo ----------------------------



        $data = $request->all();

        $comic->update($data);
         // se usi update devi andare ad inserire in ComicModel questo sotto:
        // protected $fillable= ['title', 'description', 'img', 'price'];

    
        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComicModel $comic)
    {
        // recupero modello scrivo tra parentesi qui in alto (ComicModel $comic) e scrivo sotto $comic->delete();
        $comic->delete();

        // il return lo faccio se voglio che dopo l'eliminazione la pagina ritorni all'index come qui sotto: return redirect()->route('comics.index');
        return redirect()->route('comics.index');
    }
}
