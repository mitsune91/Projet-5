<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return array(
            new TwigFunction('area', array($this, 'calculateArea')),
        );
    }

    public function calculateArea(int $width, int $length)
    {
        return $width * $length;
    }
}