let echarts = require("echarts");

let chartRaceContainer = document.getElementById("chart-race-container");
let chartLineContainer = document.getElementById("chart-line-container");
let barRace = echarts.init(chartRaceContainer);
let lineRace = echarts.init(chartLineContainer);
let currentMonthData = new Array(12).fill(0);

const monthsColor = {
    Januari: "#CFC3C2",
    Februari: "#FC6AE6",
    Maret: "#99515C",
    April: "#C489B4",
    Mei: "#99486B",
    Juni: "#CCB1BE",
    Juli: "#E84D69",
    Agustus: "#B872AB",
    September: "#B52269",
    Oktober: "#E66CBB",
    November: "#F05446",
    Desember: "#D14030",
};

let barRaceOption = {
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
            data: currentMonthData,
            itemStyle: {
                color: function (param) {
                    return monthsColor[param.name] || "#CFC3C2";
                },
            },
            label: {
                show: true,
                position: "right",
                valueAnimation: true,
                formatter: "$ {c}",
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
    barRace.dispose();
    barRace = echarts.init(chartRaceContainer);
    lineRace.dispose()
    lineRace = echarts.init(chartLineContainer)
};

runRace = function (jsonData, attribute) {
    let currentChartID = barRace.id;
    let startYear = new Date(jsonData[0].month).getFullYear();
    let lastYear = new Date(jsonData[jsonData.length - 1].month).getFullYear();

    barRace.setOption(barRaceOption);

    for (let year = startYear; year <= lastYear; year++) {
        setTimeout(function () {
            updateData(year);
        }, (year - startYear) * 3500);
    }

    function updateData(year) {
        if (currentChartID !== barRace.id) return;
        let source = jsonData
            .filter((item) => item.month.includes(year))
            .map((item) => item.import);
        barRaceOption.series[0].data = source;
        barRaceOption.graphic.elements[0].style.text = `${attribute} ${year}`;
        barRace.setOption(barRaceOption);
    }
};

runLineChart = function (jsonData) {
    let lineRaceOption = {
        animationDuration: 20000,
        grid: {
            right: 140,
        },
        tooltip: {
            order: "valueDesc",
            trigger: "axis",
        },
        xAxis: {
            type: "category",
            nameLocation: "middle",
        },
        yAxis: {},
        dataset: {
            source: jsonData,
        },
        series: [
            {
                type: "line",
                name: "migas",
                smooth: true,
                endLabel: {
                    show: true,
                    formatter: function (params) {
                        return `migas : ${params.data.migas}`;
                    },
                },
                labelLayout: {
                    moveOverlap: "shiftY",
                },
                emphasis: {
                    focus: "series",
                },
                encode: {
                    x: "month",
                    y: "migas",
                    itemName: "month",
                    tooltip: ["migas"],
                },
            },
            {
                type: "line",
                name: "non migas",
                smooth: true,
                endLabel: {
                    show: true,
                    formatter: function (params) {
                        return `non migas : ${params.data.non_migas}`;
                    },
                },
                labelLayout: {
                    moveOverlap: "shiftY",
                },
                emphasis: {
                    focus: "series",
                },
                encode: {
                    x: "month",
                    y: "migas",
                    itemName: "month",
                    tooltip: ["migas"],
                },
                encode: {
                    x: "month",
                    y: "non_migas",
                    itemName: "non_migas",
                    tooltip: ["non_migas"],
                },
            },
        ],
    };
    lineRace.setOption(lineRaceOption);
};

window.onresize = function () {
    barRace.resize();
    lineRace.resize();
};
