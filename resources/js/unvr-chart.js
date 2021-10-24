let echarts = require("echarts");

let chartLineContainer = document.getElementById("chart-line-container");
let lineRace = echarts.init(chartLineContainer);

runLineChart = function (jsonData) {
    let lineRaceOption = {
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
        yAxis: [
            {
                name: "Harga Saham UNVR",
            },
            {
                name: "Rasio Kasus Baru / Spesimen",
            },
        ],
        dataset: {
            source: jsonData,
        },
        legend: {
            bottom: 5,
        },
        series: [
            {
                type: "line",
                name: "unvr",
                smooth: true,
                labelLayout: {
                    moveOverlap: "shiftY",
                },
                emphasis: {
                    focus: "series",
                },
                encode: {
                    x: "tanggal",
                    y: "unvr",
                    itemName: "tanggal",
                    tooltip: ["unvr"],
                },
            },
            {
                type: "line",
                name: "model unvr",
                symbolSize: 0.1,
                symbol: "circle",
                lineStyle: {
                    width: 1,
                    type: "dashed",
                },
                endLabel: {
                    show: true,
                    formatter: function (params) {
                        return `Y = 7061.517 -104.272X`;
                    },
                },
                encode: {
                    x: "tanggal",
                    y: "reg_unvr",
                },
            },
            {
                type: "line",
                name: "rasio kasus baru / spesimen",
                yAxisIndex: 1,
                smooth: true,
                labelLayout: {
                    moveOverlap: "shiftY",
                },
                emphasis: {
                    focus: "series",
                },
                encode: {
                    x: "tanggal",
                    y: "rasio",
                    itemName: "tanggal",
                    tooltip: ["rasio"],
                },
            },
            {
                type: "line",
                name: "model rasio kasus baru / spesimen",
                symbolSize: 0.1,
                symbol: "circle",
                yAxisIndex: 1,
                endLabel: {
                    show: true,
                    formatter: function (params) {
                        return `Y = 11.711 -0.097X`;
                    },
                },
                lineStyle: {
                    width: 1,
                    type: "dashed",
                },
                encode: {
                    x: "tanggal",
                    y: "reg_rasio",
                },
            },
        ],
    };
    lineRace.setOption(lineRaceOption);
};

window.onresize = function () {
    lineRace.resize();
};
