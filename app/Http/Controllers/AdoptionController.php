<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    // Show form to create an adoption
    public function create()
    {
        // Only list available pets (status = 0)
        $pets = Pet::where('status', 0)->get();
        return view('adoptions.create')->with('pets', $pets);
    }

    // Store adoption and update pet status
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => ['required', 'exists:pets,id'],
        ]);

        $user = Auth::user();

        $pet = Pet::find($request->pet_id);
        if (!$pet || $pet->status == 1) {
            return redirect()->back()->withErrors(['pet_id' => 'Pet not available']);
        }

        $adoption = Adoption::create([
            'user_id' => $user->id,
            'pet_id' => $pet->id,
        ]);

        // mark pet as adopted and inactive
        $pet->status = 1;
        $pet->active = 0;
        $pet->save();

        return redirect(url('pets'))->with('message', 'Adoption requested successfully!');
    }
}
