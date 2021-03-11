<?php

namespace App\View\Components;

use Illuminate\View\Component;

class content extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $contents;
    // public $adscounter;
    // public $user;
    public function __construct($contents)
    {
       $this->contents = $contents;
       // $this->adscounter = $adscounter;
       // $this->user = $user;
    }
   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.content');
    }
}
