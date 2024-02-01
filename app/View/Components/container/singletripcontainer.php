<?php

namespace App\View\Components\container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class singletripcontainer extends Component
{
    /**
     * Create a new component instance.
     */
    public $tripDetails,$usergrade;
    public function __construct($tripDetails,$usergrade)
    {
        $this->usergrade = $usergrade;
        $this->tripDetails = $tripDetails;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.container.singletripcontainer');
    }
}
