let echarts = require("echarts");

let chartDom = document.getElementById("chart-container");
let myChart = echarts.init(chartDom);
let currentData = new Array(12).fill(0);

let option = {
    tooltip: {
        trigger: "axis",
        axisPointer: {
            type: "shadow",
        },
    },
    xAxis: {
        max: "dataMax",
    },
    yAxis: {
        type: "category",
        data: [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ],
        inverse: true,
        animationDuration: 300,
        animationDurationUpdate: 300,
        max: 11, 
    },
    series: [
        {
            realtimeSort: true,
            type: "bar",
            data: currentData,
            label: {
                show: true,
                position: "right",
                valueAnimation: true,
            },
        },
    ],
    legend: {
        show: true,
    },
    animationDuration: 0,
    animationDurationUpdate: 3000,
    animationEasing: "linear",
    animationEasingUpdate: "linear",
    graphic: {
        elements: [
            {
                type: "text",
                right: 160,
                bottom: 60,
                style: {
                    text: "year",
                    font: "bolder 80px monospace",
                    fill: "rgba(100, 100, 100, 0.25)",
                },
                z: 100,
            },
        ],
    },
};

resetRace = function () {
    myChart.dispose();
    myChart = echarts.init(chartDom);
};

runRace = function (jsonData) {
    let currentChartID = myChart.id
    let startYear = new Date(jsonData[0].month).getFullYear();
    let lastYear = new Date(jsonData[jsonData.length - 1].month).getFullYear();

    myChart.setOption(option);

    for (let year = startYear; year <= lastYear; year++) {
        setTimeout(function () {
            updateData(year);
        }, (year - startYear) * 3500);
    }

    function updateData(year) {
        if (currentChartID !== myChart.id) return;
        let source = jsonData
            .filter((item) => item.month.includes(year))
            .map((item) => item.import);
        option.series[0].data = source;
        option.graphic.elements[0].style.text = year;
        myChart.setOption(option);
    }
};

window.onresize = function () {
    myChart.resize();
};
