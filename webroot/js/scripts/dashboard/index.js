/**
 * Created by rgabriel on 13.05.2017.
 */
$(document).ready(function() {
    var ctx3 = document.getElementById("chart3").getContext("2d");
    var data3 = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(241,202,58,0.2)",
                strokeColor: "#F1CA3A",
                pointColor: "#F1CA3A",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(83,168,251,0.2)",
                strokeColor: "#53A8FB",
                pointColor: "#53A8FB",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    };

    var myRadarChart = new Chart(ctx3).Radar(data3, {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: false,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true,
        tooltipCornerRadius: 2,
        scaleOverride: true,
        scaleSteps: 6,
        scaleStepWidth: 15,
        scaleStartValue: 0,
    });
});