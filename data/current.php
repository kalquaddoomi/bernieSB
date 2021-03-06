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
      "NewYork"=>array('key'=>'NewYork', "chart"=>"new-york", "url"=>"NY", "name"=>"New York", "img"=>"us_NewYork.svg", "delegates"=>247, 'electdate'=>'04-19-2016', 'stateid'=>112825018731802),
      "NewJersey"=>array('key'=>"NewJersey", "chart"=>"new-jersey", "url"=>"NJ", "name"=>"New Jersey", "img"=>"us_New-Jersey.svg", "delegates"=>126, 'electdate'=>'06-07-2016', 'stateid'=>108325505857259),
      "Maryland"=>array('key'=>"Maryland", "chart"=>"maryland", "url"=>"MD", "name"=>"Maryland", "img"=>"us_Maryland.svg", "delegates"=>95, 'electdate'=>'04-26-2016', 'stateid'=>108178019209812),
      "Pennsylvania"=>array('key'=>"Pennsylvania", "chart"=>"pennsylvania", "url"=>"PA", "name"=>"Pennsylvania", "img"=>"us_Pennsylvania.svg", "delegates"=>189, 'electdate'=>'04-26-2016', 'stateid'=>105528489480786),
      "Kentucky"=>array('key'=>"Kentucky", "chart"=>"kentucky", "url"=>"KY", "name"=>"Kentucky", "img"=>"us_Kentucky.svg", "delegates"=>55, 'electdate'=>'06-05-2016', 'stateid'=>109438335740656),
      "PuertoRico"=>array('key'=>"PuertoRico", "chart"=>"puerto-rico", "url"=>"PR", "name"=>"Puerto Rico", "img"=>"", "delegates"=>60, 'electdate'=>'04-19-2016', 'stateid'=>108461009175078),
      "WestVirginia"=>array('key'=>"WestVirginia", "chart"=>"west-virginia", "url"=>"WV", "name"=>"West Virginia", "img"=>"us_West-Virginia.svg", "delegates"=>29, 'electdate'=>'05-10-2016', 'stateid'=>112083625475436),
      "Connecticut"=>array('key'=>"Connecticut", "chart"=>"connecticut", "url"=>"CT", "name"=>"Connecticut", "img"=>"us_Connecticut.svg", "delegates"=>55, 'electdate'=>'04-26-2016', 'stateid'=>112750485405808),
      "Oregon"=>array('key'=>"Oregon", "chart"=>"oregon", "url"=>"OR", "name"=>"Oregon", "img"=>"us_Oregon.svg", "delegates"=>61, 'electdate'=>'05-17-2016', 'stateid'=>109564342404151),
      "RhodeIsland"=>array('key'=>"RhodeIsland", "chart"=>"rhode-island", "url"=>"RI", "name"=>"Rhode Island", "img"=>"us_RhodeIsland.svg", "delegates"=>24, 'electdate'=>'04-26-2016', 'stateid'=>108295552526163),
      "Delaware"=>array('key'=>"Delaware", "chart"=>"delaware", "url"=>"DE", "name"=>"Delaware", "img"=>"us_Delaware.svg", "delegates"=>21, 'electdate'=>'04-26-2016', 'stateid'=>105643859470062),
      "Indiana"=>array('key'=>"Indiana", "chart"=>"indiana", "url"=>"IN", "name"=>"Indiana", "img"=>"us_Indiana.svg", "delegates"=>83, 'electdate'=>'05-03-2016', 'stateid'=>111957282154793),
      "Guam"=>array('key'=>"Guam", "chart"=>"guam", "url"=>"GM", "name"=>"Guam", "img"=>"us_Guam.svg", "delegates"=>7, 'electdate'=>'05-07-2016', 'stateid'=>108131585873862),
      "California"=>array('key'=>"California", "chart"=>"california", "url"=>"CA", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),


      /*
      "VirginIslands"=>array('key'=>"VirginIslands", "chart"=>"virgin-islands", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),
      "Montana"=>array('key'=>"Montana", "chart"=>"montana", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),
      "NewMexico"=>array('key'=>"NewMexico", "chart"=>"new-mexico", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),
      "NorthDakota"=>array('key'=>"NorthDakota", "chart"=>"north-dakota", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),
      "SouthDakota"=>array('key'=>"SouthDakota", "chart"=>"south-dakota", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),
      "WashingtonDC"=>array('key'=>"WashingtonDC", "chart"=>"washington-dc", "url"=>"[NEW!] California", "name"=>"California", "img"=>"us_California.svg", "delegates"=>475, 'electdate'=>'06-07-2016', 'stateid'=>108131585873862),
      */


  );
  foreach($currentStates as $aState) {
      $data = $InitReporter->stateInvites(urlencode($aState['url']));
      $aState['start'] = (is_null($data['Invitees']) ? 0 : $data['Invitees']);
      $stateOut[] = $aState;
  }
?>