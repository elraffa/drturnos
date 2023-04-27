<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GuestNav extends Component
{
    public $showMenu = false;

    public function render()
    {
        return view('livewire.guest-nav');
    }
}
