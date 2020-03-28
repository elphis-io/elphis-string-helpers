# Elphis String Helpers

This library contains some basic php helpers that will make manipulating strings easier and better.
Every function in this library is namespaced Elphis\Helpers\Str to avoid conflicts with any other library you might be using.

### Below is the list of string helpers this package provides.

* **str_contains($haystack, $needle, $caseInsensitive = false):**
checks if the $needle string is present in $haystack string and returns true or false accordingly. When $casInsensitive is true the check will be as the name says, case insensitive. 

* **str_equals($string1, $string2, $caseInsensitive = false):**
checks if the given string are equal. When $caseInsensitive is true the check will be case insensitive.

* **str_starts_with($haystack, $needle, $caseInsensitive = false):**
checks if the given $haystack string starts with the given $needle. $caseInsensitive = true for case insensitive check.

* **str_ends_with($haystack, $needle, $caseInsensitive = false):**
checks if the given $haystack string ends with the given $needle. $caseInsensitive = true for case insensitive check.

* **str_limit($string, $length, $suffix = '...'):**
this function limits/splice the $string at the given $length and suffixes it with the given $suffix.


* **str_after($haystack, $needle, bool $caseInsensitive = false):**
returns the string after $needle from $haystack. When $caseSensitive = true, $needle will be searched case insensitively.

* **str_before($haystack, $needle, bool $caseInsensitive = false):**
returns the string before $needle from $haystack. When $caseSensitive = true, $needle will be searched case insensitively.

* **str_between(string $haystack, string $from, string $to, bool $caseInsensitive = false):**
returns the string found between the given $from sub-string and $to sub-string from the given $haystack. When $caseInsensitive = true, $from and $to will be searched case insensitively.

* **str_strip_special_chars(string $string, string $replaceWith = ''):**
strips the given $string of any special characters and returns a string containing only alphabets, or numbers. Passing $replaceWith will replace the special chars in the string with $replaceWith.

* **str_camel_case($string):**
strips the given string of any special character, and turns it into "CamelCase".

* **str_studly_case($string):**
strips the given string of any special character, and turns it into "studlyCase".

* **str_kebab_case($string):**
strips the given string of any special character, and turns it into "kebab-case".

* **str_snake_case($string):**
strips the given string of any special character, and turns it into "snake_case".

* **str_strip_numbers($string):**
removes any numeric values found in $string.

* **str_chunks($string):**
breaks the given $string at every $length, and returns an array of string each containing string of $length.