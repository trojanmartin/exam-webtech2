const url = "https://wt58.fei.stuba.sk:4458/final";


let ballIndex = 1;
let maxIndex = 0;
let x = 0;
let lastPosition = 0;
let lastAngle = 0;
let lastX = 0;


function createGraph() {

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
}



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

    if ($("#graphCheck").is(':checked')) {
        maxIndex = data.position.length
        lastPosition = data.position[maxIndex - 1];
        lastAngle = data.angle[maxIndex - 1];

        createGraph();
        var interval = window.setInterval(function() {
            if (ballIndex == maxIndex) {
                clearInterval(interval);
                ballIndex = 1;
                lastX = data.time[maxIndex - 1];

            } else {
                var a = Number((data.angle[ballIndex]));
                var angle = a.toPrecision(10);
                var time = Number(data.time[ballIndex]) + Number(lastX);
                animate(data.position[ballIndex], angle, time);
                ballIndex += 1;
            }
        }, 0.00001);
    }
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