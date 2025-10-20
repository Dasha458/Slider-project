<?php
namespace App\Image;

class Renderer
{
    public function renderImage(string $url): string
    {
        return '<img src="' . htmlspecialchars($url) . '" class="slide" alt="Image">';
    }
}