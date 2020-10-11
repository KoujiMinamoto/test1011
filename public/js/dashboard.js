// function initPage() {

//     var start = "2020-09-01"
//     var end = "2020-10-10";
//     getNumberofOrders();
//     getNumOfClients();
//     generateIncomeBarChart(start, end);
//     getAmount();
//     $('#nowdate').html(getNowFormatDate()); 
//     //generateTable(start, end);

// }
function getNumberofOrders(){
    $.ajax({
        url: "api/getNumOfOrders",
        type: "GET",
        success: function (response) {
            $('#totalOrder').html(response);
        }
    });
}
function getNumberofOrdersByUser(user){
    $.ajax({
        url: "api/getNumOfOrdersByUser/"+user,
        type: "GET",
        success: function (response) {
            $('#totalOrder_user').html(response);
        }
    });
}

function getNumOfClients(){
    $.ajax({
        url: "api/getNumOfClients",
        type: "GET",
        success: function (response) {
            $('#totalUser').html(response);
        }
    });
}
function getAmount(){
    $.ajax({
        url: "api/getAmount",
        type: "GET",
        success: function (response) {
            $('#totalAmount').html('$ ' + response);
        }
    });
}
function getAmountByUser(user){
    $.ajax({
        url: "api/getAmountByUser/"+user,
        type: "GET",
        success: function (response) {
            $('#totalAmount_user').html('$ ' + response);
        }
    });
}

function generateIncomeBarChart(startDate, endDate) {
    var barChart = function() {
        var initBarChart = function() {
            $.ajax({
                url:'api/getOrderAndAmountByMonth/' + startDate + '/' + endDate,
                dataType: 'JSON',
                data: {get_values: true},
                success: function(yearlyOrders){
                    var labels = [];
                    var countData = [];
                    var amountData = [];
                    for (const [year, monthlyOrders] of Object.entries(yearlyOrders)) {
                        for (const [month, order] of Object.entries(monthlyOrders)) {
                            labels.push(year + "-" + month);
                            countData.push(order.count);
                            amountData.push(order.amount);
                        }
                    }
                    var digramData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Num of Orders',
                                borderColor: 'rgb(54, 162, 235)',
                                backgroundColor: 'rgb(54, 162, 235)',
                                fill: false,
                                data: countData,
                                yAxisID: 'y-axis-1',
                                type: 'line'
                            },
                            {
                                label: 'Total Amount',
                                borderColor: 'rgb(255, 205, 86)',
                                backgroundColor: 'rgb(255, 205, 86)',
                                fill: false,
                                data: amountData,
                                yAxisID: 'y-axis-2'
                            },

                        ]
                    };

                    if (Chart.instances[0] != undefined){
                        Chart.instances[0].data = digramData;
                        Chart.instances[0].update();
                    }
                    else {
                        var chart = document.getElementById('income-month-bar-chart').getContext('2d');
                        var barChart = Chart.Bar(chart, {
                            data: digramData,
                            options: {
                                bDestroy: true,
                                responsive: true,
                                hoverMode: 'index',
                                stacked: false,
                                title: {
                                    display: false,
                                    text: 'Title'
                                },
                                scales: {
                                    yAxes: [{
                                        type: 'linear',
                                        display: true,
                                        position: 'left',
                                        id: 'y-axis-1',
                                    }, {
                                        type: 'linear',
                                        display: true,
                                        position: 'right',
                                        id: 'y-axis-2',
                                        gridLines: {
                                            drawOnChartArea: false,
                                        }
                                    }]
                                }
                            }
                        });
                    }
                }
            });
        };
        return {
            init: function () {
                initBarChart();
            },
        };
    }();
    barChart.init();
}

