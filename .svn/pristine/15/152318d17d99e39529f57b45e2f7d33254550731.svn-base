<?php

$ali = base_path();
require $ali.'/ali/vendor/autoload.php';
$quickstart = $ali.'/ali/client_secret.json';
$credensialpath =  $ali.'/ali/drive-api-quickstart.json';
$filepath = $ali.'/ali/ali.zip';

define('APPLICATION_NAME', 'Drive API Quickstart');
define('CREDENTIALS_PATH', $credensialpath);
define('CLIENT_SECRET_PATH', $quickstart);
define('SCOPES', implode(' ', array(
  Google_Service_Drive::DRIVE_METADATA_READONLY)
));

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
class uploadfile{
  
public function getClient() {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(array('https://www.googleapis.com/auth/drive.file'));
  $client->setAuthConfigFile(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');

  
  $credentialsPath = CREDENTIALS_PATH;
  $accessToken = file_get_contents($credentialsPath);
  $client->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
    $client->refreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, $client->getAccessToken());
  }
  return $client;
}


public function uploadfunction($filepath,$fileName){
  // $ali = base_path();
  // $filepath = $ali.'/ali/ali.zip';

    $client = $this->getClient();
    $service = new Google_Service_Drive($client);

    $file = new Google_Service_Drive_DriveFile();
        $file->setTitle(uniqid().'.zip');
        $file->setDescription('A test document');
        $file->setMimeType('application/zip');

        $data = file_get_contents($filepath);

        $createdFile = $service->files->insert($file, array(
              'data' => $data,
              'mimeType' => 'application/zip',
              'uploadType' => 'multipart'
            ));
        return $createdFile;
}

  public function printFile($fileId,$bandID) {

      $client = $this->getClient();
      $service = new Google_Service_Drive($client);

      $file = $service->files->get($fileId);

      $downloadUrl = $file->getDownloadUrl();
      if ($downloadUrl) {
          $request = new Google_Http_Request($downloadUrl, 'GET', null, null);
          $httpRequest = $service->getClient()->getAuth()->authenticatedRequest($request);
          if ($httpRequest->getResponseHttpCode() == 200) {
              $downloadesFile = $httpRequest->getResponseBody();
          } else {
              // An error occurred.
              $downloadesFile =  null;
          }
      } else {
          // The file doesn't have any content stored on Drive.
          $downloadesFile = null;
      }


      $fileNmae = base_path()."/"."scores/".$bandID."/".$fileId.".zip";
      $myfile = fopen($fileNmae, "w") or die("Unable to open file!");

      fwrite($myfile, $downloadesFile);

      fclose($myfile);


    }




}
