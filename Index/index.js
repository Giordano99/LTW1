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

        alert("what")
        redirectPage('./index.html')
        return false;

    }

    return true;
    
}




function redirectPage(link) {
    
    // Simulate a mouse click:
    window.location.href = link;

}

function openPage(pageName, elmnt, color) {

    //in this section we assign as default time the current time in homepage
    var current = new Date();

    if (current.getMinutes() < 10) {

        time = current.getHours() + ":" + "0" + current.getMinutes();
    }
    else {

        time = current.getHours() + ":" + current.getMinutes();

    }
    document.getElementById("orario").defaultValue = time;
    



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