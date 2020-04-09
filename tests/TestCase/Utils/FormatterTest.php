<?php
namespace App\Test\TestCase\Utils;

use App\Utils\Formatter;
use Cake\TestSuite\TestCase;

/**
 * @property Formatter Formatter
 */
class FormatterTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->Formatter = new Formatter();
    }

    public function tearDown(): void
    {
        unset($this->Formatter);
        parent::tearDown();
    }

    public function testFormatStatPercentage(): void
    {
        $expected = '50%';
        $result = $this->Formatter->formatStatPercentage(1, 1);
        $this->assertSame($expected, $result);
    }

    public function testFormatStatPercentageShouldReturnPlayMoreGames(): void
    {
        $expected = 'Play more games!';
        $result = $this->Formatter->formatStatPercentage(0, 1);
        $this->assertSame($expected, $result);
    }

    /**
     * @dataProvider formatStatPercentageViaProvider
     * @param $won
     * @param $lost
     * @param $expected
     */
    public function testFormatStatPercentageViaProvider($won, $lost, $expected): void
    {
        $result = $this->Formatter->formatStatPercentage($won, $lost);
        $this->assertSame($expected, $result);
    }

    /**
     * Data provider for common cases
     *
     * @return array
     */
    public function formatStatPercentageViaProvider(): array
    {
        return [
            [0, 0, 'Play more games!'],
            [0, 1, 'Play more games!'],
            [0, 2, 'Play more games!'],
            [1, 0, '100%'],
            [2, 0, '100%'],
        ];
    }
}
