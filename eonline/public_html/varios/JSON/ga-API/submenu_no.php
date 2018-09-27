<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
function printDatosBeaker($results_beaker){ 
  $entrada = new SimpleXmlElement(file_get_contents("http://webservices.eonline.com:/V2/blogAPI/blogs/$results_beaker?edition=mx&format=xml&view=deep&api-key=eonlinelatino")); 
  return "http://images.eonline.com".$entrada->payload->bodySegments[0]->image->filePath."/".$entrada->payload->bodySegments[0]->image->source;
}

function getService()
{
  require_once 'google-api-php-client/src/Google/autoload.php';

  //$service_account_email = 'e-abz-299@e-abz-ga.iam.gserviceaccount.com';
  //$key_file_location = '/home/eonline/public_html/varios/JSON/ga-API/GA-62762321288c.p12';
  $service_account_email = 'e-abz-299@e-abz-ga.iam.gserviceaccount.com';
  $key_file_location = '/home/eonline/public_html/varios/JSON/ga-API/GA-557465ca0ddf.p12';
  //$service_account_email = 'e-arg-525@e-abz-ga.iam.gserviceaccount.com';
  //$key_file_location = '/home/eonline/public_html/varios/JSON/ga-API/GA-6fff8162fae4.p12';

  $client = new Google_Client();
  $client->setApplicationName("Submenues");
  $analytics = new Google_Service_Analytics($client);

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

  $accounts = $analytics->management_accounts->listManagementAccounts();

  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();

    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);

    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();

      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);

      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();

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

   $optParams = array(
      'dimensions' => 'ga:pageTitle,ga:pagePath,ga:dimension1',
      'sort' => '-ga:dimension1',
      'max-results' => '100');

  return $analytics->data_ga->get(
    'ga:' . $profileId,
       'yesterday',
       'today',
       'ga:pageviews',
      $optParams);
}

function printResults(&$results) {

  if (count($results->getRows()) > 0) {

    $profileName = $results->getProfileInfo()->getProfileName();

    $rows = $results->getRows();

    $url=$rows[0][0];

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
        
        echo ("<br>".strlen($row[2]));
        if(strlen($row[2]) > 4){
          $results->rows[$cont][4]=printDatosBeaker($row[2]);
        }else{
          $results->rows[$cont][4]="";
        }
        $cont++;
      }

  } else {
  }
  return $results;

}

$new=printDataTable($results);
echo '<pre>';
  var_dump($new->rows);
  //var_dump($results->rows);
echo '</pre>';

//$jsonData = json_encode($new->rows, JSON_FORCE_OBJECT);
//file_put_contents('/home/eonline/public_html/varios/JSON/JSONsubmenues/argentina.json', $jsonData);
?>