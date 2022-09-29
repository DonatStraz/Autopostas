<?php

namespace App\Http\Livewire;
use App\Models\{Review, CarGeneration, CarMake, CarModel, ReviewImages, User};

use Livewire\Component;

class EditProfileModal extends Component
{

    public $id;

    public function editUserName(int $id){
        $user = User::find($id);
        if($user){
            $this->id = $user->id;
        }else{
            dd($id);
        }
    }

    public function render()
    {
        return view('livewire.edit-profile-modal');
    }
}
