const url = "http://localhost:8000";


let ballIndex = 1;
let maxIndex = 0;
let x = 0;
let lastPosition;
let lastAngle;

$('#horizontal_sl').slider({
    formatter: function(value) {
        return 'Čas: ' + value;
    }

});

$("#horizontal_sl").on("slideStart", function(slideEvt) {
    $("#horizontal_sl_value").val(slideEvt.value);
});
$("#horizontal_sl").on("slide", function(slideEvt) {
    $("#horizontal_sl_value").val(slideEvt.value);
});


Plotly.newPlot('g', [{
    x: [0],
    y: [0],
    type: 'line',
    name: 'position',
    line: {
        color: 'rgb(0,0,255)',
        width: 2
    }
}], {});

Plotly.plot("g", [{
    x: [0],
    y: [0],
    type: 'line',
    name: 'angle',
    line: {
        color: 'rgb(255,0,0)',
        width: 2
    }
}]);



function callConsole() {

    var text = $('textarea#command').val();
    var data = {
        'command': text
    };

    ajaxCall("POST", url + "/api/octave/execute?apikey=12345678910", JSON.stringify(data), callConsoleResponse)
}

function callConsoleResponse(data) {
    $('textarea#response').val(data.result);
}

function getDataForBall() {
    r = $('input#r').val();

    ajaxCall("GET", url + "/api/octave/ball?apikey=12345678910&r=" + r + "&startPosition=" + lastPosition + "&startSpeed=" + lastAngle, "", ballDataResponse)
}


function ballDataResponse(data) {

    lastPosition = data.position[maxIndex];
    lastAngle = data.angle[maxIndex];

    maxIndex = data.position.length
    var duration = $('#horizontal_sl_value').val();
    var x = duration / maxIndex;


    var interval = window.setInterval(function() {
        if (ballIndex == maxIndex)
            clearInterval(interval);

        else {

            x += x;
            var a = Number((data.angle[ballIndex]));
            var angle = a.toPrecision(10);
            animate(data.position[ballIndex], angle, x);
            ballIndex += 1;
        }
    }, x);
}


function animate(position, angle, x) {
    Plotly.extendTraces("g", {
        y: [
            [position]
        ],
        x: [
            [x]
        ]
    }, [0]);

    Plotly.extendTraces("g", {
        y: [
            [angle]
        ],
        x: [
            [x]
        ]
    }, [1]);



}


function ajaxCall(type, uri, data, callback) {
    $.ajax({
        type: type,
        url: uri,
        contentType: "application/json",
        data: data,
        success: function(data) {
            callback(JSON.parse(data));
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus + errorThrown);

        }
    });
}