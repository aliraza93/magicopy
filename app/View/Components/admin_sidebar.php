<?php

namespace App\View\Components;

use Illuminate\View\Component;

class admin_sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $adscounter;
    public function __construct($user,$adscounter)
    {
      $this->user = $user;
      $this->adscounter = $adscounter;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin_sidebar');
    }
}
