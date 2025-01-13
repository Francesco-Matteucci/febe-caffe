<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    /**
     * Mostra la lista di tutte le pizze.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('admin.pizzas.index', compact('pizzas'));
    }

    /**
     * Mostra il form per creare una nuova pizza.
     */
    public function create()
    {
        return view('admin.pizzas.create');
    }

    /**
     * Salva una nuova pizza nel database.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
        ]);

        // Gestione del caricamento dell'immagine
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images/pizzas', 'public');
        }

        // Creazione della pizza
        Pizza::create($validatedData);

        return redirect()->route('pizzas.index')->with('success', 'Pizza aggiunta con successo.');
    }

    /**
     * Mostra i dettagli di una singola pizza.
     */
    public function show(Pizza $pizza)
    {
        return view('admin.pizzas.show', compact('pizza'));
    }

    /**
     * Mostra il form per modificare una pizza esistente.
     */
    public function edit(Pizza $pizza)
    {
        return view('admin.pizzas.edit', compact('pizza'));
    }

    /**
     * Aggiorna i dati di una pizza esistente nel database.
     */
    public function update(Request $request, Pizza $pizza)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
        ]);

        // Gestione del caricamento dell'immagine
        if ($request->hasFile('image')) {
            // Elimina l'immagine precedente, se esiste
            if ($pizza->image) {
                Storage::disk('public')->delete($pizza->image);
            }
            $validatedData['image'] = $request->file('image')->store('images/pizzas', 'public');
        }

        // Aggiornamento della pizza
        $pizza->update($validatedData);

        return redirect()->route('pizzas.index')->with('success', 'Pizza aggiornata con successo.');
    }

    /**
     * Elimina una pizza dal database.
     */
    public function destroy(Pizza $pizza)
    {
        // Elimina l'immagine associata, se esiste
        if ($pizza->image) {
            Storage::disk('public')->delete($pizza->image);
        }

        // Elimina la pizza
        $pizza->delete();

        return redirect()->route('pizzas.index')->with('success', 'Pizza eliminata con successo.');
    }

    public function toggleAvailability(Pizza $pizza)
{
    // Inverti lo stato di disponibilità
    $pizza->is_available = !$pizza->is_available;
    $pizza->save();

    // Messaggio di successo
    return redirect()->route('pizzas.index')->with('success', 'Stato della pizza aggiornato con successo.');
}
}