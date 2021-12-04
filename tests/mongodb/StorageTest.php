<?php

namespace mycademy\tests\unit\yii2filestorage\mongodb;

use yii\mongodb\Connection;
use mycademy\yii2filestorage\mongodb\Storage;
use mycademy\tests\unit\yii2filestorage\TestCase;

/**
 * @group mongodb
 */
class StorageTest extends TestCase
{
    public function testInitConnection()
    {
        $storage = new Storage([
            'db' => [
                'class' => Connection::className()
            ]
        ]);
        $this->assertTrue($storage->db instanceof Connection);

        $mongodb = $this->getMongodb(false, false);
        $storage = new Storage([
            'db' => $mongodb
        ]);
        $this->assertSame($mongodb, $storage->db);
    }
}