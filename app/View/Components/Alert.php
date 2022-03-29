<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $category, $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $category, string $message)
    {
        $this->category = $category;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
