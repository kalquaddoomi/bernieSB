<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 4/9/16
 * Time: 11:01 PM
 */
  include "../classes/transmitter.php";
  $InitReporter = new Reporter();
  $stateOut = array();
  $currentStates = array(
      "NewYork"=>array('key'=>'NewYork', "chart"=>"new-york", "url"=>"New York", "name"=>"New York", "img"=>"us_NewYork.svg", "delegates"=>247, 'electdate'=>'04-19-2016'),
      "NewJersey"=>array('key'=>"NewJersey", "chart"=>"new-jersey", "url"=>"New Jersey", "name"=>"New Jersey", "img"=>"us_New-Jersey.svg", "delegates"=>126, 'electdate'=>'06-07-2016'),
      "Maryland"=>array('key'=>"Maryland", "chart"=>"maryland", "url"=>"Maryland", "name"=>"Maryland", "img"=>"us_Maryland.svg", "delegates"=>95, 'electdate'=>'04-26-2016'),
      "Pennsylvania"=>array('key'=>"Pennsylvania", "chart"=>"pennsylvania", "url"=>"Pennsylvania", "name"=>"Pennsylvania", "img"=>"us_Pennsylvania.svg", "delegates"=>189, 'electdate'=>'04-26-2016'),
      "Kentucky"=>array('key'=>"Kentucky", "chart"=>"kentucky", "url"=>"Kentucky", "name"=>"Kentucky", "img"=>"us_Kentucky.svg", "delegates"=>55, 'electdate'=>'06-05-2016'),
      "PuertoRico"=>array('key'=>"PuertoRico", "chart"=>"puerto-rico", "url"=>"Puerto Rico", "name"=>"Puerto Rico", "img"=>"", "delegates"=>60, 'electdate'=>'04-19-2016'),
      "WestVirginia"=>array('key'=>"WestVirginia", "chart"=>"west-virginia", "url"=>"West Virginia", "name"=>"West Virginia", "img"=>"us_West-Virginia.svg", "delegates"=>29, 'electdate'=>'05-10-2016'),
      "Connecticut"=>array('key'=>"Connecticut", "chart"=>"connecticut", "url"=>"Connecticut", "name"=>"Connecticut", "img"=>"us_Connecticut.svg", "delegates"=>55, 'electdate'=>'04-26-2016'),
      "Oregon"=>array('key'=>"Oregon", "chart"=>"oregon", "url"=>"Oregon", "name"=>"Oregon", "img"=>"us_Oregon.svg", "delegates"=>61, 'electdate'=>'05-17-2016'),
      "RhodeIsland"=>array('key'=>"RhodeIsland", "chart"=>"rhode-island", "url"=>"Rhode Island", "name"=>"Rhode Island", "img"=>"us_RhodeIsland.svg", "delegates"=>24, 'electdate'=>'04-26-2016'),
      "Delaware"=>array('key'=>"Delaware", "chart"=>"delaware", "url"=>"Delaware", "name"=>"Delaware", "img"=>"us_Delaware.svg", "delegates"=>21, 'electdate'=>'04-26-2016'),
      "Indiana"=>array('key'=>"Indiana", "chart"=>"indiana", "url"=>"Indiana", "name"=>"Indiana", "img"=>"us_Indiana.svg", "delegates"=>83, 'electdate'=>'05-03-2016'),
      "California"=>array('key'=>"California", "chart"=>"california", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016'),
  );
  foreach($currentStates as $aState) {
      $data = $InitReporter->stateInvites(urlencode($aState['url']));
      $aState['start'] = (is_null($data['Invitees']) ? 0 : $data['Invitees']);
      $stateOut[] = $aState;
  }
?>