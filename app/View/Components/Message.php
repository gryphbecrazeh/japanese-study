<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    public $value;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
        $colors = [
            'success' => 'bg-green-700',
            'fail' => 'bg-red-700',
            'new' => 'bg-blue-700',
            'default' => 'bg-white'
        ];
        $message = json_decode($message);
        $this->type = $colors[$message->type ?? 'default'];
        $this->value = $message->value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.element.message', ['type' => $this->type, 'message' => $this->value]);
    }
}
