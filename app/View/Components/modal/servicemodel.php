<?php

namespace App\View\Components\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class servicemodel extends Component
{
    /**
     * Create a new component instance.
     */

     public $tier,$allowance;
    public function __construct($tier,$allowance)
    {
        $this->tier = $tier;
        $this->allowance = $allowance;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.servicemodel');
    }
}
