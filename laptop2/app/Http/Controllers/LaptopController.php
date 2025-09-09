<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Laptop;

class LaptopController extends Controller
{
    public function index(){
        $laptops = Laptop::latest()->get();
        return view('laptops.laptops', compact('laptops'));
    }

// Show the form to create a new laptop
    public function create(){
        return view('laptops.create');
    }

// Store the new laptop in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'screen_size' => 'nullable|string|max:255',
            'graphics_card' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'in_stock' => 'boolean'
        ]);
        
      
        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('laptops', 'public');
        }

        $validated['in_stock'] = $request->has('in_stock');

        Laptop::create($validated);

        return redirect()->route('laptops.index')
                        ->with('success', 'Лаптопът е добавен успешно!');

        return redirect()->route('laptops')->with('success', 'Лаптопът е добавен успешно!');
    }

    //Display a specific laptop
    public function show(Laptop $laptop){
        return view('laptops.show', compact('laptop'));
    }

    //Show the form to edit a laptop
    public function edit(Laptop $laptop)
    {
        return view('laptops.edit', compact('laptop'));
    }

    //Update the specified laptop in the storage.

    public function update(Request $request, Laptop $laptop)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'screen_size' => 'nullable|string|max:255',
            'graphics_card' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'in_stock' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('laptops', 'public');
        }

        $validated['in_stock'] = $request->has('in_stock');

        $laptop->update($validated);

        return redirect()->route('laptops.index')
                        ->with('success', 'Лаптопът е обновен успешно!');
    }

    //Delete the specified laptop from storage.
    public function destroy(Laptop $laptop){

        if($laptop->image){
          Storage::disk('public')->delete($laptop->image);
        }

        $laptop->delete();

        return redirect()->route('laptops.index')
                        ->with('success', 'Лаптопът е изтрит успешно!');
    }


}
