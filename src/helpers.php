<?php

namespace Elphis\Helpers\Str;

/**
 * check if two strings are equal.
 *
 * @param string $string1
 * @param string $string2
 * @param boolean $caseInsensitive
 * @return boolean
 */
function str_equals(string $string1, string $string2,  bool $caseInsensitive = false)
{
    return ($caseInsensitive ? strcasecmp($string1, $string2) : strcmp($string1, $string2)) === 0;
}

/**
 * check if the given $haystack string contains the $needle string
 *
 * @param string $haystack
 * @param string $needle
 * @param boolean $caseInsensitive
 * @return boolean
 */
function str_contains(string $haystack, string $needle, bool $caseInsensitive = false)
{
    return ($caseInsensitive ? stripos($haystack, $needle) : strpos($haystack, $needle)) !== false;
}

/**
 * check if given $haystack string starts with $needle string
 *
 * @param string $haystack
 * @param string $needle
 * @param boolean $caseInsensitive
 * @return boolean
 */
function str_starts_with(string $haystack, string $needle, bool $caseInsensitive = false)
{
    return ($caseInsensitive ? stripos($haystack, $needle) : strpos($haystack, $needle)) === 0;
}

/**
 * check if given $haystack string ends with $needle string
 *
 * @param string $haystack
 * @param string $needle
 * @param boolean $caseInsensitive
 * @return boolean
 */
function str_ends_with(string $haystack, string $needle, bool $caseInsensitive = false)
{
    $length    = strlen($needle);
    $subString = substr($haystack, strlen($haystack) - $length);

    return str_contains($subString, $needle, $caseInsensitive);
}

/**
 * limit the $string by $limit length and suffix it with the given $suffix
 *
 * @param string $string
 * @param integer $length
 * @param string $suffix
 * @return string
 */
function str_limit(string $string, int $length, string $suffix = '...')
{
    return substr($string, 0, $length) . $suffix;
}

/**
 * get the string after $needle from the $haystack
 *
 * @param [type] $haystack
 * @param [type] $needle
 * @param boolean $caseInsensitive
 * @return string
 */
function str_after(string $haystack, string $needle, bool $caseInsensitive = false)
{
    $position = strpos($haystack, $needle);

    if ($caseInsensitive) {
        $position = stripos($haystack, $needle);
    }

    if ($position === false) {
        return '';
    }

    $position += strlen($needle);

    return substr($haystack, $position);
}

/**
 * get the string before $needle from the $haystack
 *
 * @param string $haystack
 * @param string $needle
 * @param boolean $caseInsensitive
 * @return string
 */
function str_before(string $haystack, string $needle, bool $caseInsensitive = false)
{
    $position = strpos($haystack, $needle);

    if ($caseInsensitive) {
        $position = stripos($haystack, $needle);
    }

    return substr($haystack, 0, $position);
}

/**
 * get the string between $from and $to in the given $haystack string
 *
 * @param string $haystack
 * @param string $from
 * @param string $to
 * @param boolean $caseInsensitive
 * @return void
 */
function str_between(string $haystack, string $from, string $to, bool $caseInsensitive = false)
{
    $string = str_after($haystack, $from, $caseInsensitive);

    return str_before($string, $to, $caseInsensitive);
}

/**
 * strip the given string of the special chars and replace it with $replaceWith
 *
 * @param string $string
 * @param string $replaceWith
 * @return string
 */
function str_strip_special_chars(string $string, string $replaceWith = '')
{
    return preg_replace('/[^a-zA-Z0-9]/', $replaceWith, $string);
}

/**
 * convert the given string to camel case string and strip special chars from it.
 *
 * @param string $string
 * @return string
 */
function str_camel_case(string $string)
{
    $string = str_studly_case($string);
    return lcfirst($string);
}

function str_studly_case(string $string)
{
    $string = str_strip_special_chars($string, ' ');
    $string = strtolower($string);
    $string = ucwords($string);

    return str_replace(' ', '', $string);
}

/**
 * convert the given string to kebab case string and strip special chars from it.
 *
 * @param string $string
 * @return string
 */
function str_kebab_case(string $string)
{
    $string = str_strip_special_chars($string, ' ');
    $string = preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $string);
    $string = preg_replace('/(\s)+/', '-', $string);
    return strtolower($string);
}

/**
 * convert the given string to snake case string and strip special chars from it.
 *
 * @param string $string
 * @return string
 */
function str_snake_case(string $string)
{
    $string = str_kebab_case($string);
    return str_replace('-', '_', $string);
}

/**
 * strip the given string of the special chars and replace it with $replaceWith
 *
 * @param string $string
 * @return string
 */
function str_strip_numbers(string $string, string $replaceWith = '')
{
    return preg_replace('/[0-9]/', $replaceWith, $string);
}

/**
 * create an array of string by breaking the given $string at $length
 *
 * @param string $string
 * @param integer $length
 * @return array
 */
function str_chunk(string $string, int $length = 100)
{
    $results = [];
    $chunk = (strlen($string) / $length);
    $chunk = ceil($chunk);
    $start = 0;
    for ($i = 0; $i < $chunk; $i++) { 
        $results[] = substr($string, $start, $length);
        $start    += $length;
    }

    return $results;
}