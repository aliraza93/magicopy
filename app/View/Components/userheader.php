<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userheader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $isLoggedIn;
    public $user;
    public function __construct($isLoggedIn,$user)
    {
        $this->isLoggedIn = $isLoggedIn;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.userheader');
    }
}
