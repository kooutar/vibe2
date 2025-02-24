<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

use function Termwind\render;

class FreindController extends Controller
{
    //
    public function addFreind(Request $request)
{
    // Vérifie si l'invitation existe déjà
    $isSent = $this->estEnvoye($request->receiver_id);

    if ($isSent) {
        return redirect('/Suggestions')->with([
            'message' => 'Invitation déjà envoyée',
            'isSent' => true // Passer la variable isSent
        ]);
    }

    // Créer l'invitation si elle n'existe pas
    Invitation::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->userRecu_id,
    ]);

    return redirect('/Suggestions')->with([
        'message' => 'Invitation envoyée avec succès',
        'isSent' => false // Passer la variable isSent
    ]);
}


    public function estEnvoye($receiver_id)
    {
    return Invitation::where('sender_id', auth()->id())
        ->where('receiver_id', $receiver_id)
        ->exists(); 
       
    }
}
