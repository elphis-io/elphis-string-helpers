# Elphis String Helpers

This library contains some basic php helpers that will make manipulating strings easier and better.
Every function in this library is namespaced Elphis\Helpers\Str to avoid conflicts with any other library you might be using.

### Installation
```
composer require elphis/string-helpers:dev-master
```

### Below is the list of string helpers this package provides.

* **str_contains($haystack, $needle, $caseInsensitive = false):**
checks if the **$needle** string is present in **$haystack** string and returns *true* or *false* accordingly. When **$casInsensitive** is *true* the check will be as the name says, case insensitive. 
```
    Eg: 
    $fullName   = 'John Joseph Doe';
    $fatherName = 'Joseph';
    str_contains($fullName, $fatherName); // *true*
    $fatherName = 'joseph';
    str_contains($fullName, $fatherName); // *false*
    str_contains($fullName, $fatherName, true); // *true*
```

* **str_equals($string1, $string2, $caseInsensitive = false):**
checks if the given string are equal. When **$caseInsensitive** is true the check will be case insensitive.
```
    Eg: 
    $string1 = 'In the bleak mid-winter';
    $string2 = 'In the bleak mid-winter';
    str_equals($string1, $string2); // *true*
    $string2 = 'In the bleak MID-WINTER';
    str_equals($string1, $string2); // *false*
    str_equals($string1, $string2, true); // *true*
```

* **str_starts_with($haystack, $needle, $caseInsensitive = false):**
checks if the given **$haystack** string starts with the given **$needle**. **$caseInsensitive** = *true* for case insensitive check.
```
    Eg:
    $fullName  = 'John Joseph Doe';
    $firstName = 'John';
    str_starts_with($fullName, $firstName); // *true*
    $firstName = 'john';
    str_starts_with($fullName, $firstName); // *false*
    str_starts_with($fullName, $firstName, true); // *true*
    $firstName = 'joseph';
    str_starts_with($fullName, $firstName); // *false*
    str_starts_with($fullName, $firstName, true); // *false*
```

* **str_ends_with($haystack, $needle, $caseInsensitive = false):**
checks if the given **$haystack** string ends with the given **$needle**. **$caseInsensitive** = *true* for case insensitive check.
```
    Eg:
    $fullName = 'John Joseph Doe';
    $lastName = 'Doe';
    str_ends_with($fullName, $lastName); // *true*
    $lastName = 'doe';
    str_ends_with($fullName, $lastName); // *false*
    str_ends_with($fullName, $lastName, true); // *true*
    $lastName = 'joseph';
    str_ends_with($fullName, $lastName); // *false*
    str_ends_with($fullName, $lastName, true); // *false*
```

* **str_limit($string, $length, $suffix = '...'):**
this function limits/splice the **$string** at the given **$length** and suffixes it with the given **$suffix**.
```
    Eg:
    $title = 'This is a very long string that cannot be displayed in the list section of your blog, so you have to limit it.';
    str_limit($title, 20); // *This is a very long ...*
    str_limit($title, 20, '---'); // *This is a very long ---*
```

* **str_after($haystack, $needle, bool $caseInsensitive = false):**
returns the string after **$needle** from **$haystack**. When **$caseSensitive** = *true*, **$needle** will be searched case insensitively.
```
    Eg:
    $title = 'This is a very long string that cannot be displayed in the list section of your blog, so you have to break it.';
    str_after($title, 'This is a very long string that cannot be displayed'); // *in the list section of your blog, so you have to break it.*
    str_after($title, 'Yolo'); // *''*
    str_after($title, 'this'); // *''*
    str_after($title, 'this', true); // *is a very long string that cannot be displayed in the list section of your blog, so you have to break it.*
```

* **str_before($haystack, $needle, bool $caseInsensitive = false):**
returns the string before **$needle** from **$haystack**. When **$caseSensitive** = *true*, **$needle** will be searched case insensitively.
```
    Eg:
    $title = 'This is a very long string that cannot be displayed in the list section of your blog, so you have to break it.';
    str_before($title, 'a very long'); // *This is *
    str_before($title, 'Yolo'); // *''*
    str_before($title, 'this'); // *''*
    str_before($title, 'this', true); // *''*
    str_before($title, 'is a very', true); // *This *
```

* **str_between(string $haystack, string $from, string $to, bool $caseInsensitive = false):**
returns the string found between the given **$from** sub-string and **$to** sub-string from the given **$haystack**. When **$caseInsensitive** = *true*, **$from** and **$to** will be searched case insensitively.
```
    Eg:
    $title = 'This is a very long string that cannot be displayed in the list section of your blog, so you have to break it.';
    str_between($title, 'This', 'long'); // * is a very *
    str_between($title, 'is', 'This'); // *''*
    str_between($title, 'is', 'This', true); // *''*
    str_between($title, 'this', 'is', true); // *' is a very '*
    str_between($title, 'sO YoU hAve', 'it', true); // *' to break '*
```

* **str_strip_special_chars(string $string, string $replaceWith = ''):**
strips the given **$string** of any special characters and returns a string containing only alphabets, or numbers. Passing **$replaceWith** will replace the special chars in the string with **$replaceWith**.
```
    Eg:
    $title = '^&%This*&(*is)(^%^#@_=0it.';
    str_strip_special_chars($title); // *Thisis0it*
    str_strip_special_chars($title, '-'); // *---This----is---------0it-*
```

* **str_camel_case($string):**
strips the given **$string** of any special character and spaces, and turns **$string** into "CamelCase".
```
    Eg:
    $title = 'This is a normal string';
    str_camel_case($title); // *thisIsANormalString*
    $title = 'This is$a#normal%string';
    str_camel_case($title); // *thisIsANormalString*
```

* **str_studly_case($string):**
strips the given **$string** of any special character and spaces, and turns it into "studlyCase".
```
    Eg:
    $title = 'This is a normal string';
    str_studly_case($title); // *ThisIsANormalString*
    $title = 'This is$a#normal%string';
    str_studly_case($title); // *ThisIsANormalString*
```

* **str_kebab_case($string):**
strips the given **$string** of any special character and spaces, and turns it into "kebab-case".
```
    Eg:
    $title = 'This is a normal string';
    str_kebab_case($title); // *this-is-a-normal-string*
    $title = 'This is$a#normal%string';
    str_kebab_case($title); // *this-is-a-normal-string*
```

* **str_snake_case($string):**
strips the given **$string** of any special character and spaces, and turns it into "snake_case".
strips the given **$string** of any special character and spaces, and turns it into "kebab-case".
```
    Eg:
    $title = 'This is a normal string';
    str_snake_case($title); // *this_is_a_normal_string*
    $title = 'This is$a#normal%string';
    str_snake_case($title); // *this_is_a_normal_string*
```

* **str_strip_numbers($string):**
removes any numeric values found in **$string**.
strips the given **$string** of any special character and spaces, and turns it into "kebab-case".
```
    Eg:
    $title = 'great here is my contact no: 12346732';
    str_strip_numbers($title); // *great here is my contact no:*
```

* **str_chunks($string, $length = 100):**
breaks the given **$string** at every **$length**, and returns an array of string each containing string of **$length**.
```
    Eg:
    $title = 'hope ya'll like this small helper library';
    str_chunk($title, 10); // *['hope ya'll', ' like this', ' small hel', 'per librar', 'y']:*
```
