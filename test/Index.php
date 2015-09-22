<?php //-->
/*
 * This file is part of the Utility package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class EdenFolderIndexTest extends PHPUnit_Framework_TestCase
{
    public function testCreate() 
    {
        $class = eden('folder')->set(__DIR__.'/assets/foobar')->create(0777);
        $this->assertInstanceOf('Eden\\Folder\\Index', $class);

        $this->assertTrue(file_exists(__DIR__.'/assets/foobar'));
    }

    public function testGetFiles() 
    {
        $files = eden('folder')->set(__DIR__.'/assets')->getFiles();
        $this->assertEquals(4, count($files));

        $files = eden('folder')->set(__DIR__.'/assets')->getFiles('/.*\.php$/');
        $this->assertEquals(2, count($files));


        $files = eden('folder')->set(__DIR__.'/assets')->getFiles(null, true);
        $this->assertEquals(8, count($files));


        $files = eden('folder')->set(__DIR__.'/assets')->getFiles('/.*\.php$/', true);
        $this->assertEquals(4, count($files));
    }

    public function testGetFolders() 
    {
        $folders = eden('folder')->set(__DIR__.'/assets')->getFolders();
        $this->assertEquals(2, count($folders));

        $folders = eden('folder')->set(__DIR__.'/assets')->getFolders('/^foo/');
        $this->assertEquals(1, count($folders));

        $folders = eden('folder')->set(__DIR__.'/assets')->getFolders(null, true);
        $this->assertEquals(2, count($folders));

        $folders = eden('folder')->set(__DIR__.'/assets')->getFolders('/^test/', true);
        $this->assertEquals(1, count($folders));
    }

    public function testGetName() 
    {
        $name = eden('folder')->set(__DIR__.'/assets')->getName();
        $this->assertEquals('assets', $name);
    }

    public function testIsFolder() 
    {
        $this->assertTrue(eden('folder')->set(__DIR__.'/assets')->isFolder());
        $this->assertFalse(eden('folder')->set(__DIR__.'/assets/stars.gif')->isFolder());
    }

    public function testRemove() 
    {
        $class = eden('folder')->set(__DIR__.'/assets/foobar')->remove();
        $this->assertInstanceOf('Eden\\Folder\\Index', $class);

        $this->assertFalse(file_exists(__DIR__.'/assets/foobar'));
    }

    public function testRemoveFiles() 
    {
        $path = __DIR__.'/assets/foobar';
        eden('folder')->set($path)->create(0777);
        eden('file')->set($path.'/file1.txt')->touch();
        eden('file')->set($path.'/2files.txt')->touch();
        eden('file')->set($path.'/file3.txt')->touch();

        eden('folder')->set($path)->removeFiles('/^file/');

        $this->assertTrue(file_exists($path.'/2files.txt'));
        $this->assertFalse(file_exists($path.'/file3.txt'));

        eden('folder')->set($path)->removeFiles();
        $this->assertFalse(file_exists($path.'/2files.txt'));
    }

    public function testRemoveFolders() 
    {
        $path = __DIR__.'/assets/foobar/subfolder';

        eden('folder')->set($path)->create(0777);

        eden('folder')->set(__DIR__.'/assets/foobar')->removeFolders();

        $this->assertFalse(is_dir($path));

        eden('folder')->set(__DIR__.'/assets/foobar')->remove();
    }

    public function testTruncate() 
    {
        $path = __DIR__.'/assets/foobar2';


        eden('folder')->set($path)->create(0777);
        eden('folder')->set($path.'/subfolder2')->create(0777);

        eden('file')->set($path.'/file1.txt')->touch();
        eden('file')->set($path.'/2files.txt')->touch();
        eden('file')->set($path.'/file3.txt')->touch();

        eden('folder')->set($path)->truncate();

        $this->assertFalse(is_dir($path.'/subfolder2'));
        $this->assertFalse(file_exists($path.'/2files.txt'));

        eden('folder')->set($path)->remove();
    }
}