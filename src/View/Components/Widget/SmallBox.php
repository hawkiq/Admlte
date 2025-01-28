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

class SmallBox extends Component
{
    /**
     * The title/header for the box.
     *
     * @var string
     */
    public $title;

    /**
     * The text/description for the box.
     *
     * @var string
     */
    public $text;

    /**
     * A Font Awesome icon for the box.
     *
     * @var string
     */
    public $icon;

    /**
     * The box theme (light, dark, primary, secondary, info, success, warning,
     * danger or any other AdminLTE color like lighblue or teal).
     *
     * @var string
     */
    public $theme;

    /**
     * An url for the box. When enabled, a link-styled footer section will be
     * visible pointing to that url.
     *
     * @var string
     */
    public $url;

    /**
     * A text/label associated with the footer url.
     *
     * @var string
     */
    public $urlText;

    /**
     * A text/label for Footer Icon.
     *
     * @var string
     */
    public $urlIcon;

    /**
     * Indicates if the box is loading. When enabled, an overlay with a loading
     * icon will show over the box.
     *
     * @var mixed
     */
    public $loading;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title = null,
        $text = null,
        $icon = null,
        $theme = null,
        $url = null,
        $urlText = null,
        $urlIcon = null,
        $loading = null
    ) {
        $this->title =
            isset($title) ? html_entity_decode($title) : $title;
        $this->text =
            isset($text) ? html_entity_decode($text) : $text;
        $this->icon = $icon;
        $this->theme = $theme;
        $this->url = $url;
        $this->urlText =
            isset($urlText) ? html_entity_decode($urlText) : $urlText;
        $this->urlIcon = $urlIcon;
        $this->loading = $loading;
    }

    /**
     * Make the box class.
     *
     * @return string
     */
    public function boxClass()
    {
        $classes = ['small-box'];

        if (isset($this->theme)) {
            $classes[] = "text-bg-{$this->theme}";
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
        return view('admlte::components.widget.small-box');
    }
}