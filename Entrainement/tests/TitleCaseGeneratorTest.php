<?php

use App\TitleCaseGenerator;
use PHPUnit\Framework\TestCase;

class TitleCaseGeneratorTest extends TestCase
{
    public function testGenerateTitleCaseFromSentence()
    {
        $generator = new TitleCaseGenerator();
        $sentence = "chouette, j'ai faim";
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertIsString($newSentence);
    }

    public function testMakeTitleCaseOneWord()
    {
        $generator = new TitleCaseGenerator();
        $sentence = "chouette";
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertEquals("Chouette", $newSentence);
    }

    public function testMakeTitleCaseMultipleWords()
    {
        $generator = new TitleCaseGenerator();
        $sentence = "chouette, j'ai faim";
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertEquals("Chouette, J'ai Faim", $newSentence);
    }

    public function testMakeTitleCaseLowercasePrep()
    {
        $generator = new TitleCaseGenerator();
        $sentence = "choUette, j'aI faiM";
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertEquals("Chouette, J'ai Faim", $newSentence);
    }

    public function testMakeTitleCaseUpperToLower()
    {
        $generator = new TitleCaseGenerator();
        $sentence = "CHOUETTE, J'AI FAIM";
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertEquals("Chouette, J'ai Faim", $newSentence);
    }

    public function testMakeTitleCaseNonNumeric()
    {
        $generator = new TitleCaseGenerator();
        $sentence = 58;
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertEquals("58", $newSentence);
    }

    public function testMakeTitleCaseMixedCase()
    {
        $generator = new TitleCaseGenerator();
        $sentence = "CHOueTT58E, J'AI FAIM";
        $newSentence = $generator->makeTitleCase($sentence);
        $this->assertEquals("Chouett58e, J'ai Faim", $newSentence);
    }
}
