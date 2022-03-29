<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public string $title;
    public string $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): \Illuminate\Contracts\View\View|string|\Closure
    {
        return view('components.header');
    }
}
