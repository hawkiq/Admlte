<?php
/*
    |--------------------------------------------------------------------------
    | Disclaimer
    |--------------------------------------------------------------------------
    |
    | I reused jeroennoten/Laravel-AdminLTE components for easy and fast Inegration,
    | with few modifications to make it works on new version of AdminLTE v4.
    | I really thanks for anyone did this great Job and brought to us Laravel-AdminLTE.
    | https://github.com/jeroennoten/Laravel-AdminLTE/blob/master/src/View/Components/ for original codes.
    |
    |
*/

namespace Hawkiq\Admlte\View\Components\Widget;

use Illuminate\View\Component;

class Alert extends Component
{
    protected $icons = [
        'dark' => 'fas fa-bolt',
        'light' => 'far fa-lightbulb',
        'primary' => 'fas fa-bell',
        'secondary' => 'fas fa-tag',
        'info' => 'fas fa-info-circle',
        'success' => 'fas fa-check-circle',
        'warning' => 'fas fa-exclamation-triangle',
        'danger' => 'fas fa-ban',
    ];

    public $icon;

    // theme (dark, light, primary, secondary, info, success, warning or danger).
    public $theme;

    public $title;

    public $dismissable;

    public function __construct(
        $theme = null,
        $icon = null,
        $title = null,
        $dismissable = null
    ) {
        $this->theme = $theme;
        $this->icon = $icon;
        $this->title =
            isset($title) ? html_entity_decode($title) : $title;
        $this->dismissable = $dismissable;

        if (! isset($icon) && ! empty($theme)) {
            $this->icon = $this->icons[$theme];
        }
    }

    public function alertClasses()
    {
        $classes = ['alert'];

        if (! empty($this->theme)) {
            $classes[] = "alert-{$this->theme}";
        } else {
            $classes[] = 'border';
        }

        if (! empty($this->dismissable)) {
            $classes[] = 'alert-dismissable fade show';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admlte::components.widget.alert');
    }
}