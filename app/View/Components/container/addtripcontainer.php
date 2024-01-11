<?php

namespace App\View\Components\container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addtripcontainer extends Component
{
    /**
     * Create a new component instance.
     */
    public $tripDetails;
    public $routeName;
    public $homeRouteName;
    public function __construct($tripDetails)
    {
        $this->tripDetails = $tripDetails;
        $this->routeName = $this->getRouteName();
        $this->homeRouteName = $this->getHomeRouteName();
    }

    private function getRouteName()
    {
        // Assuming you have a 'role' attribute on your user model
        if (auth()->check() && auth()->user()->role == 'approver') {
            return 'approver.storetrip';
        } else {
            return 'storetrip';
        }
    }

    private function getHomeRouteName()
    {
        // Assuming you have a 'role' attribute on your user model
        if (auth()->check() && auth()->user()->role == 'approver') {
            return 'approver.home';
        } else {
            return 'user.home';
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.container.addtripcontainer');
    }
}
