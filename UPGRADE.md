Upgrading Instructions for File Storage Extension for Yii 2
===========================================================

!!!IMPORTANT!!!

The following upgrading instructions are cumulative. That is,
if you want to upgrade from version A to version C and there is
version B between A and C, you need to following the instructions
for both A and B.

Upgrade from 1.2
----------------
From version 1.3 some interfaces have additional functions and/or parameters or name changes.
If you haven't extended the default storage/bucket classes these change probably won't impact you,
otherwise you have to update your classes accordingly:
 - New method: `\mycademy\yii2filestorage\BucketInterface::setId()`
 - New method: `\mycademy\yii2filestorage\BucketInterface::getId()`
 - New method: `\mycademy\yii2filestorage\BucketInterface::getPreSignedFileUrl()`
 - New parameter `$metaData` for `\mycademy\yii2filestorage\BucketInterface::copyFileInternal()`
 - Parameter `$bucketName` changed to `$bucketId` for `\mycademy\yii2filestorage\StorageInterface::getBucket()`
 - Parameter `$bucketName` changed to `$bucketId` for `\mycademy\yii2filestorage\StorageInterface::setBucket()`
 - Parameter `$bucketName` changed to `$bucketId` for `\mycademy\yii2filestorage\StorageInterface::hasBucket()`

Upgrade from 1.1
----------------
From version 1.2 the namespace was changed to `mycademy\yii2filestorage` to reflect the fork from
https://github.com/yii2tech/file-storage.
Import statements should be updated, e.g.:
`yii2tech\filestorage\amazon\Storage`  
should become  
`mycademy\yii2filestorage\amazon\Storage`


Upgrade from 1.0.1
----------------------

* Methods `setBaseUrl()` and `getBaseUrl()` have been added to `\yii2tech\filestorage\StorageInterface`.
  You should implement these new methods in case you create your own storage.

* Method `openFile()` has been added to `\yii2tech\filestorage\BucketInterface`.
  You should implement this new method in case you create your own storage bucket.
