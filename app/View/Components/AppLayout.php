<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public function __construct(
        public string|null $headerPreAction = null,
        public string|null $headerPreActionLink = null,
        public string|null $headerPostAction = null,
        public string|null $headerPostActionLink = null,
        public string|null $header = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
