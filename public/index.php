<?php
include "../data/current.php";
/*
  include "../classes/transmitter.php";
  $InitReporter = new Reporter();
  $stateOut = array();
  $currentStates = array(
      "Wyoming"=>array('key'=>"Wyoming", "chart"=>"wyoming", "url"=>"Wyoming", "name"=>"Wyoming"),
      "NewYork"=>array('key'=>'NewYork', "chart"=>"new-york", "url"=>"New York", "name"=>"New York"),
      "NewJersey"=>array('key'=>"NewJersey", "chart"=>"new-jersey", "url"=>"New Jersey", "name"=>"New Jersey"),
      "Maryland"=>array('key'=>"Maryland", "chart"=>"maryland", "url"=>"Maryland", "name"=>"Maryland"),
      "Pennsylvania"=>array('key'=>"Pennsylvania", "chart"=>"pennsylvania", "url"=>"Pennsylvania", "name"=>"Pennsylvania"),
      "Kentucky"=>array('key'=>"Kentucky", "chart"=>"kentucky", "url"=>"Kentucky", "name"=>"Kentucky"),
      "PuertoRico"=>array('key'=>"PuertoRico", "chart"=>"puerto-rico", "url"=>"Puerto Rico", "name"=>"Puerto Rico"),
      "WestVirginia"=>array('key'=>"WestVirginia", "chart"=>"west-virginia", "url"=>"West Virginia", "name"=>"West Virginia"),
      "Connecticut"=>array('key'=>"Connecticut", "chart"=>"connecticut", "url"=>"Connecticut", "name"=>"Connecticut"),
      "Oregon"=>array('key'=>"Oregon", "chart"=>"oregon", "url"=>"Oregon", "name"=>"Oregon"),
      "RhodeIsland"=>array('key'=>"RhodeIsland", "chart"=>"rhode-island", "url"=>"Rhode Island", "name"=>"Rhode Island"),
      "Delaware"=>array('key'=>"Delaware", "chart"=>"delaware", "url"=>"Delaware", "name"=>"Delaware"),
      "Indiana"=>array('key'=>"Indiana", "chart"=>"indiana", "url"=>"Indiana", "name"=>"Indiana"),
      "California"=>array('key'=>"California", "chart"=>"california", "url"=>"[NEW!] California", "name"=>"California"),
  );
  foreach($currentStates as $aState) {
    $data = $InitReporter->stateInvites(urlencode($aState['url']));
    $aState['start'] = (is_null($data['Invitees']) ? 0 : $data['Invitees']);
    $stateOut[] = $aState;
  }
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Bernie Facebankathon</title>
  <meta name="description" content="The Bernie Facebankathon using Feelthebern.event and Berniefriendfinder.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/faceathon.css">
  <script type="text/javascript" src="./dist/fusioncharts/js/fusioncharts.js"></script>
  <script type="text/javascript" src="./dist/fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>

</head>
<body>
  <div class="col-md-12 getinvolved">
    <div class="col-md-4">

    </div>
    <div class="col-md-8">

    </div>
  </div>
  <div class="col-md-12 dailytotals">
    <div class="col-md-9 col-md-offset-1">
      <div id="chart-invites-today">LED gauges will load here!</div>
    </div>
  </div>
  <?php
  $counter = 1;

  function makeState($aState) {
    echo "<a href='https://www.facebook.com/search/9124187907/likers/124955570892789/likers/union/". $aState['stateid'] ."/residents/present/me/friends/friends/intersect' target='_blank'>";
    echo "  <div class='col-md-4 col-md-offset-1 state-block stateTotals' id='".$aState['key']."'>\n";
    echo " <div class='col-md-12 state-notice'><span class='state-name'>".$aState['name']."</span><span class='state-delegates'>At Stake: ".$aState['delegates']." delegates</span><span class='state-date'>".str_replace('-', '/', $aState['electdate'])."</span></div>";
    echo "<div class='col-md-12'>";
    echo "<div class='col-md-4'>";
    if($aState['img']) {
      echo "    <img class='state-pic' src='./dist/img/" . $aState['img'] . "' />";
    } else {
      echo "    <div class='state-pic'></div>";
    }
    echo "</div>";
    echo "<div class='col-md-8'>";
    echo "    <div class='state-bar' id='chart-actors-".$aState['chart']."'>Loading ".$aState['url']."...</div>\n";
    echo "    <div class='state-bar' id='chart-invitees-".$aState['chart']."'>Loading ".$aState['url']."...</div>\n";
    echo "</div>";
    echo "    </div>\n";
    echo "  </div>\n";
    echo "</a>";
    return;
  }

  foreach($currentStates as $aState) {
      if($counter % 2) {
        echo "<div class='col-md-12 states-row'>\n";
        makeState($aState);
      } else {
        makeState($aState);
        echo "  </div>\n";
      }
      $counter++;
  }?>



  <!-- <script type="text/javascript" src="./dist/js/berniefb.js"></script> -->
<script type="application/javascript">
  /**
   * Created by khaled on 4/6/16.
   */
  var inviteDailyBase = {
    "chart": {
      "lowerLimit": "0",
      "lowerLimitDisplay": "0",
      "numberSuffix": " Users",
      "useSameFillColor": "1",
      "useSameFillBgColor": "1",
      "showGaugeBorder":"0",
      "refreshInterval":"5",
      "ledGap":"0",
      "borderThickness":"0",
      "bgColor":"efefff",
      "bgAlpha":"100"
    },
    "colorRange": {
      "color":[ {
        "code": "#317abe",
      }]
    },
    "value":"0"
  };

  <?php
    $tData = $InitReporter->totalInvites();
    $tVal = $tData['Invitees'];
    $tVal = (is_null($tVal) ? 0 : $tVal);
  ?>
  var invitesDaily = new FusionCharts({
    "type": "hled",
    "renderAt": "chart-invites-today",
    "width": "100%",
    "height": "100",
    "dataFormat": "json",
    "dataSource":inviteDailyBase,
    "value":"<?php echo $tVal ?>"
  });
  invitesDaily.setChartAttribute({
    "dataStreamURL":"transmit.php?act=invite&mode=fusion&which=action",
    "caption": "Invitations Sent Today",
    "upperLimit":"7000"
  });

  invitesDaily.render();

  <?php
  foreach($stateOut as $rState) {
    echo "var invitesDaily".$rState['key']."actors = new FusionCharts({\n";
    echo "\"type\": \"hled\",\n";
    echo "\"renderAt\": \"chart-actors-".$rState['chart']."\",\n";
    echo "\"width\": \"100%\",\n";
    echo "\"height\": \"50\",\n";
    echo "\"dataFormat\": \"json\",\n";
    echo "\"dataSource\":inviteDailyBase\n";
    echo "});\n";
    echo "invitesDaily".$rState['key']."actors.setChartAttribute({\n";
    echo "\"dataStreamURL\":\"transmit.php?act=invite&which=action&mode=fusion&state=".urlencode($rState['url'])."\",\n";
    echo "\"caption\": \"".$rState['name']."\",\n";
    echo "\"upperLimit\":\"500\",\n";
    echo "\"numberSuffix\":\" Bankers\",\n";
    echo "});\n";
    echo "invitesDaily".$rState['key']."actors.render();\n";

echo "var invitesDaily".$rState['key']."invitees = new FusionCharts({\n";
    echo "\"type\": \"hled\",\n";
    echo "\"renderAt\": \"chart-invitees-".$rState['chart']."\",\n";
    echo "\"width\": \"100%\",\n";
    echo "\"height\": \"50\",\n";
    echo "\"dataFormat\": \"json\",\n";
    echo "\"dataSource\":inviteDailyBase\n";
    echo "});\n";
    echo "invitesDaily".$rState['key']."invitees.setChartAttribute({\n";
    echo "\"dataStreamURL\":\"transmit.php?act=invite&which=invitees&mode=fusion&state=".urlencode($rState['url'])."\",\n";
    echo "\"caption\": \"".$rState['name']."\",\n";
    echo "\"upperLimit\":\"5000\",\n";
    echo "\"numberSuffix\":\" Invites\",\n";
    echo "});\n";
    echo "invitesDaily".$rState['key']."invitees.render();\n";
  }
 ?>

</script>
</body>
</html>