function generateIncomeBarChartByUser(startDate, endDate,user) {
    var barChart = function() {
        var initBarChart = function() {
            $.ajax({
                url:'api/getOrderAndAmountByMonthUser/' + startDate + '/' + endDate + '/' + user,
                dataType: 'JSON',
                data: {get_values: true},
                success: function(yearlyOrders){
                    var labels = [];
                    var countData = [];
                    var amountData = [];
                    for (const [year, monthlyOrders] of Object.entries(yearlyOrders)) {
                        for (const [month, order] of Object.entries(monthlyOrders)) {
                            labels.push(year + "-" + month);
                            countData.push(order.count);
                            amountData.push(order.amount);
                        }
                    }
                    var digramData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Num of Orders',
                                borderColor: 'rgb(54, 162, 235)',
                                backgroundColor: 'rgb(54, 162, 235)',
                                fill: false,
                                data: countData,
                                yAxisID: 'y-axis-1',
                                type: 'line'
                            },
                            {
                                label: 'Total Amount',
                                borderColor: 'rgb(255, 205, 86)',
                                backgroundColor: 'rgb(255, 205, 86)',
                                fill: false,
                                data: amountData,
                                yAxisID: 'y-axis-2'
                            },

                        ]
                    };

                        var chart = document.getElementById('income-month-bar-chart-user').getContext('2d');
                        if (
                            barChart !== undefined
                            &&
                            barChart !== null
                        ) {
                            barChart.destroy();
                        }
                        var barChart = Chart.Bar(chart, {
                            data: digramData,
                            options: {
                                bDestroy: true,
                                responsive: true,
                                hoverMode: 'index',
                                stacked: false,
                                title: {
                                    display: false,
                                    text: 'Title'
                                },
                                scales: {
                                    yAxes: [{
                                        type: 'linear',
                                        display: true,
                                        position: 'left',
                                        id: 'y-axis-1',
                                    }, {
                                        type: 'linear',
                                        display: true,
                                        position: 'right',
                                        id: 'y-axis-2',
                                        gridLines: {
                                            drawOnChartArea: false,
                                        }
                                    }]
                                }
                            }
                        });
                    
                }
            });
        };
        return {
            init: function () {
                initBarChart();
            },
        };
    }();
    barChart.init();
}

function getNowFormatDate() {
    var date = new Date();
    var seperator = "-";
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = year + seperator + month + seperator + strDate;
    return currentdate;
}

function onclickHeader(headerName) {
    onreset();
    reset();
    switch (headerName) {
        //product
        case 0:
            $(".nav-dashboard_id").addClass("clickOn");
            document.getElementById("dashboard_div_id").style.display = "block";
            break;
        case 1:
            $(".nav-profile_id").addClass("clickOn");
            document.getElementById("profile_div_id").style.display = "block";
            break;
        case 2:
            
            document.getElementById("homepage_div_id").style.display = "block";
            $(".home").addClass("clickOn");
            $("#login_id").html('dashboard');
            $("#register_id").html('logout');
            document.getElementById("home_div_id").style.display = "block";
            document.getElementById("dashboard_user_div_id").style.display = "none";
            document.getElementById("dashboard_admin_div_id").style.display = "none";
            break;
        default :
            break;
    } 
    
}
function onreset() {
    $(".nav-dashboard_id").removeClass("clickOn");
    $(".nav-profile_id").removeClass("clickOn");
    document.getElementById("dashboard_div_id").style.display = "none";
    document.getElementById("profile_div_id").style.display = "none";
    
    
}

// function generateTable(startDate, endDate) {
//     var table = function(){
//         var inittable = function(){

//             $.ajax({
//                 url:'api/getAllOrder/' + startDate + '/' + endDate,
                 
//             });

//         }
//     }
//     // $('#table_orders').DataTable( {
//     //     ajax: {
//     //         url: 'api/getAllOrder/' + startDate + '/' + endDate,
           
//     //     },
//     // } );
// }



function initDashboard(msg) {
    
    var start = "2020-09-01"
    var end = "2020-10-12";
    var user =msg.username;
    var userType = msg.type;
    if(userType == "1"){
    getNumberofOrders();
    getNumOfClients();
    generateIncomeBarChart(start, end);
    $('#nowdate').html(getNowFormatDate());
    getAmount();
    $('#table_orders').DataTable( {
        destroy: true,
        ajax: {
            url: 'api/getAllOrder/' + start + '/' + end,
            dataSrc: ""
        },
        columns: [
            { data: "order_user" },
            { data: "order_price" },
            { data: "order_id" },
            { data: "order_type" }
        ]
    } );
    $('#table_users').DataTable( {
        destroy: true,
            ajax: {
                url: 'api/getAllUser',
                dataSrc: ""
            },
            columns: [
                { data: "user_name" },
                { data: "user_type" },
                { data: "user_email" },
                { data: "user_phonenum" }
            ]
    } );
    }
    else{
    getAmountByUser(user);
    getNumberofOrdersByUser(user);
    generateIncomeBarChartByUser(start,end,user)

    $('#nowdate').html(getNowFormatDate()); 

    $('#table_orders_user').DataTable( {
        destroy: true,
        ajax: {
            url: 'api/getAllOrderByUser/' + user,
            dataSrc: ""
        },
        columns: [
            { data: "order_user" },
            { data: "order_price" },
            { data: "order_id" },
            { data: "order_type" }
        ]
    } );

    }
    
    

    
    
};