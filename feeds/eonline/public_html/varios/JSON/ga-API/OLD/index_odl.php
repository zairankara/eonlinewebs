<?php 

    // Include the Google API PHP client.
require_once( 'google-api-php-client/autoload.php' );
 
// Initialize the Google API.
$client = new Google_Client();
$client->setApplicationName( 'analyticsapipro' );
 
$client->setAssertionCredentials(
  new Google_Auth_AssertionCredentials(
 
    // Google client ID email address
    '661859373264-compute@developer.gserviceaccount.com',
    array('https://www.googleapis.com/auth/analytics.readonly'),
 
    // Downloaded client ID certificate file
    file_get_contents( 'My Project-0b0d3981e5d2.p12' )
  )
);
 
// Google client ID
$client->setClientId( '661859373264-ajhd5j5a3dblfdf0plbj3i3e5repdfej.apps.googleusercontent.com' );
$client->setAccessType( 'offline_access' );
 
$analytics = new Google_Service_Analytics( $client );
 
// Google Analytics account view ID
$analytics_id = 'ga:83006744';

// Get unique pageviews and average time on page.
try {
  $optParams = array();
 
  // Required parameter
  $metrics    = 'ga:uniquePageviews,ga:avgTimeOnPage';
  $start_date = '2014-01-29';
  $end_date   = '2015-01-29';
 
  // Optional parameters
  // optParams['filters']      = 'ga:pagePath==/';
  // $optParams['dimensions']  = 'ga:pagePath';
  // $optParams['sort']        = '-ga:pageviews';
  // $optParams['max-results'] = '10';
 
  $result = $analytics->data_ga->get( $analytics_id,
            $start_date,
            $end_date, $metrics, $optParams);
 
  if( $result->getRows() ) {
    print_r( $result->getRows() );
  }
} catch(Exception $e) {
  echo 'There was an error : - ' . $e->getMessage();
}

 ?>