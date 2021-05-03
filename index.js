//function to reset various 'click me', the buttons that show/hide part of web page
function clickHide(array) {

    var i;
    for (i = 0; i < array.length; i++) {

        document.getElementById(array[i]).style.display = "none"

    }

}

//function needed to show/hide part of html page
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } 
    else {
        x.style.display = "none";
    }
} 

//function to show/hide password when it is inserted
function togglePassword(el, password, toggleText){
    
    // Checked State
    var checked = el.checked;
  
    if(checked) {
     // Changing type attribute
     document.getElementById(password).type = 'text';
  
     // Change the Text
     document.getElementById(toggleText).textContent= "Nascondi Password";
    }
    else {
     // Changing type attribute
     document.getElementById(password).type = 'password';
  
     // Change the Text
     document.getElementById(toggleText).textContent= "Mostra Password";
    }
  
}

//function needed to validate that first and second password inserted are equal
function validaCambioPassword(prima_password, seconda_password, nome_impostazioni, 
    cognome_impostazioni, mail_impostazioni) {

    var prima = document.getElementById(prima_password);
    var seconda = document.getElementById(seconda_password)
    var nome = document.getElementById(nome_impostazioni)
    var cognome = document.getElementById(cognome_impostazioni)
    var mail = document.getElementById(mail_impostazioni)
    
    if (nome.value.length == 0 && cognome.value.length == 0 &&
        mail.value.length == 0 && prima.value.length == 0 &&
        seconda.value.length == 0) {

        alert("Non Si è Modificato Nulla")
        return false;
    }

    if ((prima.value.length == 0 && seconda.value.length != 0) ||
        (prima.value.length != 0 && seconda.value.length == 0) ) {

        alert("Conferma la Password in entrambi i campi 'Nuova Password' e 'Conferma Password'")
        document.getElementById(prima_password).value = ""
        document.getElementById(seconda_password).value = ""
        return false;
    }
    
    if (prima.value != seconda.value) {

        alert("Le due password devono essere uguali")
        document.getElementById(prima_password).value = ""        
        document.getElementById(seconda_password).value = ""
        return false;
    }

    return true;
}

//function to redirect to another page automatically (without click with pointer)
function redirectPage(link) {
    
    // Simulate a mouse click:
    window.location.href = link;

}

//function to validate date
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

//function to validate hour and time of forms
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

//function to validate a right password
function validaPass(password_registrazione, password_registrazione_conferma) {

    var password = document.getElementById(password_registrazione)
    var password_conferma = document.getElementById(password_registrazione_conferma)

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

    if (password.value !== password_conferma.value) {

        alert('Le Due Password NON Coincidono');
        redirectPage("./index.html#Accedi-Registrati")
        return false;
    }

   return true;
}

//main function to reset buttons and to open various page
function openPage(pageName, elmnt, color) {

    /*if (pageName == 'Accedi-Registrati') {

        array = ['login_toggleText', 'registrazione_toggleText']
        clickHide(array)
    }*/
    
    if (pageName == 'Come_Funziona') {

        array = ['how_work_prenota', 'how_work_partite', 'how_work_gestione', 'how_work_accesso']
        clickHide(array)
    }

    if (pageName == 'Home_Accesso') {
        
        array = ['servizi', 'centro_sportivo', 'sport']
        clickHide(array)
    }
    if (pageName == 'Utente') {
        
        array = ['messaggi', 'profilo', 'conto', 'assistenza']
        clickHide(array)
    }

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
    else {

        round_hours = current.getHours();
    }
    
    
    if (round_hours == 24) {
    
        round_hours = 23;
        round_minutes = 45;
    }
    
    if (round_hours < 10) {
        
        round_hours = "0" + round_hours;
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