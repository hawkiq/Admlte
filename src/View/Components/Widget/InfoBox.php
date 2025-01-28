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

class InfoBox extends Component
{

    public $title;

    public $text;

    public $description;

    public $icon;

    public $url;

    public $urlTarget;

    /**
     * The box theme (light, dark, primary, secondary, info, success, warning,
     * danger or any other AdminLTE color like lighblue or teal).
     *
     * @var string
     */
    public $theme;

    /**
     * The icon theme (light, dark, primary, secondary, info, success, warning,
     * danger or any other AdminLTE color like lighblue or teal).
     *
     * @var string
     */
    public $iconTheme;

    /**
     * Enables a progress bar for the box. The value should be an integer
     * indicating the percentage of the progress bar.
     *
     * @var int
     */
    public $progress;

    /**
     * The progress bar theme (light, dark, primary, secondary, info, success,
     * warning, danger or any other AdminLTE color like lighblue or teal).
     *
     * @var string
     */
    public $progressTheme;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title = null,
        $text = null,
        $icon = null,
        $description = null,
        $url = null,
        $urlTarget = 'title',
        $theme = null,
        $iconTheme = null,
        $progress = null,
        $progressTheme = 'white'
    ) {
        $this->title =
            isset($title) ? html_entity_decode($title) : $title;
        $this->text =
            isset($text) ? html_entity_decode($text) : $text;
        $this->icon = $icon;
        $this->description
            = isset($description) ? html_entity_decode($description) : $description;
        $this->url = $url;
        $this->urlTarget = $urlTarget;
        $this->theme = $theme;
        $this->iconTheme = $iconTheme;

        // Setup the progress property, to be between 0 and 100 when defined.

        $this->progress = isset($progress)
            ? max(min($progress, 100), 0)
            : null;

        $this->progressTheme = $progressTheme;
    }

    /**
     * Make the box class.
     *
     * @return string
     */
    public function boxClasses()
    {
        $classes = ['info-box'];

        if (isset($this->theme)) {
            $classes[] = "text-bg-{$this->theme}";
        }

        return implode(' ', $classes);
    }

    /**
     * Make the icon container class.
     *
     * @return string
     */
    public function iconClass()
    {
        $classes = ['info-box-icon'];

        if (isset($this->iconTheme)) {
            $classes[] = "text-bg-{$this->iconTheme}";
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
        return view('admlte::components.widget.info-box');
    }
}