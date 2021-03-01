<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    public $label;
    public $href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $href='#')
    {
        //
        $this->$label = $label;
        $this->$href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.nav.nav-item', ['label'=>$this->label, 'href'=>$this->href]);
    }
}
