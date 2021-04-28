function redirectPage(link) {
    
    // Simulate a mouse click:
    window.location.href = link;

}

function validaCerca() {
            
    var GivenDate = document.getElementById("e")

    pickedDate = Date.parse(GivenDate.value.replace(/-/g, " "));
    todaysDate = new Date();
    todaysDate.setHours(0, 0, 0, 0);
    
    if (pickedDate < todaysDate) {
        alert("Data Non Valida -- Non si può prenotare un giorno passato")
        redirectPage('./index.html')
        return false;
    }

    return true;

}

function validaCercaTime() {
    
    var current = new Date();
   
    var GivenTime = document.getElementById("orario")
    
    var time = GivenTime.value.split(':');

    var GivenDate = document.getElementById("e")

    pickedDate = Date.parse(GivenDate.value.replace(/-/g, " "));
    todaysDate = new Date();
    todaysDate.setHours(0, 0, 0, 0);


    if (pickedDate <= todaysDate && (time[0] < current.getHours() || time[0] < current.getHours() && time[1] < current.getMinutes())) {

        redirectPage('./index.html')
        return false;

    }

    return true;
    
}

function validaPass() {

    var password = document.getElementById("password_accesso")
   
    if (password.value.length == 0) {
        return true;

    }
    if (password.value.length < 8) {

        alert("La password deve essere lunga almeno 8 caratteri")
        
        redirectPage("./index.html#Accedi-Registrati")        
    
        
        return false;
    }
    
    if (! (password.value.includes("?") || 
    password.value.includes("!") || password.value.includes('"') ||
    password.value.includes("$") || password.value.includes("%") ||
    password.value.includes("^") || password.value.includes("&") ||
    password.value.includes("_") || password.value.includes("+"))) {

        alert('La password deve contenere almeno un simbolo speciale tra i seguenti: ? ! " $ ^ & _ +');

        redirectPage("./index.html#Accedi-Registrati")

        return false;
    }

   return true;

    
}




function openPage(pageName, elmnt, color) {

    document.getElementById('e').value = new Date().toISOString().substring(0, 10);

    document.getElementById('date_partite').value = new Date().toISOString().substring(0, 10);

    //in this section we assign as default time the current time in homepage
    var current = new Date();

    var minutes = current.getMinutes();
    
    var value_15 = 15;

    var quotient = Math.floor(minutes / value_15);
    
    var round_minutes = (quotient * value_15) + value_15
    
    if (round_minutes == 60) {
    
        round_hours = current.getHours() + 1;
        round_minutes = 0;
    }
    
    round_hours = current.getHours();
    
    if (round_hours == 24) {
    
        round_hours = 23;
    
        round_minutes = 45;
    
    }
    
    if (round_minutes < 10) {
    
        time = round_hours + ":" + "0" + round_minutes;
    }
    else {
    
        time = round_hours + ":" + round_minutes;
    
    }
    
    document.getElementById("orario").value = time;

    document.getElementById("orario_partite").value = time;


    

    

    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;

}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();