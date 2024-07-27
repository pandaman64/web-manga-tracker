<?php

namespace App\View\Components;

use App\Models\Chapter;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChapterCard extends Component
{
    public readonly Chapter $chapter;

    /**
     * Create a new component instance.
     */
    public function __construct(Chapter $chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chapter-card');
    }
}
