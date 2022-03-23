<?php

namespace App\Http\Controllers;
use App\Models\Comic;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Mi crea un array associativo con tutti i dati che passo nel form

        $comic = Comic::create($data); // Posso usarla solo se ho usato la funzione fillable nel Model

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic= Comic::findOrFail($id);

        return view('comics.edit', compact('comic')); // brutto bastardo il copmpact fa riferimento ad un array associativo
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {

        $request->validate([
            'title' => ['require', 'string','max:50','min:5'],
            'description' => ['string','min:5'],
            'thumb' => ['string','min:15'],
            'price' => ['require', 'numeric','max:999','min:1'],
            'sale_date' => ['date','string','max:10','min:6'],
            'type' => ['string','min:5'],
        ],[
            'required'=> 'il campo :attribute è obligatorio',
            'price.max'=>'l prezzo massimo è :max'
        ]);        


        $comic = Comic::findOrFail($id);
        
        $data = $request->all();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
