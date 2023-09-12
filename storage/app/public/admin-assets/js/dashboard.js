// Admin -------- users-chart-script
// VendorAdmin -------- orders-count-chart-script
createdoughnut(doughnutlabels, doughnutdata);
$('#doughnutyear').on('change', function () {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $("#doughnutyear").attr('data-url'),
        method: "GET",
        data: {
            doughnutyear: $("#doughnutyear").val()
        },
        dataType: "JSON",
        success: function (data) {
            createdoughnut(data.doughnutlabels, data.doughnutdata)
        },
        error: function (data) {
            toastr.error(wrong);
            return false;
        }
    });
});
function createdoughnut(doughnutlabels, doughnutdata) {
    "use strict";
  
    const chartdata = {
      labels: doughnutlabels,
      datasets: [
        {
          backgroundColor: [
            'rgba(255, 99, 132,)',
            'rgba(255, 159, 64,)',
            'rgba(255, 205, 86,)',
            'rgba(75, 192, 192,)',
            'rgba(54, 162, 235,)',
            'rgba(153, 102, 255,)',
            'rgba(201, 203, 207,)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1,
          hoverOffset: 5,
          data: doughnutdata
        }
      ]
    };

    const config = {
      type: "bar",
  
      data: chartdata,
  
      options: {
        plugins:{
         legend: {
          display: false
         }
        }
       }
    };
  
    if (doughnut != null) {
      doughnut.destroy();
    }
  
    if (document.getElementById("doughnut")) {
      doughnut = new Chart(document.getElementById("doughnut"), config);
    }
  }
// Admin ------ revenue-by-plans-chart-script
// vendorAdmin ------ revenue-by-orders-script
createrevenueChart(labels, revenuedata);
$('#revenueyear').on('change', function () {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $("#revenueyear").attr('data-url'),
        method: "GET",
        data: {
            revenueyear: $("#revenueyear").val()
        },
        dataType: "JSON",
        success: function (data) {
            createrevenueChart(data.revenuelabels, data.revenuedata)
        },
        error: function (data) {
            toastr.error(wrong);
            return false;
        }
    });
});
function createrevenueChart(labels, revenuedata, year) {
    "use strict";

    const chartdata = {
        labels: labels,
        datasets: [
        {
            label: 'Revenue',
            borderColor: "#fbd6bd",
            tension: 0.1,
            pointBackgroundColor: "#F15A24",
            pointBorderColor: "#F15A24",
            data: revenuedata
        }
        ]
    };

    const config = {
        type: 'line',
        data: chartdata,
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: false
            },
          }
        },
    };

    if (revenuechart != null) {
        revenuechart.destroy();
    }
    if (document.getElementById('revenuechart')) {
        revenuechart = new Chart(document.getElementById('revenuechart'), config);
    }
}