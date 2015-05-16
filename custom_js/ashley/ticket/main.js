//globals
var $setup = {
    loggerID:"",
    customer_name:"",
    site: "",
    tags: "",
    qsusb: "",
    printer: "",
    ques: [],
    qmap: []
};


//------------------------------------------------------------------------------
//---------------------------------ticket tab-----------------------------------
//onload event that loads ticket tab
//------------------------------------------------------------------------------
function ticket() {
    ticket_addBtn();
    var tb = document.getElementById("wrap");
    tb.classList.add("show");
    tb.classList.remove("hidden");
    document.getElementById("head-text").innerHTML = "Ticket";

}

//if a Item is selected "hidden" class is replaced with "show" class
function changeClass(element) {
    var tb = document.getElementById("wrap");
    var agent = document.getElementById("wrap2");
    var kiosk = document.getElementById("wrap3");
    var clear = document.getElementsByClassName("show");
    var head = document.getElementById("head-text");
    var invalid = document.getElementById("invalid");

    for (var i = 0; i < clear.length; i++) {
        clear[i].classList.add("hidden");
        clear[i].classList.remove("show");
        //console.log(clear[i]);
    }


    switch (element) {
        case 0:
            tb.classList.add("show");
            tb.classList.remove("hidden");
            head.innerHTML = "Ticket";
            invalid.classList.remove("hidden");
            break;
        case 1:
            agent.classList.add("show");
            agent.classList.remove("hidden");
            head.innerHTML = "Agent";
            invalid.classList.add("hidden");
            break;
        case 2:
            kiosk.classList.add("show");
            kiosk.classList.remove("hidden");
            head.innerHTML = "Kiosk";
            invalid.classList.add("hidden");
            break;

    }
}

//------------------------------------------------------------------------------
//-----------------------READ TICKET info to localstorage-----------------------
//read ticket tab section
//------------------------------------------------------------------------------

function pers_read() {
    var pers_tbl = document.getElementById("personal");
    var rb = document.getElementsByName("qsusb");
    var rbval;

    //info.id = pers_tbl.rows[0].cells[0].children[0].innerHTML;
    $setup.loggerID = pers_tbl.rows[0].cells[1].children[0].value;
    //info.customer = pers_tbl.rows[1].cells[0].children[0].innerHTML;
    $setup.customer_name = pers_tbl.rows[1].cells[1].children[0].value;
    //info.site = pers_tbl.rows[2].cells[0].children[0].innerHTML;
    $setup.site = pers_tbl.rows[2].cells[1].children[0].value;
    $setup.tags = pers_tbl.rows[3].cells[1].children[0].value;

    for (var i = 0; i < rb.length; i++) {
        if (rb[i].checked) {
            rbval = rb[i].value;
            //console.log(rbval);
            $setup.qsusb = rbval;
        }
    }

    $setup.printer = pers_tbl.rows[5].cells[1].children[0].selectedIndex;
    saveToLocal();
}

function saveToLocal() {
    var pers_tbl = document.getElementById("personal");
    if (typeof(Storage) != "undefined") {
        //set local storage items
        localStorage.setItem("setup", JSON.stringify($setup));
    } else {
        pers_tbl.innerHTML = "Sorry, your browser does not support Web Storage...";
    }
}


//-----------------------------------------------------------------------------------
//-------------------GET TICKET from localstorage--------------------
//write ticket from storage
//-----------------------------------------------------------------------------------

function readFromLocal() {
    var pers_tbl = document.getElementById("personal");
    if (typeof(Storage) != "undefined") {
        //set local storage items
        $setup = JSON.parse(localStorage["setup"]);
    } else {
        pers_tbl.innerHTML = "Sorry, your browser does not support Web Storage...";
    }

}

function get_local() {
    readFromLocal();

    var pers_tbl = document.getElementById("personal");

    pers_tbl.rows[0].cells[1].children[0].value = $setup.loggerID;
    //
    pers_tbl.rows[1].cells[1].children[0].value = $setup.customer_name;
    //
    pers_tbl.rows[2].cells[1].children[0].value = $setup.site;

    if ($setup.qsusb == 1) {
        pers_tbl.rows[4].cells[1].children[0].checked = true;

        //rb[i].checked = temp.qsusb;
    } else {
        pers_tbl.rows[4].cells[1].children[1].checked = true;
        //rb[i].checked = temp.qsusb;
    }

    pers_tbl.rows[5].cells[1].children[0].selectedIndex = $setup.printer;


}
function get_ticket() {
    get_local(),drawRows();
   


}


