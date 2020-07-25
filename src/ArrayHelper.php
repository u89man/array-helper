<?php

namespace U89Man\Helpers;

class ArrayHelper
{
    /**
     * @param array &$array
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public static function set(array &$array, $key, $value)
    {
        $parts = explode('.', $key);

        while (count($parts) > 1) {
            $key = array_shift($parts);

            if (! isset($array[$key]) || ! is_array($array[$key])) {
                $array[$key] = array();
            }

            $array = &$array[$key];
        }

        $array[array_shift($parts)] = $value;
    }

    /**
     * @param array $array
     * @param string $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    public static function get(array $array, $key, $default = null)
    {
        if ($array === []) {
            return $default;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return isset($array[$key]) ? $array[$key] : $default;
        }

        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && isset($array[$segment])) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }

    /**
     * @param array $array
     * @param string $key
     *
     * @return bool
     */
    public static function has(array $array, $key)
    {
        if ($array === []) {
            return false;
        }

        if (is_null($key)) {
            return false;
        }

        if (isset($array[$key])) {
            return true;
        }

        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && isset($array[$segment])) {
                $array = $array[$segment];
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array &$array
     * @param string|array $keys
     *
     * @return void
     */
    public static function remove(array &$array, $keys)
    {
        $original = &$array;

        $keys = self::wrap($keys);

        if (count($keys) === 0) {
            return;
        }

        foreach ($keys as $key) {
            if (isset($array[$key])) {
                unset($array[$key]);
                continue;
            }

            $array = &$original;
            $parts = explode('.', $key);

            while (count($parts) > 1) {
                $part = array_shift($parts);

                if (isset($array[$part]) && is_array($array[$part])) {
                    $array = &$array[$part];
                } else {
                    continue 2;
                }
            }

            unset($array[array_shift($parts)]);
        }
    }

    /**
     * @param mixed $value
     *
     * @return array
     */
    public static function wrap($value = null)
    {
        if (is_null($value)) {
            return array();
        }

        return is_array($value) ? $value : array($value);
    }
}

