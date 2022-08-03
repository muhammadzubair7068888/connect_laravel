function weight_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    // weight
    var options = {
        chart: {
            id: 'weight',
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "weight",
            data: weight
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {
            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' +
                currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' +
                currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth +
            '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
            currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth +
            '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' +
            currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' +
            '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' +
            currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth +
            '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' +
            currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth +
            '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' +
            currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth +
            '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' +
            currentMonth + '-' + '28'
            ],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: 2445 + 200,
        },
        legend: {
            position: "top",
            horizontalAlign: "right",

        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#weight"), options);
    chart.render();
    chart.updateSeries([{
        name: 'weight',
        data: data,
    }]);

}


function arm_pain_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    var options = {
        chart: {
            id: "arm_pain",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: max_arm_pain + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -0,
            offsetX: -0
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#arm_pain"), options);
    chart.render();
    chart.updateSeries([{
        name: 'arm_pain',
        data: data,
    }]);
}


function standing_long_toss_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    var options = {
        chart: {
            id: "standing_long_toss",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' +
                currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' +
                currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth +
            '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
            currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth +
            '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' +
            currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' +
            '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' +
            currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth +
            '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' +
            currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth +
            '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' +
            currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth +
            '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' +
            currentMonth + '-' + '28'
            ],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: " "
            },
            min: -1.0,
            max: max_pull_down_velocity + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -0,
            offsetX: -0
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#pull_down_velocity"), options);
    chart.render();

    chart.updateSeries([{
        name: 'standing_long_toss',
        data: data,
    }]);
}

function mound_throws_velocity_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    // Mound throws Velocity
    var options = {
        chart: {
            id: "mound_throws_velocity",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: 2454 + 200
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -0,
            offsetX: -0
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#mound_throws_velocity"), options);
    chart.render();

    chart.updateSeries([{
        name: 'mound_throws_velocity',
        data: data,
    }]);
}

function pull_down_3_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    var options = {
        chart: {
            id: "pull_down_3",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }

        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: max_pull_down_3 + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -900,
            offsetX: -0
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#pull_down_3"), options);
    chart.render();
    chart.updateSeries([{
        name: 'pull_down_3',
        data: data,
    }]);
}

function pull_down_4_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';

    var options = {
        chart: {
            id: "pull_down_4",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "pull_down_4",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: max_pull_down_4 + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#pull_down_4"), options);
    chart.render();

    chart.updateSeries([{
        name: 'pull_down_4',
        data: data,
    }]);
}
function pull_down_5_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';

    var options = {
        chart: {
            id: "pull_down_5",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: max_pull_down_5 + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#pull_down_5"), options);
    chart.render();

    chart.updateSeries([{
        name: 'pull_down_5',
        data: data,
    }]);
}
function pull_down_6_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    // Pull Downs 6
    var options = {
        chart: {
            id: "pull_down_6",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: max_pull_down_6 + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#pull_down_6"), options);
    chart.render();

    chart.updateSeries([{
        name: 'pull_down_6',
        data: data,
    }]);
}

function pull_down_7_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';
    var options = {
        chart: {
            id: "pull_down_7",
            height: 380,
            type: "line",
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: [3, 3],
            curve: "straight"
        },
        series: [{
            name: "",
            data: data,
        },],
        title: {
            text: "",
            align: "left",
            style: {
                fontWeight: "500"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f1f1"
        },
        markers: {
            style: "inverted",
            size: 6
        },
        xaxis: {

            categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
            '' + currentYear + '-' + currentMonth + '-' + '5', '' + currentYear + '-' + currentMonth + '-' + '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' + currentYear + '-' + currentMonth + '-' + '8',
            '' + currentYear + '-' + currentMonth + '-' + '9', '' + currentYear + '-' + currentMonth + '-' + '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' + currentYear + '-' + currentMonth + '-' + '12', '' +
            currentYear + '-' + currentMonth + '-' + '13', '' + currentYear + '-' + currentMonth + '-' + '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' + currentYear + '-' + currentMonth + '-' + '16',
            '' + currentYear + '-' + currentMonth + '-' + '17', '' + currentYear + '-' + currentMonth + '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19', '' + currentYear + '-' + currentMonth + '-' + '20',
            '' + currentYear + '-' + currentMonth + '-' + '21', '' + currentYear + '-' + currentMonth + '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23', '' + currentYear + '-' + currentMonth + '-' + '24',
            '' + currentYear + '-' + currentMonth + '-' + '25', '' + currentYear + '-' + currentMonth + '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27', '' + currentYear + '-' + currentMonth + '-' + '28'],
            title: {
                text: "Month"
            }
        },
        yaxis: {
            title: {
                text: ""
            },
            min: -1.0,
            max: max_pull_down_7 + 1
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: !1
                    }
                },
                legend: {
                    show: !1
                }
            }
        }]
    },
        chart = new ApexCharts(document.querySelector("#pull_down_7"), options);
    chart.render();

    chart.updateSeries([{
        name: 'pull_down_7',
        data: data,
    }]);
}

function pull_down_5_respon(data) {
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1;
    const date = '' + currentYear + '-' + currentMonth + '-' + '1';


    chart.updateSeries([{
        name: 'pull_down_5',
        data: data,
    }]);
}