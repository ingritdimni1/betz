<?php

namespace App\Compat;

class Form
{
    protected static function attributes(array $attrs): string
    {
        $out = '';
        foreach ($attrs as $k => $v) {
            if (is_bool($v)) {
                if ($v) {
                    $out .= ' ' . $k;
                }
            } else {
                $out .= ' ' . $k . '="' . e($v) . '"';
            }
        }
        return $out;
    }

    public static function open(array $options = [])
    {
        $method = strtoupper($options['method'] ?? 'POST');
        if (isset($options['route']) && is_string($options['route'])) {
            $action = route($options['route']);
        } elseif (isset($options['url'])) {
            $action = $options['url'];
        } else {
            $action = $options['action'] ?? '#';
        }

        $attrs = $options['attributes'] ?? [];
        $attrStr = self::attributes($attrs);

        $form = '<form method="' . ($method === 'GET' ? 'GET' : 'POST') . '" action="' . e($action) . '"' . $attrStr . '>' . PHP_EOL;
        if ($method !== 'GET' && $method !== 'POST') {
            $form .= method_field($method) . PHP_EOL;
        }
        if ($method !== 'GET') {
            $form .= csrf_field() . PHP_EOL;
        }

        return $form;
    }

    public static function close()
    {
        return '</form>' . PHP_EOL;
    }

    public static function label($name, $value = null, $options = [])
    {
        $value = $value ?? ucwords(str_replace(['_',"-"], ' ', $name));
        $attrStr = self::attributes($options);
        return '<label for="' . e($name) . '"' . $attrStr . '>' . e($value) . '</label>' . PHP_EOL;
    }

    public static function text($name, $value = null, $options = [])
    {
        $attrStr = self::attributes($options);
        return '<input type="text" name="' . e($name) . '" value="' . e($value) . '"' . $attrStr . '>' . PHP_EOL;
    }

    public static function password($name, $options = [])
    {
        $attrStr = self::attributes($options);
        return '<input type="password" name="' . e($name) . '"' . $attrStr . '>' . PHP_EOL;
    }

    public static function hidden($name, $value = null)
    {
        return '<input type="hidden" name="' . e($name) . '" value="' . e($value) . '">' . PHP_EOL;
    }

    public static function textarea($name, $value = null, $options = [])
    {
        $attrStr = self::attributes($options);
        return '<textarea name="' . e($name) . '"' . $attrStr . '>' . e($value) . '</textarea>' . PHP_EOL;
    }

    public static function submit($value = 'Submit', $options = [])
    {
        $attrStr = self::attributes($options);
        return '<button type="submit"' . $attrStr . '>' . e($value) . '</button>' . PHP_EOL;
    }

    public static function token()
    {
        return csrf_field();
    }

    // Basic checkbox/radio helpers
    public static function checkbox($name, $value = 1, $checked = false, $options = [])
    {
        if ($checked) {
            $options['checked'] = true;
        }
        $attrStr = self::attributes($options);
        return '<input type="checkbox" name="' . e($name) . '" value="' . e($value) . '"' . $attrStr . '>' . PHP_EOL;
    }

    public static function radio($name, $value = null, $checked = false, $options = [])
    {
        if ($checked) {
            $options['checked'] = true;
        }
        $attrStr = self::attributes($options);
        return '<input type="radio" name="' . e($name) . '" value="' . e($value) . '"' . $attrStr . '>' . PHP_EOL;
    }

    // Very small select helper
    public static function select($name, $list = [], $selected = null, $options = [])
    {
        $attrStr = self::attributes($options);
        $html = '<select name="' . e($name) . '"' . $attrStr . '>' . PHP_EOL;
        foreach ($list as $value => $label) {
            $sel = ((string)$value === (string)$selected) ? ' selected' : '';
            $html .= '<option value="' . e($value) . '"' . $sel . '>' . e($label) . '</option>' . PHP_EOL;
        }
        $html .= '</select>' . PHP_EOL;
        return $html;
    }
}
