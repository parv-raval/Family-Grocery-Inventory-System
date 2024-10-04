function Buy_gro(event) {

    var countvalue;

    if (event.target.id == "gb_1") {

        countvalue = parseInt(document.getElementById("counter1").value);
        countvalue++;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter1").value = countvalue;
        document.getElementById("gc_1").style.visibility = "visible";
    }


    if (event.target.id == "gb_2") {

        countvalue = parseInt(document.getElementById("counter2").value);
        countvalue++;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter2").value = countvalue;
        document.getElementById("gc_2").style.visibility = "visible";
    }

    if (event.target.id == "gb_3") {

        countvalue = parseInt(document.getElementById("counter3").value);
        countvalue++;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter3").value = countvalue;
        document.getElementById("gc_3").style.visibility = "visible";
    }

    if (event.target.id == "gb_4") {

        countvalue = parseInt(document.getElementById("counter4").value);
        countvalue++;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter4").value = countvalue;
        document.getElementById("gc_4").style.visibility = "visible";
    }

    if (event.target.id == "gb_5") {

        countvalue = parseInt(document.getElementById("counter5").value);
        countvalue++;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter5").value = countvalue;
        document.getElementById("gc_5").style.visibility = "visible";
    }

    if (event.target.id == "gb_6") {

        countvalue = parseInt(document.getElementById("counter6").value);
        countvalue++;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter6").value = countvalue;
        document.getElementById("gc_6").style.visibility = "visible";
    }
}

function Consume_gro(event) {

    if (event.target.id == "gc_1") {

        countvalue = parseInt(document.getElementById("counter1").value);
        countvalue--;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter1").value = countvalue;
        if (countvalue == 0) {
            document.getElementById("gc_1").style.visibility = "hidden";
        }
    }

    if (event.target.id == "gc_2") {

        countvalue = parseInt(document.getElementById("counter2").value);
        countvalue--;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter2").value = countvalue;
        if (countvalue == 0) {
            document.getElementById("gc_2").style.visibility = "hidden";
        }
    }

    if (event.target.id == "gc_3") {

        countvalue = parseInt(document.getElementById("counter3").value);
        countvalue--;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter3").value = countvalue;
        if (countvalue == 0) {
            document.getElementById("gc_3").style.visibility = "hidden";
        }
    }

    if (event.target.id == "gc_4") {

        countvalue = parseInt(document.getElementById("counter4").value);
        countvalue--;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter4").value = countvalue;
        if (countvalue == 0) {
            document.getElementById("gc_4").style.visibility = "hidden";
        }
    }

    if (event.target.id == "gc_5") {

        countvalue = parseInt(document.getElementById("counter5").value);
        countvalue--;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter5").value = countvalue;
        if (countvalue == 0) {
            document.getElementById("gc_5").style.visibility = "hidden";
        }
    }

    if (event.target.id == "gc_6") {

        countvalue = parseInt(document.getElementById("counter6").value);
        countvalue--;

        if (countvalue < 0) {
            countvalue = 0;
        }
        document.getElementById("counter6").value = countvalue;
        if (countvalue == 0) {
            document.getElementById("gc_6").style.visibility = "hidden";
        }
    }
}