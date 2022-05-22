<?php

namespace KMA\IikoTransport\Tests;

final class JsonFactory
{
    private string $basePath = __DIR__ . '/Fixtures/';
    private string $json;

    public function __construct(string $name)
    {
        $path = $this->basePath . $name . '.json';
        $this->json = file_get_contents($path);
    }

    public static function load(string $name): JsonFactory
    {
        return new self($name);
    }

    public function get(string $path = null): string
    {
        if (null === $path) {
            return $this->json;
        }

        return $this->extract($path);
    }

    /**
     * @throws \Exception
     */
    private function extract(string $path): string
    {
        $data = json_decode($this->json, true);
        $segments = explode('.', $path);
        $current = $data;
        foreach ($segments as $segment) {
            if (!isset($current[$segment]) && isset($current[0])) {
                $current = $current[0];
            }
            if (!isset($current[$segment])) {
                throw new \Exception('Cant find segment "' . $segment . '"');
            }
            $current = $current[$segment];
            if (isset($current[0])) {
                $current = $current[0];
            }
        }

        return json_encode($current, JSON_UNESCAPED_UNICODE);
    }
}
