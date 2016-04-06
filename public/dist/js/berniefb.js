/**
 * Created by khaled on 4/6/16.
 */
var inviteDailyTotal = {
  "chart": {
    "caption": "Invitations Sent Today",
    "lowerLimit": "0",
    "upperLimit": "500000",
    "lowerLimitDisplay": "0",
    "numberSuffix": " Invitations",
    "useSameFillColor": "1",
    "useSameFillBgColor": "1",
    "ledGap":"0"
  },
  "colorRange": {
    "color": [
      {
        "minValue": "0",
        "maxValue": "100000",
        "code": "#88f001"
      },
      {
        "minValue": "100000",
        "maxValue": "300000",
        "code": "#f2e719"
      },
      {
        "minValue": "3000000",
        "maxValue": "5000000",
        "code": "#ff1a31"
      }
    ]
  },
  "value":"100000"
};
var invitesDaily = new FusionCharts({
  "type": "hled",
  "renderAt": "chart-invites-today",
  "width": "1000",
  "height": "100",
  "dataFormat": "json",
  "dataSource":inviteDailyTotal
});

invitesDaily.render();
