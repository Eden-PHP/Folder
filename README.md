![logo](http://eden.openovate.com/assets/images/cloud-social.png) Eden Folder
====
[![Build Status](https://api.travis-ci.org/Eden-PHP/Folder.svg)](https://travis-ci.org/Eden-PHP/Folder)
====

 - [Install](#install)
 - [Introduction](#intro)
 - [API](#api)
    - [create](#create)
    - [getFiles](#getFiles)
    - [getFolders](#getFolders)
    - [getName](#getName)
    - [isFolder](#isFolder)
    - [remove](#remove)
    - [removeFiles](#removeFiles)
    - [removeFolders](#removeFolders)
    - [truncate](#truncate)
 - [Contributing](#contributing)

====

<a name="install"></a>
## Install

`composer install eden/folder`

====

<a name="intro"></a>
## Introduction

Instantiate folder in this manner.

```
$folder = eden('folder', '/some/path/to/folder');
```

====

<a name="api"></a>
## API

==== 

<a name="create"></a>

### create

Creates a folder given the path 

#### Usage

```
eden('folder', '/some/path/to/folder')->create(int $chmod);
```

#### Parameters

 - `int $chmod` - the UNIX permissions level

Returns `Eden\Folder\Index`

#### Example

```
eden('folder', '/some/path/to/folder')->create();
```

==== 

<a name="getFiles"></a>

### getFiles

Returns a list of files given the path and optionally the pattern 

#### Usage

```
eden('folder', '/some/path/to/folder')->getFiles(string|null $regex, bool $recursive);
```

#### Parameters

 - `string|null $regex` - Regular expression to match files against
 - `bool $recursive` - To recursively look in folders

Returns `array`

#### Example

```
eden('folder', '/some/path/to/folder')->getFiles();
```

==== 

<a name="getFolders"></a>

### getFolders

Returns a list of folders given the path and optionally the regular expression 

#### Usage

```
eden('folder', '/some/path/to/folder')->getFolders(string|null $regex, bool $recursive);
```

#### Parameters

 - `string|null $regex` - Regular expression to match folders against
 - `bool $recursive` - To recursively look in folders

Returns `array`

#### Example

```
eden('folder', '/some/path/to/folder')->getFolders();
```

==== 

<a name="getName"></a>

### getName

Returns the name of the directory.. just the name 

#### Usage

```
eden('folder', '/some/path/to/folder')->getName();
```

#### Parameters

Returns `string` - the name

==== 

<a name="isFolder"></a>

### isFolder

Checks to see if this path is a real file 

#### Usage

```
eden('folder', '/some/path/to/folder')->isFolder(string|null $path);
```

#### Parameters

 - `string|null $path` - the path to test against

Returns `bool`

#### Example

```
eden('folder', '/some/path/to/folder')->isFolder();
```

==== 

<a name="remove"></a>

### remove

Removes a folder given the path 

#### Usage

```
eden('folder', '/some/path/to/folder')->remove();
```

#### Parameters

Returns `Eden\Folder\Index`

==== 

<a name="removeFiles"></a>

### removeFiles

Removes files given the path and optionally a regular expression 

#### Usage

```
eden('folder', '/some/path/to/folder')->removeFiles(string|null regular);
```

#### Parameters

 - `string|null regular` - expression

Returns `Eden\Folder\Index`

#### Example

```
eden('folder', '/some/path/to/folder')->removeFiles();
```

==== 

<a name="removeFolders"></a>

### removeFolders

Removes a folder given the path and optionally the regular expression 

#### Usage

```
eden('folder', '/some/path/to/folder')->removeFolders(string $regex);
```

#### Parameters

 - `string $regex` - Regular expression to test against

Returns `Eden\Folder\Index`

#### Example

```
eden('folder', '/some/path/to/folder')->removeFolders();
```

==== 

<a name="truncate"></a>

### truncate

Removes files and folder given a path 

#### Usage

```
eden('folder', '/some/path/to/folder')->truncate();
```

#### Parameters

Returns `Eden\Folder\Index`

==== 

<a name="contributing"></a>
#Contributing to Eden

Contributions to *Eden* are following the Github work flow. Please read up before contributing.

##Setting up your machine with the Eden repository and your fork

1. Fork the repository
2. Fire up your local terminal create a new branch from the `v4` branch of your 
fork with a branch name describing what your changes are. 
 Possible branch name types:
    - bugfix
    - feature
    - improvement
3. Make your changes. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")

##Making pull requests

1. Please ensure to run `phpunit` before making a pull request.
2. Push your code to your remote forked version.
3. Go back to your forked version on GitHub and submit a pull request.
4. An Eden developer will review your code and merge it in when it has been classified as suitable.