<?php

namespace Hawkiq\Admlte\View\Components\Tools;

use Illuminate\View\Component;

class LangSelector extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admlte::components.tools.language');
    }
}