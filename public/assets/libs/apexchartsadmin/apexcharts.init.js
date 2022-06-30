/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/pages/apexcharts.init.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/apexcharts.init.js ***!
  \***********************************************/
/***/ (function() {
const currentYear = new Date().getFullYear();
const currentMonth = new Date().getMonth() + 1;
      const date = '' + currentYear + '-' + currentMonth + '-' + '1';
      // weight
var options = {
  chart: {
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
    name: "Weight",
    data: weight//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Weight",
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
      text: "weight"
    },
    min: 5,
    max: 40000
  },
  legend: {
    position: "top",
    horizontalAlign: "right",
    floating: !0,
    offsetY: -10000,
    offsetX: 0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel1"), options);
  chart.render();
// Arm Pain
   options = {
  chart: {
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
    name: "Aram Pain",
    data: arm_pain//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Arm Pain",
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
      text: "Arm Pain"
    },
    min: 0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel2"), options);
      chart.render();

      // Standing Long Toss 

      // Arm Pain
   options = {
  chart: {
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
    name: "Standing Long Toss",
    data: standig_long_toss//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Standing Long Toss",
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
      text: "Standing Long Toss"
    },
    min: 0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel3"), options);
      chart.render();

      // Mound throws Velocity
    
   options = {
  chart: {
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
    name: "Mount Throw Velocit",
    data: mount_throw_velocit//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Mount Throw Velocit",
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
      text: "Mount Throw Velocit"
    },
    min: 0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel4"), options);
      chart.render();
         //Pull Down 3 
      
   options = {
  chart: {
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
    name: "Pull Down 3",
    data: pull_down_3//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Pull Down 3",
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
      text: "Pull Down 3"
    },
    min: 0,
    max: 3000
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel5"), options);
      chart.render();
   //Pull Down 4
      
   options = {
  chart: {
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
    name: "Pull Down 4",
    data: pull_down_4//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Pull Down 4",
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
      text: "Pull Down 4"
    },
    min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel6"), options);
      chart.render();
      //Pull Down 5 
      
   options = {
  chart: {
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
    name: "Pull Down 5",
    data: pull_down_5//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Pull Down 5",
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
      text: "Pull Down 5"
    },
   min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel7"), options);
      chart.render();
      // Pull Downs 6
     
   options = {
  chart: {
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
    name: "Pull Down 6",
    data: pull_down_6//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Pull Down 6",
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
      text: "Pull Down 6"
    },
   min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel8"), options);
      chart.render();
      
      // Pull Downs 7 
    
   options = {
  chart: {
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
    name: "Pull Down 7",
    data: pull_down_7//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Pull Down 7",
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
      text: "Pull Down 7"
    },
    min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel9"), options);
      chart.render();

      // Double Crow Hop Distance
   
   options = {
  chart: {
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
    name: "Double Crow Hop Distance",
    data: double_crow_hop_distance//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Double Crow Hop Distance",
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
      text: "Double Crow Hop Distance"
    },
     min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel10"), options);
      chart.render();
      // Kneeling Long Toss
      // Arm Pain
   options = {
  chart: {
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
    name: "Kneeling Long Toss",
    data: kneeling_long_toss//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Kneeling Long Toss",
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

    categories: ['' + currentYear + '-' + currentMonth + '-' + '1',  '' + currentYear + '-' + currentMonth + '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3', '' + currentYear + '-' + currentMonth + '-' + '4',
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
      text: "Kneeling Long Toss"
    },
   min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel11"), options);
      chart.render();

      //Seated Long Toss
    
   options = {
  chart: {
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
    name: "Seated Long Toss",
    data: seated_long_toss//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Seated Long Toss",
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
      text: "Seated Long Toss"
    },
    min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel12"), options);
      chart.render();

      // Bench
  
   options = {
  chart: {
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
    name: "Bench",
    data: bench//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Bench",
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
      text: "Bench"
    },
  min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel13"), options);
      chart.render();

      //Mound Shuffle
    
   options = {
  chart: {
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
    name: "Mound Shuffle",
    data: mound_ahuffle//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Mound Shuffle",
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
      text: "Mound Shuffle"
    },
  min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel14"), options);
      chart.render();

      // Squat

   options = {
  chart: {
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
    name: "Squat",
    data: squat//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Squat",
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
      text: "Squat"
    },
   min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel15"), options);
      chart.render();

      // Pull Ups
   options = {
  chart: {
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
    name: "Pull Ups",
    data: pull_ups//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Pull Ups",
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
      text: "Pull Ups"
    },
  min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel16"), options);
      chart.render();
      
      //Vertical Jump
   options = {
  chart: {
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
    name: "Vertical Jump",
    data: vertical_jump//[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Vertical Jump",
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
      text: "Vertical Jump"
    },
  min: -1.0,
    max: 1.0
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel17"), options);
      chart.render();

      // Vertical Jump
      // Arm Pain
   options = {
  chart: {
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
    name: "Weight",
    data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
  }, ],
  title: {
    text: "Weight",
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
      text: "Wight"
    },
    min: 5,
    max: 40
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
  chart = new ApexCharts(document.querySelector("#line_chart_datalabel18"), options);
      chart.render();


/***/ }),

/***/ "./resources/scss/bootstrap.scss":
/*!***************************************!*\
  !*** ./resources/scss/bootstrap.scss ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/icons.scss":
/*!***********************************!*\
  !*** ./resources/scss/icons.scss ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/bootstrap-dark.scss":
/*!********************************************!*\
  !*** ./resources/scss/bootstrap-dark.scss ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/app-dark.scss":
/*!**************************************!*\
  !*** ./resources/scss/app-dark.scss ***!
  \**************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	!function() {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = function(result, chunkIds, fn, priority) {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every(function(key) { return __webpack_require__.O[key](chunkIds[j]); })) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/pages/apexcharts.init": 0,
/******/ 			"assets/css/app-dark": 0,
/******/ 			"assets/css/app": 0,
/******/ 			"assets/css/bootstrap-dark": 0,
/******/ 			"assets/css/icons": 0,
/******/ 			"assets/css/bootstrap": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = function(chunkId) { return installedChunks[chunkId] === 0; };
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some(function(id) { return installedChunks[id] !== 0; })) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkskote"] = self["webpackChunkskote"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/app-dark","assets/css/app","assets/css/bootstrap-dark","assets/css/icons","assets/css/bootstrap"], function() { return __webpack_require__("./resources/js/pages/apexcharts.init.js"); })
/******/ 	__webpack_require__.O(undefined, ["assets/css/app-dark","assets/css/app","assets/css/bootstrap-dark","assets/css/icons","assets/css/bootstrap"], function() { return __webpack_require__("./resources/scss/bootstrap.scss"); })
/******/ 	__webpack_require__.O(undefined, ["assets/css/app-dark","assets/css/app","assets/css/bootstrap-dark","assets/css/icons","assets/css/bootstrap"], function() { return __webpack_require__("./resources/scss/icons.scss"); })
/******/ 	__webpack_require__.O(undefined, ["assets/css/app-dark","assets/css/app","assets/css/bootstrap-dark","assets/css/icons","assets/css/bootstrap"], function() { return __webpack_require__("./resources/scss/app.scss"); })
/******/ 	__webpack_require__.O(undefined, ["assets/css/app-dark","assets/css/app","assets/css/bootstrap-dark","assets/css/icons","assets/css/bootstrap"], function() { return __webpack_require__("./resources/scss/bootstrap-dark.scss"); })
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/app-dark","assets/css/app","assets/css/bootstrap-dark","assets/css/icons","assets/css/bootstrap"], function() { return __webpack_require__("./resources/scss/app-dark.scss"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;