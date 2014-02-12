hashdigest
==========

A PHP Hash Generator and Verifier

This is a wrapper on the PHP function HASH for generating hash digests using sha256 algorithm and also verifying a given hash againist given data.

<h1>Installation</h1>
<h3>Requirements</h3>
PHP v>=5.1.2+
<h3>With Composer</h3>
The easiest way to install Carbon is via composer. Create the following <code>composer.json</code> file and run the php composer.phar install command to install it.
```json
"require": {
        "edwinmugendi/hashdigest": "master"
    }
```
<h3>Without Composer</h3>
<p>Why not use <a href="http://getcomposer.org/">composer</a>? Anyway, Download <a href="https://github.com/edwinmugendi/hashdigest/blob/master/src/HashDigest/Digester.php">Digester.php</a> from the repo and save the file somewhere in your project.</p>
```php
<?php
require 'path/to/Digester.php';

use HashDigest\Digester;

$dataToHash = array(
    'name'=>'Ali',
    'age'=>'12',
    'city'=>'Nairobi',
    'work'=>'Software Engineer'
    'at'=>'Sapama.com'
);

$hash = Digester::digest($dataToHash);

echo 'Generated Hash is ';
echo "\n";
echo $hash;
echo "\n";
$isValid = Digester::isHashValid($hash, $dataToHash);

echo "Hash is ". ($isValid ? 'valid': 'not valid');
```
The hash is generated by:

1. Get all the fields in an array, don't forget to include the API_SECRET with a lower case key as 'secret' eg $dataToHash = array('secret'=>'apisecret','currency'=>'USD','amount'=>12,...);

2. Sort the array by the key, Hence the above array will be $dataToHash = array('amount'=>12,'currency'=>'USD','secret'=>'apisecret',,,...)

3. Generate the string to be hashed by joining the array elements with a '.' (for PHP use PHP Implode). Hence the string will be "12.apisecret.USD"

4. Hash the generated string with sha256 algorithm (for PHP use PHP Hash)
