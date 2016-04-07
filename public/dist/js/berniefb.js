/**
 * Created by khaled on 4/6/16.
 */
var inviteDailyBase = {
  "chart": {
    "lowerLimit": "0",
    "lowerLimitDisplay": "0",
    "numberSuffix": " Invitations",
    "useSameFillColor": "1",
    "useSameFillBgColor": "1",
    "showGaugeBorder":"0",
    "refreshInterval":"3",
    "ledGap":"0"
  },
  "colorRange": {
    "color":[ {
      "code": "#317abe",
    }]
  },
  "value":"0"
};
var invitesDaily = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-today",
  "width": "1000",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDaily.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion",
  "caption": "Invitations Sent Today",
  "upperLimit":"10000"
});
invitesDaily.render();


var invitesDailyWyoming = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-wyoming",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyWyoming.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Wyoming",
  "caption": "Wyoming",
  "upperLimit":"5000"
});
invitesDailyWyoming.render();

var invitesDailyNewYork = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-new-york",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyNewYork.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=New%20York",
  "caption": "New York",
  "upperLimit":"5000"
});
invitesDailyNewYork.render();

var invitesDailyNewJersey = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-new-jersey",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyNewJersey.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=New%Jersey",
  "caption": "New Jersey",
  "upperLimit":"5000"
});
invitesDailyNewJersey.render();

var invitesDailyMaryland = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-maryland",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyMaryland.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Maryland",
  "caption": "Maryland",
  "upperLimit":"5000"
});
invitesDailyMaryland.render();

var invitesDailyPennsylvania = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-pennsylvania",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyPennsylvania.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Pennsylvania",
  "caption": "Pennsylvania",
  "upperLimit":"5000"
});
invitesDailyPennsylvania.render();

var invitesDailyKentucky = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-kentucky",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyKentucky.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Kentucky",
  "caption": "Kentucky",
  "upperLimit":"5000"
});
invitesDailyKentucky.render();

var invitesDailyPuertoRico = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-puerto-rico",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyPuertoRico.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Puerto%20Rico",
  "caption": "Puerto Rico",
  "upperLimit":"5000"
});
invitesDailyPuertoRico.render();

var invitesDailyWestVirginia = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-west-virginia",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyWestVirginia.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=West%20Virginia",
  "caption": "West Virginia",
  "upperLimit":"5000"
});
invitesDailyWestVirginia.render();

var invitesDailyConnecticut = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-connecticut",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyConnecticut.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Connecticut",
  "caption": "Connecticut",
  "upperLimit":"5000"
});
invitesDailyConnecticut.render();

var invitesDailyOregon = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-oregon",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyOregon.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Oregon",
  "caption": "Oregon",
  "upperLimit":"5000"
});
invitesDailyOregon.render();

var invitesDailyRhodeIsland = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-rhode-island",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyRhodeIsland.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Rhode%20Island",
  "caption": "Rhode Island",
  "upperLimit":"5000"
});
invitesDailyRhodeIsland.render();

var invitesDailyDelaware = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-delaware",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyDelaware.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Delaware",
  "caption": "Delaware",
  "upperLimit":"5000"
});
invitesDailyDelaware.render();

var invitesDailyIndiana = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-indiana",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyIndiana.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=Indiana",
  "caption": "Indiana",
  "upperLimit":"5000"
});
invitesDailyIndiana.render();

var invitesDailyCalifornia = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-california",
  "width": "450",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyBase
});
invitesDailyCalifornia.setChartAttribute({
  "dataStreamURL":"transmit.php?act=invite&mode=fusion&state=[NEW!]%20California",
  "caption": "California",
  "upperLimit":"5000"
});
invitesDailyCalifornia.render();