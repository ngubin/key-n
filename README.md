# KeyN

Generating a unique short key from the number.

A simple library for converting a number into a string key and back. You can use to shorten long numbers to unique keys.

<a href="https://github.com/ngubin/key-n/releases"><img src="https://img.shields.io/github/release/ngubin/key-n.svg?style=flat-square" alt="Latest Version"/></a>
<a href="https://packagist.org/packages/ngubin/key-n"><img src="https://img.shields.io/packagist/dt/ngubin/key-n.svg?style=flat-square" alt="Total Downloads"/></a>

## Example Usage

#### Creating a key from a number:

You can only encode an integer greater than or equal to one.

``` php
use KeyN\Make\Key62;

$instance = Key62::make();
$key = $instance->encode(100000);
```

#### Set your own character set to create keys:

``` php
use KeyN\Make\Key62;

$characters = 'wWpJbH8nIDed1Evq5OcToF2ZuXsayz7RrtP490ixSKC3GM6gYkNVhBUQmLlfAj';

$instance = Key62::make($characters);
$key = $instance->encode(100000);
```

#### Getting the number from the key:

You can decode the key if all of its characters are in the class set.

``` php
use KeyN\Make\Key62;

$instance = Key62::make();
$number = $instance->decode('Gh1a');
```

## License

This project is released under the MIT License.

© 2020 Nik Gubin, All rights reserved.
