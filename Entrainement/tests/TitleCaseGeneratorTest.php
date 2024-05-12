<?php

use App\TitleCaseGenerator;
use PHPUnit\Framework\TestCase;

class TitleCaseGeneratorTest extends TestCase
{

    public function testGenerateTitleCaseFromSentence()
    {
        //Prepare
        $title_generator = new TitleCaseGenerator;
        //Act
        $title = $title_generator->makeTitleCase('simplon');
        //Assert
        $this->assertEquals('Simplon', $title);
    }

    function test_makeTitleCase_oneWord()
    {
        //Prepare
        $title_generator = new TitleCaseGenerator;
        //Act
        $title = $title_generator->makeTitleCase('simplon');
        //Assert            
        $this->assertEquals('Simplon', $title);
    }

    function test_makeTitleCase_multipleWords()
    {
        //Prepare
        $title_generator = new TitleCaseGenerator;
        //Act
        $title = $title_generator->makeTitleCase('sim plon');
        //Assert           
        $this->assertEquals('Sim Plon', $title);
    }

    function test_makeTitleCase_lowercasePrep()
    {
        //Prepare     
        $title_generator = new TitleCaseGenerator;       
        //Act
        $title = $title_generator->makeTitleCase('sim and plon');
        //Assert           
        $this->assertEquals('Sim and Plon', $title);
    }

    function test_makeTitleCase_upperToLower()
    {
        //Prepare            
        $title_generator = new TitleCaseGenerator;
        //Act
        $title = $title_generator->makeTitleCase('SIMPLON');
        //Assert
        $this->assertEquals('Simplon', $title);
    }

    function test_makeTitleCase_nonNumeric()
    {
        //Prepare
        $title_generator = new TitleCaseGenerator;       
        //Act
        $title = $title_generator->makeTitleCase('SIMPLON6564654');
        //Assert           
        $this->assertEquals('Simplon6564654', $title);
        $this->assertIsNotInt($title);
    }

    function test_makeTitleCase_mixedCase()
    {
        //Prepare            
        $title_generator = new TitleCaseGenerator;
        //Act
        $title = $title_generator->makeTitleCase('SIMPLON simplon');
        //Assert
        $this->assertEquals('Simplon Simplon', $title);
    }

}
