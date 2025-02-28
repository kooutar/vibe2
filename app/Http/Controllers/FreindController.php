<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use function Termwind\render;

use PhpParser\Node\Stmt\Return_;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class FreindController extends Controller
{
    //
    public function addFreind(Request $request)
{
   
    $isSent = $this->estEnvoye($request->receiver_id);

    if ($isSent) {
        return redirect('/Suggestions')->with([
            'message' => 'Invitation déjà envoyée',
            'isSent' => true 
        ]);
    }

   
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

    public function showRequestEnvoye(){
        $user = Auth::user();
        $RequestsEnvoyes = $user->receivedInvitations()->get();
        // dd( $RequestsEnvoyes);
        return view('invitations' , compact('RequestsEnvoyes'));
        
    }

    public function AccepterFreind(Request $request){
        $user=Auth::user();
        $user->receivedInvitations()->wherePivot('sender_id',$request->id_sender)->updateExistingPivot($request->id_sender,['status'=>'accepted']);
        return redirect('/invitations');
    }

    public function RefuserFreind(Request $request){
       
        $user=Auth::user();
        $user->receivedInvitations()->wherePivot('sender_id',$request->id_sender)->updateExistingPivot($request->id_sender,['status'=>'rejected']);
        return redirect('/invitations');
    }
    public function Suggestions(Request $request)
    {
      
        $searchTerm = $request->input('search');
        $query = User::where('id', '!=', auth()->id());
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('pseudo', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        $users = $query->get();
        return view('Suggestions', compact('users'));
    }

    function mesAmies(){
        $user=auth()->user();
        $amis=$user->friends()->get();
       return view('mesamies',compact('amis'));
    }
}
