<?php

namespace mycademy\tests\unit\yii2filestorage\local;

use Yii;
use mycademy\yii2filestorage\local\Storage;
use mycademy\tests\unit\yii2filestorage\TestCase;

/**
 * Test case for the extension [[Storage]].
 * @see Storage
 *
 * @group local
 */
class StorageTest extends TestCase
{
    public function testSetGet()
    {
        $fileStorage = new Storage();

        $testBasePath = '/test/base/path';
        $fileStorage->setBasePath($testBasePath);
        $this->assertEquals($fileStorage->getBasePath(), $testBasePath, 'Unable to set base path correctly!');

        $testBaseUrl = 'http://test/base/url';
        $fileStorage->setBaseUrl($testBaseUrl);
        $this->assertEquals($fileStorage->getBaseUrl(), $testBaseUrl, 'Unable to set base URL correctly!');
    }
}
