<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
function printDatosBeaker($results_beaker){ 
  $entrada = new SimpleXmlElement(file_get_contents("http://webservices.eonline.com:/V2/blogAPI/blogs/$results_beaker?edition=mx&format=xml&view=deep&api-key=eonlinelatino")); 
  return "http://images.eonline.com".$entrada->payload->bodySegments[0]->image->filePath."/".$entrada->payload->bodySegments[0]->image->source;
}

function getService()
{
  // Creates and returns the Analytics service object.

  // Load the Google API PHP Client Library.
  require_once 'google-api-php-client/src/Google/autoload.php';

  // Use the developers console and replace the values with your
  // service account email, and relative location of your key file.
  //$service_account_email = 'e-abz-299@e-abz-ga.iam.gserviceaccount.com';
  //$key_file_location = 'E! ABZ GA-62762321288c.p12';
  $service_account_email = 'e-mex-425@e-abz-ga.iam.gserviceaccount.com';
  $key_file_location = '/home/eonline/public_html/varios/JSON/ga-API/GA-59e67cd1af57.p12';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("Mexico");
  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );
  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }

  return $analytics;
}

function getFirstprofileId(&$analytics) {
  // Get the user's first view (profile) ID.

  // Get the list of accounts for the authorized user.
  $accounts = $analytics->management_accounts->listManagementAccounts();

  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();

    // Get the list of properties for the authorized user.
    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);

    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();

      // Get the list of views (profiles) for the authorized user.
      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);

      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();

        // Return the first view (profile) ID.
        return $items[0]->getId();

      } else {
        throw new Exception('No views (profiles) found for this user.');
      }
    } else {
      throw new Exception('No properties found for this user.');
    }
  } else {
    throw new Exception('No accounts found for this user.');
  }
}

function getResults(&$analytics, $profileId) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.
  /* return $analytics->data_ga->get(
       'ga:' . $profileId,
       '7daysAgo',
       'today',
       'ga:sessions');*/
   $optParams = array(
      /*'dimensions' => 'ga:pageTitle,ga:pagePath,ga:landingPagePath,ga:hostname',*/
      'dimensions' => 'ga:pageTitle,ga:pagePath,ga:landingContentGroup2,ga:dimension1',
      'sort' => '-ga:pageviews',
      'max-results' => '8');

  return $analytics->data_ga->get(
    'ga:' . $profileId,
       '7daysAgo',
       'today',
       /*'today',
       'today',*/
       'ga:pageviews',
      $optParams);
}

function printResults(&$results) {
  // Parses the response from the Core Reporting API and prints
  // the profile name and total sessions.
  if (count($results->getRows()) > 0) {

    // Get the profile name.
    $profileName = $results->getProfileInfo()->getProfileName();

    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();

    $url=$rows[0][0];

    // Print the results.
    //print_r($rows[0][0]);
    //print "First view (profile) found: $profileName\n";
    //print "Total sessions: $sessions\n";
  } else {
    print "No results found.\n";
  }
}

$analytics = getService();
$profile = getFirstProfileId($analytics);
$results = getResults($analytics, $profile);

//printResults($results);

function printDataTable(&$results) {
  $table ="";
  if (count($results->getRows()) > 0) {
    
      $cont=0;
      foreach ($results->rows as $row) {
        //echo ("<br>".$row[3]);
        $results->rows[$cont][5]=printDatosBeaker($row[3]);
        $cont++;
      }

  } else {
  }
  return $results;

}

$new=printDataTable($results);
/*echo '<pre>';
  var_dump($new->rows);
echo '</pre>';*/

$jsonData = json_encode($new->rows, JSON_FORCE_OBJECT);
file_put_contents('/home/eonline/public_html/varios/JSON/JSONanalytics/mexico.json', $jsonData);
?>