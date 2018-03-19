var chart;

function makeChart() {
	chart = new CanvasJS.Chart("chartContainer", { 
        zoomEnabled: true,
		title: {
			text: "EURO->RON "
        },
        axisY: {
            includeZero: false
        },
		data: [
		{
			type: "spline",
			dataPoints: [
				{ y : 1 },
				{ y : 2 },
				{ y : 3 },
				{ y : 4 }
			]
		}
		]
	});
    chart.render();
}

function addPoint() {

	var length = chart.options.data[0].dataPoints.length;
	chart.options.data[0].dataPoints.push({ y: 25 - Math.random() * 10});
	chart.render();

}
    
function updatePoint() {

	var length = chart.options.data[0].dataPoints.length;
	chart.options.data[0].dataPoints[length-1].y = 15 - Math.random() * 10;
	chart.render();

}    