//---------------------------------------------------------------------------------
//--------------------ADD buttons dynamically on page load-------------------------
//add button numbers to ticket tab usb button section
//---------------------------------------------------------------------------------
function ticket_addBtn() {

    var qmap = document.getElementById("qmap");
    var btns = 0;

    for (var i = 1; i < qmap.rows.length; i++) {
        btns += 1;
        qmap.rows[i].cells[0].children[0].innerHTML = "b" + btns + ":";
    }
    //console.log(btns);

}

//---------------------------------------------------------------------------------
//----------------------------------QUE ONBLUR-------------------------------------
//onblur save que names to array
//onblur give input field class disabled
//---------------------------------------------------------------------------------

function qblur(input) {
    input.classList.add("disabled");
   
}

//---------------------------------------------------------------------------------
//----------------------------------QUE ONFOCUS------------------------------------
//removes disabled class to make generated input go to its default css properties
//---------------------------------------------------------------------------------
function qfocus(q) {
    q.classList.remove("disabled");
}

//---------------------------------------------------------------------------------
//----------------------------------DRAW ROWS------------------------------------
function drawRows() {
    var q_tbl = document.getElementById("queue");

    q_tbl.innerHTML = "<tr>\n   <td><span>Queue names:</span></td><td><button onclick=\"addRow()\">+Add Queue</button></td>\n</tr>";

    for (var i = 0; i < $setup.ques.length; i++) {

        var newrow = q_tbl.insertRow();
        newrow.classList.add("onhover");
        var cell1 = newrow.insertCell(0);
        var cell2 = newrow.insertCell(1);
        var t = i;
        t+=1;

        cell1.innerHTML = "Q" + t + ":";
        cell2.innerHTML = '<input type="input" i="' + i + '" class="disabled" onchange="updateRow(this)" value="' + $setup.ques[i] + '">' +
        //'<input type="input" i="' + i + '" class="disabled" onchange="updateRow(this)" onblur="qblur(this)" onfocus="qfocus(this)" value="' + $setup.ques[i] + '">' +
        "<img src='img/little-cross.png' onclick='rowRemove(this)'>";

    }
    //console.log($setup.ques);

}

function addRow() {
    $setup.ques[$setup.ques.length] = "";

    drawRows();
}

function updateRow(input) {
    $setup.ques[input.getAttribute("i")] = input.value;

    saveToLocal();
}

function drawOptions() {
    var qmapy = document.getElementsByName("mapselect");

    qmapy.options = "";

    for(var t = 0; t < qmapy.length; t++) {
        for (var i = 0; i < $setup.ques.length; i++) {
            var option = new Option($setup.ques[i],i);
           
            qmapy[t].options.add(option);
        }
    }

}


//---------------------------------------------------------------------------------
//----------------------------------REMOVE ROWS------------------------------------
function rowRemove(r) {
 
    var rmv = r.parentNode.parentNode.rowIndex;
    document.getElementById("queue").deleteRow(rmv);


//Reworked JS to solve index not deleting correctly from local storage

 var rm =  r.parentNode.children[0].getAttribute("i");
 $setup.ques.splice(rm , 1);

 // End
 
    saveToLocal();
    console.log(rmv);
}


//---------------------------------------------------------------------------------
//----------------------------------ADD GROUP------------------------------------
//agent tab
//dynamically add groups with agent number boxes
//---------------------------------------------------------------------------------
//var grpcount = 0;
function addGrp() {
    var grp = document.getElementById("agent");

    var newrow = grp.insertRow();
    newrow.classList.add("onhover");
    var cell1 = newrow.insertCell(0);
    var cell2 = newrow.insertCell(1);

    //grpcount += 1;

    cell1.innerHTML = "<span>" + 'Group' + grpcount + ':' + "</span>";
    cell2.innerHTML = "<span>Agents</span>" + "<input type='number' min='1' max='30' placeholder='0' onblur='agentBlur(this)'>";

}


