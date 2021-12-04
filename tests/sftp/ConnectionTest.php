<?php

namespace mycademy\tests\unit\yii2filestorage\sftp;

use mycademy\tests\unit\yii2filestorage\TestCase;

/**
 * @group sftp
 */
class ConnectionTest extends TestCase
{
    public function testOpen()
    {
        $ssh = $this->getSsh();

        $ssh->open();

        $this->assertNotEmpty($ssh->getSession());
        $this->assertTrue($ssh->getIsActive());
    }

    /**
     * @depends testOpen
     */
    public function testClose()
    {
        $ssh = $this->getSsh();

        $ssh->open();
        $ssh->close();

        $this->assertFalse($ssh->getIsActive());
    }

    /**
     * @depends testOpen
     */
    public function testExecute()
    {
        $ssh = $this->getSsh();

        $output = $ssh->execute('whoami');

        $this->assertEquals($ssh->username, trim($output, "\n\r"));
    }
}