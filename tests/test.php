<?php 
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use HashDigest\Digester;

$dataToHash = array(
    'name'=>'Ali',
    'age'=>'12',
    'city'=>'Nairobi',
    'work'=>'Software Engineer'
);

$hash = Digester::digest($dataToHash,'sha256',false,'.','echo');


echo 'Generated Hash is ';
echo "\n<p>";
echo $hash;
echo "\n";
$isValid = Digester::isHashValid($hash, $dataToHash);

echo "Hash is ". ($isValid ? 'valid': 'not valid');

echo "\n";

$dataToHash['company']= 'Sapama';

echo 'Added company => sapama to the array';

echo "\n";

echo 'Rearranged array';

echo "\n";
$dataToHash = array(
    'age'=>'12',
    'city'=>'Nairobi',
    'work'=>'Software Engineer',
    'name'=>'Ali',
);

$isValid = Digester::isHashValid($hash, $dataToHash);

echo "Hash is ". ($isValid ? 'valid': 'not valid');

echo "\n";
