<?php

namespace App;

class Truncater
{
    public static $defaultOptions = [
        'length' => 50,
        'sep' => '...',
    ];

    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = array_merge(self::$defaultOptions, $config);
    }

    public function truncate(string $text, array $options = []): string
    {
        $config = array_merge($this->config, $options);
        $length = $config['length'];
        $sep = $config['sep'];

        
        if ($length < 0) {
            return $sep;
        }

        
        if (mb_strlen($text, 'UTF-8') <= $length) {
            return $text;
        }

        $sepLength = mb_strlen($sep, 'UTF-8');
        $substringLength = $length - $sepLength;

        $truncated = mb_substr($text, 0, $substringLength, 'UTF-8');

        return $truncated . $sep;
    }
}
