<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class HighlightExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('highlight', [$this, 'highlightText']),
        ];
    }

    public function highlightText($text, $query)
    {
        $highlightedText = preg_replace('/(' . preg_quote($query, '/') . ')/i', '<span class="highlight">$1</span>', $text);
        
        return $highlightedText;
    }
}

