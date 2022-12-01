<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmModal extends Component
{

    public $reviewId = '';


    public function review($id)
    {
        $this->$reviewId;

    }

    public function render()
    {
        return view('livewire.confirm-modal');
    }
}
