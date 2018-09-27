<?php
ini_set("display_errors","On");
error_reporting(1);
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Credentials\CredentialProvider;

$profile = 'default';
$path = '/home/max/.aws/credentials';
$provider = CredentialProvider::ini($profile, $path);
$provider = CredentialProvider::memoize($provider);
$client = S3Client::factory(array(
    //'profile' => 'default',
    'region'  => 'us-east-1',
    'version' => '2006-03-01',
    'credentials' => $provider
));

$client->downloadBucket('/www/eonlinewebs/eonline/', 's3://eonlinewebs/',null, $options = array("debug"=>true));