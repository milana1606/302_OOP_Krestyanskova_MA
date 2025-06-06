<?php

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    // Вместо "Иванов Иван Иванович" можно подставить ваше ФИО
    private string $fullName = "Иванов Иван Иванович";

    public function testEmptyString(): void
    {
        $truncater = new Truncater();
        $this->assertEquals('', $truncater->truncate(''));
    }

    public function testStringWithoutTruncation(): void
    {
        $truncater = new Truncater();
        // Если длина строки меньше дефолтного значения (50)
        $this->assertEquals($this->fullName, $truncater->truncate($this->fullName));
    }

    public function testTruncateToLength10(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['length' => 10]);
        $expected = mb_substr($this->fullName, 0, 10 - mb_strlen('...', 'UTF-8'), 'UTF-8') . '...';
        $this->assertEquals($expected, $result);
    }

    public function testTruncateToLength50(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['length' => 50]);
        $this->assertEquals($this->fullName, $result);
    }

    public function testTruncateWithNegativeLength(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['length' => -10]);
        $this->assertEquals('...', $result);
    }

    public function testTruncateWithCustomSeparator(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['length' => 10, 'sep' => '*']);
        $expected = mb_substr($this->fullName, 0, 10 - mb_strlen('*', 'UTF-8'), 'UTF-8') . '*';
        $this->assertEquals($expected, $result);
    }

    public function testTruncateWithCustomSeparatorOnly(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['sep' => '*']);
        $this->assertEquals($this->fullName, $result);
    }

    public function testDefaultConfigurationOverride(): void
    {
        $truncater = new Truncater(['length' => 10, 'sep' => '**']);
        $result = $truncater->truncate($this->fullName);
        $expected = mb_substr($this->fullName, 0, 10 - mb_strlen('**', 'UTF-8'), 'UTF-8') . '**';
        $this->assertEquals($expected, $result);
    }

    public function testOptionsOverrideNotChangingDefault(): void
    {
        $truncater = new Truncater();
        $result1 = $truncater->truncate($this->fullName, ['length' => 10, 'sep' => '*']);
        $result2 = $truncater->truncate($this->fullName);
        $this->assertNotEquals($result1, $result2);
    }
}
