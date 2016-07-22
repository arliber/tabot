'use strict';

//Load KPIs
console.log('Requesting KPIs..');
$.ajax({
    type: 'GET',
    url: 'dashboard.php',
    data: {
        action: 'getKPIs'
    },
    success: function(data){
        console.log(data);
        
        $("#totalUsers").html(data.data.users);
        $("#totalMessages").html(data.data.messages);
        createChart(data.data.activity);
        
    },
    error: function(error) {
        console.error('Error loading KPIs');
    }
});

//Load users
console.log('Requesting users..');
$.ajax({
    type: 'GET',
    url: 'dashboard.php',
    data: {
        action: 'getUsers'
    },
    success: function(data){
        console.log(data);
        
        var options = $("#userId");
        $("#userId option[value='loading']").remove();
        data.data.forEach(function(user) {
            options.append($("<option />").val(user.userId).text(user.userId));
        });
        
    },
    error: function(error) {
        console.error('Error loading KPIs');
    }
});

//Bind message send action
$("#sendMessage").click(function(){
    var data = {
            action: 'sendMessage',
            message: $('#message').val(),
            userId: $("#userId").val()
    };
    
    console.log('Sending message', data);
    
    $.ajax({
        type: 'GET',
        url: 'dashboard.php',
        data: data,
        success: function(data){
            console.log(data);
            $('#message').val('');
        },
        error: function(error) {
            console.log('Unable to send message', error);
        }
    });
});

//Create chart function
function createChart(activity) {
    
    var labels = [],
        values = [];
        
    activity.forEach(function(day){
        labels.push(day.created);
        values.push(day.messages);
    });
    
    var ctx = document.getElementById("activityChart");

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Messagaes that day",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,
                    hoverBackgroundColor: "rgba(255,99,132,0.4)",
                    hoverBorderColor: "rgba(255,99,132,1)",
                    data: values,
                }
            ]
        },
        options: {
            cutoutPercentage: 60,
            legend: {
                display: false
            }
        }
    });
}