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
