<?php

namespace App\Compat;

class Html
{
    protected static function attributes(array $attrs): string
    {
        $out = '';
        foreach ($attrs as $k => $v) {
            if (is_bool($v)) {
                if ($v) $out .= ' ' . $k;
            } else {
                $out .= ' ' . $k . '="' . e($v) . '"';
            }
        }
        return $out;
    }

    public static function script($path, $attributes = [])
    {
        $src = $path;
        // Allow both asset paths and full URLs
        if (!preg_match('~^(https?:)?//~', $path)) {
            $src = asset($path);
        }
        return '<script src="' . e($src) . '"' . self::attributes((array)$attributes) . '></script>' . PHP_EOL;
    }

    public static function style($path, $attributes = [])
    {
        $href = $path;
        if (!preg_match('~^(https?:)?//~', $path)) {
            $href = asset($path);
        }
        return '<link rel="stylesheet" href="' . e($href) . '"' . self::attributes((array)$attributes) . '>' . PHP_EOL;
    }

    public static function link($url, $title = null, $attributes = [])
    {
        $title = $title ?? $url;
        return '<a href="' . e($url) . '"' . self::attributes((array)$attributes) . '>' . e($title) . '</a>' . PHP_EOL;
    }
}
