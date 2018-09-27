<?php

function getService()
{
  // Creates and returns the Analytics service object.

  // Load the Google API PHP Client Library.
  require_once 'google-api-php-client/src/Google/autoload.php';

  // Use the developers console and replace the values with your
  // service account email, and relative location of your key file.
  $service_account_email = 'e-abz-299@e-abz-ga.iam.gserviceaccount.com';
  $key_file_location = 'E! ABZ GA-62762321288c.p12';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("HelloAnalytics");
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
      'dimensions' => 'ga:pagePath',
      'sort' => '-ga:pageviews',
      'max-results' => '10');

  return $analytics->data_ga->get(
    'ga:' . $profileId,
      '30daysAgo',
       'yesterday',
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
    print_r($rows);
    foreach ($rows as $row) {
        $jsondata = array();
        $jsondata["success"] = true;    
        $jsondata["data"]["row"] = array();
        $jsondata["data"]["row"][] = $row;
    }
    // Print the results.
    //print_r($rows[0][0]);
    //print "First view (profile) found: $profileName\n";
    //print "Total sessions: $sessions\n";
    //echo json_encode($jsondata, JSON_FORCE_OBJECT);
    $json_string = json_encode($rows, JSON_FORCE_OBJECT);
    $file = 'ga.json';
    file_put_contents($file, $json_string);
  } else {
    print "No results found.\n";
  }
}

$analytics = getService();
//print_r($analytics);
$profile = getFirstProfileId($analytics);
//echo 'Profile '.$profile."\n";
$results = getResults($analytics, $profile);
//print_r($results);
printResults($results);

function printColumnHeaders(&$results) {
  $html = '';
  $headers = $results->getColumnHeaders();

  foreach ($headers as $header) {
    $html .= <<<HTML
Column Name = {$header->getName()}
Column Type = {$header->getColumnType()}
Column Data Type = {$header->getDataType()}
HTML;
}
  print $html;
}

//printColumnHeaders($results);

function printDataTable(&$results) {
  $table ="";
  if (count($results->getRows()) > 0) {
    $table .= '<table>';

    // Print headers.
    $table .= '<tr>';

    foreach ($results->getColumnHeaders() as $header) {
      $table .= '<th>' . $header->name . '</th>';
    }
    $table .= '</tr>';

    // Print table rows.
    foreach ($results->getRows() as $row) {
      $table .= '<tr>';
        foreach ($row as $cell) {
          $table .= '<td>'
                 . htmlspecialchars($cell, ENT_NOQUOTES)
                 . '</td>';
        }
      $table .= '</tr>';
    }
    $table .= '</table>';

  } else {
    $table .= '<p>No Results Found.</p>';
  }
  print $table;
}
//printDataTable($results);

function printReportInfo(&$results) {
  $html = <<<HTML
  <pre>
Contains Sampled Data = {$results->getContainsSampledData()}
Kind                  = {$results->getKind()}
ID                    = {$results->getId()}
Self Link             = {$results->getSelfLink()}
</pre>
HTML;

  print $html;
}

//printReportInfo($results);

function printProfileInformation(&$results) {
  $profileInfo = $results->getProfileInfo();

  $html = <<<HTML
<pre>
Account ID               = {$profileInfo->getAccountId()}
Web Property ID          = {$profileInfo->getWebPropertyId()}
Internal Web Property ID = {$profileInfo->getInternalWebPropertyId()}
Profile ID               = {$profileInfo->getProfileId()}
Table ID                 = {$profileInfo->getTableId()}
Profile Name             = {$profileInfo->getProfileName()}
</pre>
HTML;

  print $html;
}

//printProfileInformation($results);

function printQueryParameters(&$results) {
  $query = $results->getQuery();

  $html = '<pre>';
  foreach ($query as $paramName => $value) {
    $html .= "$paramName = $value\n";
  }
  $html .= '</pre>';

  print $html;
}

//printQueryParameters($results);

function getPaginationInfo(&$results) {
  $html = <<<HTML
<pre>
Items per page = {$results->getItemsPerPage()}
Total results  = {$results->getTotalResults()}
Previous Link  = {$results->getPreviousLink()}
Next Link      = {$results->getNextLink()}
</pre>
HTML;

  print $html;
}

//getPaginationInfo($results);

function printTotalsForAllResults(&$results) {
  $totals = $results->getTotalsForAllResults();
  $html = '';
  foreach ($totals as $metricName => $metricTotal) {
    $html .= "Metric Name  = $metricName\n";
    $html .= "Metric Total = $metricTotal";
  }

  print $html;
}

//printTotalsForAllResults($results);

?>