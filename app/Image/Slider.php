<?php
namespace App\Image;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Slider
{
    private string $jsonUrl;
    private Renderer $renderer;

    public function __construct(string $jsonUrl, Renderer $renderer)
    {
        $this->jsonUrl = $jsonUrl;
        $this->renderer = $renderer;
    }

    private function fetchImages(): array
    {
        try {
            $client = new Client();
            $response = $client->get($this->jsonUrl, ['timeout' => 5]);
            $data = json_decode($response->getBody(), true);

            if (!is_array($data)) {
                $jsonError = json_last_error_msg();
                error_log("JSON недоступний або некоректний: {$this->jsonUrl}. Помилка JSON: " . $jsonError);
                return [];
            }

            return array_slice($data, 0, 6);

        } catch (RequestException $e) {
            error_log("Помилка HTTP-запиту: " . $e->getMessage());
            return [];
        } catch (\Throwable $e) {
            error_log("Помилка при отриманні JSON: " . $e->getMessage());
            return [];
        }
    }

    public function render(): string
    {
        $images = $this->fetchImages();
        if (empty($images)) {
            return "<p>Немає доступних зображень.</p>";
        }

        $html = '<div id="main-slider" class="slider"><div class="slides">';
        foreach ($images as $img) {
            $html .= $this->renderer->renderImage($img['download_url']);
        }
        $html .= '</div>';

        $html .= '<button class="btn prev">‹</button>';
        $html .= '<button class="btn next">›</button>';

        $html .= '</div>';
        return $html;
    }
}