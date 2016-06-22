<?php

require_once "../src/InvoiceNumbersParser.php";
class FilesTest extends \PHPUnit_Framework_TestCase
{
    public function testUserStory1()
    {
        $inputFile = "input_user_story_1.txt";
        $generatedOutputFile = "out1.txt";
        $expectedOutputFile = "output_user_story_1.txt";
        $parser = new InvoiceNumbersParser();
        $parser->parseFile($inputFile,$generatedOutputFile);
        $generatedContents = file_get_contents($generatedOutputFile);
        $expectedContents = file_get_contents($expectedOutputFile);
        $this->assertEquals($generatedContents, $expectedContents);
    }

    public function testUserStory2()
    {
        $inputFile = "input_user_story_2.txt";
        $generatedOutputFile = "out2.txt";
        $expectedOutputFile = "output_user_story_2.txt";
        $parser = new InvoiceNumbersParser();
        $parser->parseFile($inputFile,$generatedOutputFile);
        $generatedContents = file_get_contents($generatedOutputFile);
        $expectedContents = file_get_contents($expectedOutputFile);
        $this->assertEquals($generatedContents, $expectedContents);
    }
}
