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
                name: 'Harga Saham UNVR'
            },
            {
                name: 'Rasio Kasus Baru / Spesimen'
            }
        ],
        dataset: {
            source: jsonData,
        },
        series: [
            {
                type: "line",
                name: "unvr",
                smooth: true,
                endLabel: {
                    show: true,
                    formatter: function (params) {
                        return `Harga Saham UNVR : ${params.data.unvr}`;
                    },
                },
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
                endLabel: {
                    show: true,
                    formatter: function (params) {
                        return `Rasio Kasus Baru / Spesimen : ${params.data.rasio}`;
                    },
                },
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
                yAxisIndex: 1,
                encode: {
                    x: "tanggal",
                    y: "reg_rasio",
                },
            },
        ],
    };
    lineRace.setOption(lineRaceOption);
};