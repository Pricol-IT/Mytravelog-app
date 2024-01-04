<?php

namespace App\View\Components\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class requestmodel extends Component
{
    /**
     * Create a new component instance.
     */
    public $tripDetails;
    public function __construct($tripDetails)
    {
        $this->tripDetails = $tripDetails;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(){
        return view('components.modal.requestmodel');
    }
}
