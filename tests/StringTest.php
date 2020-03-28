<?php

use PHPUnit\Framework\TestCase;
use function Elphis\Helpers\Str\str_after;
use function Elphis\Helpers\Str\str_chunk;
use function Elphis\Helpers\Str\str_before;
use function Elphis\Helpers\Str\str_equals;
use function Elphis\Helpers\Str\str_between;
use function Elphis\Helpers\Str\str_contains;
use function Elphis\Helpers\Str\str_ends_with;
use function Elphis\Helpers\Str\str_camel_case;
use function Elphis\Helpers\Str\str_kebab_case;
use function Elphis\Helpers\Str\str_snake_case;
use function Elphis\Helpers\Str\str_starts_with;
use function Elphis\Helpers\Str\str_studly_case;
use function Elphis\Helpers\Str\str_strip_numbers;
use function Elphis\Helpers\Str\str_strip_special_chars;

class StringTest extends TestCase
{
    protected $string = 'Amidst this corona pandemic I am creating an open source project';

    public function testStrEquals()
    {
        $string = 'amidst this corona pandemic i am creating an open source PROJECT';
        $this->assertTrue(str_equals($this->string, $this->string));
        $this->assertTrue(str_equals($this->string, $string, true));
    }

    public function testStrContains()
    {
        $this->assertTrue(str_contains($this->string, 'amidst', true));
        $this->assertFalse(str_contains($this->string, 'amidst'));
        $this->assertTrue(str_contains($this->string, 'Amidst'));
        $this->assertFalse(str_contains($this->string, 'misho', true));
        $this->assertFalse(str_contains($this->string, 'misho'));
    }

    public function testStrStartsWith()
    {
        $this->assertTrue(str_starts_with($this->string, 'Amidst'));
        $this->assertTrue(str_starts_with($this->string, 'amidst', true));
        $this->assertFalse(str_starts_with($this->string, 'project', true));
        $this->assertFalse(str_starts_with($this->string, 'project'));
    }

    public function testStrEndsWith()
    {
        $this->assertTrue(str_ends_with($this->string, 'project'));
        $this->assertTrue(str_ends_with($this->string, 'PROJECT', true));
        $this->assertFalse(str_ends_with($this->string, 'this', true));
        $this->assertFalse(str_ends_with($this->string, 'This'));
    }

    public function testStrAfter()
    {
        $after = str_after($this->string, 'Corona p', true);
        $expected = 'andemic I am creating an open source project';
        $this->assertEquals($after, $expected);
    }

    public function testStrBefore()
    {
        $before = str_before($this->string, 'thIs', true);
        $expected = 'Amidst ';
        $this->assertEquals($before, $expected);
    }

    public function testStrBetween()
    {
        $after    = str_between($this->string, 'Amidst', 'project', true);
        $expected = ' this corona pandemic I am creating an open source ';
        $this->assertEquals($after, $expected);
    }

    public function testCamelCase()
    {
        $string1 = 'function-name+new_name.another%name #with$special(chars+CAPital+1+2)2(2)';
        $result  = str_camel_case($string1);
        $this->assertEquals($result, 'functionNameNewNameAnotherNameWithSpecialCharsCapital1222');
    }

    public function testStudlyCase()
    {
        $string1 = 'function-name+new_name.another%name#with$special(chars+CAPital+1+2)2(2)';
        $result  = str_studly_case($string1);
        $this->assertEquals($result, 'FunctionNameNewNameAnotherNameWithSpecialCharsCapital1222');
    }

    public function testKebabCase()
    {
        $string1 = 'function-name+new_name.another%name#with$special(chars+CAPital1-2_3*5saudJQureshi';
        $result  = str_kebab_case($string1);
        $this->assertEquals($result, 'function-name-new-name-another-name-with-special-chars-capital1-2-3-5saud-jqureshi');
    }

    public function testSnakeCase()
    {
        $string1 = 'function-name+new_name.another%name#with$special(chars+CAPital1-2_3*5saudJQureshi';
        $result  = str_snake_case($string1);
        $this->assertEquals($result, 'function_name_new_name_another_name_with_special_chars_capital1_2_3_5saud_jqureshi');
    }

    public function testStripNumbers()
    {
        $string1 = 'Th!s 1 !s 4 people the wh0 type l!ke di$.';
        $result  = str_strip_numbers($string1);
        $this->assertEquals($result, 'Th!s  !s  people the wh type l!ke di$.');
    }

    public function testStripSpecialChars()
    {
        $string = 'T#!$ 0n£ !$ f0r p£oPl£ w#0 typ£ l!k£ this.';
        $string = str_strip_special_chars($string);

        $this->assertEquals($string, 'T0nf0rpoPlw0typlkthis');
    }

    public function testStringChunk()
    {
        $chunks = str_chunk($this->string, 32);
        $length = ceil(strlen($this->string)/32);
        $this->assertCount($length, $chunks);
    }
}