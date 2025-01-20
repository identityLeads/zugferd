<?php

namespace horstoeko\zugferd\tests\testcases\issues;

use horstoeko\zugferd\tests\TestCase;
use horstoeko\zugferd\ZugferdDocumentReader;
use horstoeko\zugferd\exception\ZugferdUnknownXmlContentException;

class Issue104Test extends TestCase
{
    /**
     * @return void
     * @issue  104
     */
    public function testInvalidException1()
    {
        $this->expectException(ZugferdUnknownXmlContentException::class);

        $document = ZugferdDocumentReader::readAndGuessFromFile(dirname(__FILE__) . '/../../assets/xml_invalid_1.xml');

        $this->assertNull($document);
    }

    /**
     * @return void
     * @issue  104
     */
    public function testInvalidException2()
    {
        $this->expectException(ZugferdUnknownXmlContentException::class);

        $document = ZugferdDocumentReader::readAndGuessFromFile(dirname(__FILE__) . '/../../assets/xml_invalid_2.xml');

        $this->assertNull($document);
    }
}
