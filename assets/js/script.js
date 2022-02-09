//Current Day
function currentDay() {
    var date = new Date();
    var day = (new Intl.DateTimeFormat('en-US', {
        weekday: 'long',
        month: 'long',
        day: '2-digit',
        year: 'numeric',

    }).format(date));

    document.getElementById("currentDay").innerHTML = day;


}



function calcular() {

    var tarifa = parseInt(document.getElementsByClassName("tarifa")[0].value);
    var costocaja = parseInt(document.getElementsByClassName("costocaja")[0].value);
    var usingresomin = parseInt(document.getElementsByClassName("usingresomin")[0].value);
    var ingresousmd = document.getElementsByClassName("ingresousmd")[0];
    var cruceimp = parseInt(document.getElementsByClassName("cruceimp")[0].value);
    var cruceexp = parseInt(document.getElementsByClassName("cruceexp")[0].value);
    var fletemx = parseInt(document.getElementsByClassName("fletemx")[0].value);
    var ustrans = document.getElementsByClassName("ustrans")[0];
    var millasusa = parseInt(document.getElementsByClassName("millasusa")[0].value);
    var pmilla = document.getElementsByClassName("pmilla")[0];
    var otroscostos = parseInt(document.getElementsByClassName("otroscostos")[0].value);

    var margenusa = tarifa - (costocaja + usingresomin + cruceimp + cruceexp + fletemx + otroscostos);
    console.log('logtarifa')
    pmilla.value = margenusa / millasusa;

    var surplus = 0
    if (pmilla.value < 1.8) {

        $("#modalbutton").trigger("click");
        ustrans.value = ""
    } else {
        if (margenusa > millasusa * 2.25) {
            ustrans.value = millasusa * 2.25;
            surplus = margenusa - (millasusa * 2.25)

        } else {
            ustrans.value = margenusa;
        }
    }
    ingresousmd.value = surplus + usingresomin;

}
function calularMillas() {
    var origin = document.getElementsByClassName("origen")[0].value;
    var destination = document.getElementsByClassName("destino")[0].value;
    var service = new google.maps.DistanceMatrixService();

    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        unitSystem: google.maps.UnitSystem.IMPERIAL,
        travelMode: google.maps.TravelMode.DRIVING,
        avoidHighways: false,
        avoidTolls: false
    },
        callback
    );


}

function callback(response, status) {
    var orig = document.getElementsByClassName("origen")[0],
        dest = document.getElementsByClassName("destino")[0],
        dist = document.getElementsByClassName("millas")[0];

    if (status == "OK") {
        orig.value = response.destinationAddresses[0];
        dest.value = response.originAddresses[0];
        dist.value = response.rows[0].elements[0].distance.text;
    } else {
        alert("Error: " + status);
    }
}
function calcularLog() {

    var logtarifa = parseInt(document.getElementsByClassName("logtarifa")[0].value);
    var logustrans = parseInt(document.getElementsByClassName("logustrans")[0].value);
    var logfletemx = parseInt(document.getElementsByClassName("logfletemx")[0].value);
    var logcruceimp = parseInt(document.getElementsByClassName("logcruceimp")[0].value);
    var logcruceexp = parseInt(document.getElementsByClassName("logcruceexp")[0].value);
    var logforwarding = parseInt(document.getElementsByClassName("logforwarding")[0].value);
    var logtransbordo = parseInt(document.getElementsByClassName("logtransbordo")[0].value);
    var logcostocaja = parseInt(document.getElementsByClassName("logcostocaja")[0].value);
    var logfumigacion = parseInt(document.getElementsByClassName("logfumigacion")[0].value);
    var logotroscostos = parseInt(document.getElementsByClassName("logotroscostos")[0].value);
    var logmargen = document.getElementsByClassName("logmargen")[0];



    var subtraction = logtarifa - (logustrans + logfletemx + logcruceimp + logcruceexp + logforwarding + logtransbordo + logcostocaja + logfumigacion + logotroscostos);
    logmargen.value = subtraction;
}

// caluladora quick pay
function calcularqp() {

    var monto = parseInt(document.getElementsByClassName("montoqp")[0].value);
    var perquickpay = parseFloat(document.getElementsByClassName("perquickpay")[0].value);
    var calcular = document.getElementsByClassName("calcularqp")[0];


    var multiplyqp = monto * (perquickpay / 100);
    calcular.value = multiplyqp;


}

//calculadora coordination fee
function calcularCoordinaFee() {

    var monto = document.getElementsByClassName("montoc")[0].value;
    var coordifee = document.getElementsByClassName("coordifee")[0].value;
    var calcular = document.getElementsByClassName("calcularcoordifee")[0];


    var multiplycoordifee = monto * (coordifee / 100);
    calcular.value = multiplycoordifee;
}

//calculadora rebate

function calcularFuelRebate() {

    var monto = document.getElementsByClassName("montofr")[0].value;
    var rebate = document.getElementsByClassName("rebate")[0].value;
    var calcular = document.getElementsByClassName("calcularrebate")[0];
    var multiplyrebate = monto * (rebate);
    calcular.value = multiplyrebate;
}



