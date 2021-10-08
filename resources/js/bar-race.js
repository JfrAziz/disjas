let echarts = require("echarts");

runRace = function (jsonData) {
    let chartDom = document.getElementById("main");
    let myChart = echarts.init(chartDom);
    let option;

    let startYear = new Date(jsonData[0].month).getFullYear();
    let lastYear = new Date(jsonData[jsonData.length - 1].month).getFullYear();
    let currentData = jsonData
        .filter((item) => item.month.includes(startYear))
        .map((item) => item.migas);

    option = {
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
            max: 11, // only the largest 3 bars will be displayed
        },
        series: [
            {
                realtimeSort: true,
                name: "bulan",
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
        animationEasing: "cubicOut",
        animationEasingUpdate: "linear",
        graphic: {
            elements: [
                {
                    type: "text",
                    right: 160,
                    bottom: 60,
                    style: {
                        text: startYear,
                        font: "bolder 80px monospace",
                        fill: "rgba(100, 100, 100, 0.25)",
                    },
                    z: 100,
                },
            ],
        },
    };

    myChart.setOption(option);

    for (let year = startYear + 1; year <= lastYear; year++) {
        setTimeout(function () {
            updateData(year);
        }, (year - startYear) * 4000);
    }

    function updateData(year) {
        let source = jsonData
            .filter((item) => item.month.includes(year))
            .map((item) => item.migas);
        option.series[0].data = source;
        option.graphic.elements[0].style.text = year;
        myChart.setOption(option);
    }
};
