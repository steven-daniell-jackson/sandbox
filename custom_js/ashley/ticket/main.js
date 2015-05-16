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

//$setup.ques[0] = 0;
//var regEx = new RegExp("^([0-9]{0,12})([a-f]{0,12}){0,12}$");

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
        //drawOptions();
    //var pers_tbl = document.getElementById("personal");
    //var q_tbl = document.getElementById("queue");
    //var qmapy = document.getElementsByName("mapselect");
    //var qmap_tbl = document.getElementById("qmap");
    //read_local();

    //    //creating an option under usb button in each select for each que name
    //    for (var t = 0; t < qmapy.length; t++) {
    //        for (var q = 0; q < $setup.ques.length; q++) {
    //            //var ques = document.createElement("option");
    //            var option = new Option($setup.ques[q]);
    //            qmapy[t].options.add(option);
    //        }
    //
    //    }
    //
    //    //for(var b = 1; b < qmap_tbl.rows.length; b++) {
    //    for (var n = 1; n < $setup.qmap.length; n++) {
    //        qmap_tbl.rows[n].cells[1].children[0].children[0].selectedIndex = $setup.qmap[n];
    //        //console.log(temp.qmap[n]);
    //    }

    //}
    //var agent = document.getElementById("agent");

    //for (var r = 1; r < $setup.agents.length; r++) {
    //    //console.log(temp.agents[r][0]);
    //    var newrow = agent.insertRow();
    //    newrow.classList.add("onhover");
    //    var cell1 = newrow.insertCell(0);
    //    var cell2 = newrow.insertCell(1);

    //temp_count += 1;

    //    cell1.innerHTML = "<span>" + "Group" + temp_count + ":" + "</span>";
    //    cell2.innerHTML = "<span>Agents</span>" + "<input type='number' min='1' max='30' placeholder='0' onblur='agentBlur(this)' value=" + $setup.agents[r][1] + ">";
    //}


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
    //var quetb = document.getElementById("queue");
    //var qmapy = document.getElementsByName("mapselect");
    //var qsel = document.getElementById("qselect");

    //console.log($tool.ques);

    //for(var t = 0; t < qmapy.length; t++) {
    //    for (var m = 0; m < $setup.ques.length; m++) {
    //        //var option = document.createElement("option");
    //        var option = new Option($setup.ques[m],m);
    //        //qmapy[t].options = "<option>" + $setup.ques[m] + "</option>";
    //        //option.text = $setup.ques[m];
    //        //option.value = $setup.ques[m];
    //
    //    }
    //    //qmapy[t].appendChild(option);
    //    qmapy[t].options.add(option);
    //}
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
            //var option = document.createElement("option");
            //option.text = $setup.ques[i];
            //option.value = $setup.ques[i];
            //option.setAttribute("i", i);
            //option.setAttribute("onchange", "updateOption(this)");

            //qmapy.options = "<option>" + $setup.ques[i] + "</option>";
            qmapy[t].options.add(option);
        }
    }

}

//function addOption() {
//    $setup.qmap[$setup.qmap.length] = "";
//
//    drawOptions();
//
//}

//function updateOption(opt) {
//        //$setup.qmap[opt.getAttribute("i")] = opt.options.selectedIndex;
//
//        saveToLocal();
//}
//---------------------------------------------------------------------------------
//----------------------------------REMOVE ROWS------------------------------------
function rowRemove(r) {
    var rm = r.parentNode.children[0].value;
    var rmv = r.parentNode.parentNode.rowIndex;
    document.getElementById("queue").deleteRow(rmv);
    //
    //
    for(var i=0; i < $setup.ques.length; i++) {
        if(rm == $setup.ques[i]){
            $setup.ques.splice(i,i);
            console.log("row remove" + $setup.ques.splice(i,i));
        }
    }
    saveToLocal();
    console.log(rmv);
}

//function getEmpty(invalid) {
//    var div = document.getElementById("invalid");
//
//    if(invalid.value == "") {
//        div.classList.add("invalid");
//         div.innerHTML = "* Fill out information!!";
//    }
//
//}
//function testID(element) {
//    //var regEx = new RegExp("^([0-9]{0,4})([a-f]{0,4}){0,4}$");
//    var div = document.getElementById("invalid");
//
//    if(element.value.length < 12){
//        div.classList.add("invalid");
//        div.innerHTML = "* LoggerID must be at least 12 characters";
//    }
//
//    else if(element.value = "^([0-9]{0,4})([a-f]{0,4}){0,4}$") {
//        regEx.test(element);
//        div.classList.add("invalid");
//        div.innerHTML = "* LoggerID can only contain numbers and letters a-f";
//    }
//    else {
//        div.innerHTML = "";
//    }
//    console.log(regEx.test(element));
//
//}
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
//
//function getColors() {
//    var color = document.getElementById("kiosk");
//    $tool.$kiosk_tablet = new Object();
//    var key;
//    var value;
//    //$tool.kiosk_tablet = {};
//
//    for(var i = 0; i < color.rows.length; i++) {
//        key = color.rows[i].cells[1].children[0].getAttribute("key");
//        value = "#" + color.rows[i].cells[1].children[0].value;
//        $tool.$kiosk_tablet[key]=value;
//    }
//    //$tool[$kiosk_tablet];
//    //console.log($tool);
//    //console.log($kiosk_tablet);
//}
//
//
//function gremove(g) {
//    var i = g.parentNode.parentNode.rowIndex;
//    document.getElementById("agent").deleteRow(i);
//    console.log(i);
//}
//
//
//
//function agentBlur(agent) {
//    agent.classList.add("disabled");
//    var agnt = document.getElementById("agent");
//    var grp = document.getElementById("groups");
//
//    for (var i = 1; i < agnt.rows.length; i++) {
//        var option = document.createElement("option");
//        var key = agnt.rows[i].cells[0].children[0].innerHTML;
//        var val = agnt.rows[i].cells[1].children[1].value;
//        key = key.substr(0, key.length - 1);
//        option.innerHTML = key;
//        //option.value = val;
//
//        agent_obj[key] = val;
//    }
//
//    agentArr.push(val);
//    grp.appendChild(option);
//    console.log(agent_obj);
//}


