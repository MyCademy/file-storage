<?php

namespace mycademy\tests\unit\yii2filestorage\sftp;

use mycademy\yii2filestorage\sftp\Connection;
use mycademy\yii2filestorage\sftp\Storage;
use mycademy\tests\unit\yii2filestorage\TestCase;

/**
 * @group sftp
 */
class StorageTest extends TestCase
{
    public function testInitConnection()
    {
        $storage = new Storage([
            'ssh' => [
                'class' => Connection::className()
            ]
        ]);
        $this->assertTrue($storage->ssh instanceof Connection);

        $ssh = $this->getSsh(false);
        $storage = new Storage([
            'ssh' => $ssh
        ]);
        $this->assertSame($ssh, $storage->ssh);

        $storage = new Storage([
            'ssh' => ['host' => '127.0.0.1']
        ]);
        $this->assertTrue($storage->ssh instanceof Connection);
    }

    /**
     * @depends testInitConnection
     */
    public function testGetSftp()
    {
        $storage = new Storage([
            'ssh' => $this->getSsh()
        ]);
        $sftp = $storage->getSftp();
        $this->assertNotEmpty($sftp);
    }
}