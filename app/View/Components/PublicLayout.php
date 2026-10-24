<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PublicLayout extends Component
{
    /**
     * @param  string|null  $title  Page title, suffixed with the site name in the <title> tag.
     * @param  string|null  $description  Page-specific meta description.
     */
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.public');
    }
}
