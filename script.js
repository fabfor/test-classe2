$(document).ready(function(){
  var config = {
    type: 'line',
    data: {
      labels: ['Gennaio','Febbraio'],
      datasets : [
        {
          label: 'Vendite',
          data: [1000,2000],
          borderColor: 'red',
          backgroundColor: 'green'
        }
      ]
    }
  };

  var myLineChart = new Chart($('#chart'),config)
});
