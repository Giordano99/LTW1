<!DOCTYPE html>
<html>

    <head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#button_ajax_home_accesso").click(function(){
                  
                    var citta_accesso = $( "#citta_accesso" ).val();
                    var centro_sportivo_accesso = $( "#centro_sportivo_accesso" ).val();
                    var opzione = $( "#browsers" ).val();
                    var data = $( "#e" ).val();
                    var orario = $( "#orario" ).val();
                    var check_value = $( "#check_value" ).val();
                    
                    $.ajax({url: "../php/ricerca.php?citta="+citta_accesso+"&nome="+ centro_sportivo_accesso+ "&data="+ data+ "&orario="+ orario+ "&opzione="+ opzione+ "&check_value="+ check_value, success: function(result){
                        $("#div1").html(result);
                    }});
                });
            });

            $(document).ready(function(){
                $("#button_storico_prenotazioni").click(function(){
                    
                    $.ajax({url: "../php/elenco_prenotazioni.php", success: function(result){
                        $("#div2").html(result);
                    }});
                });
            });

            $(document).ready(function(){
                $("#button_campi_sportivi_Italia").click(function(){
                    
                    $.ajax({url: "../php/campi_sportivi_Italia.php", success: function(result){
                        $("#campi_sportivi_Italia").html(result);
                    }});
                });
            });

            $(document).ready(function(){
                $("#button_utenti_registrati").click(function(){
                    
                    $.ajax({url: "../php/utenti_registrati.php", success: function(result){
                        $("#utenti_registrati").html(result);
                    }});
                });
            });

            $(document).ready(function(){
                $("#button_prenotazioni_totali").click(function(){
                    
                    $.ajax({url: "../php/prenotazioni_totali.php", success: function(result){
                        $("#prenotazioni_totali").html(result);
                    }});
                });
            });

        </script>

        <title> Partitella? - Accesso Effettuato </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width initial-scale=1"/>

        <link rel="stylesheet" type="text/css" href="../Index/index.css"/>

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>

        <!--<link rel="stylesheet" type="type/css" href="style.css"/>-->
        <script type="text/javascript" lang="javascript"
        src="../js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" lang="javascript" src="script.js"></script> -->
    
        <script type="text/javascript" src="../Index/index.js"></script>
        

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../vue/vue.min.js"></script>

    </head>
    
    <body class="text-center" onload="openPage('Home_Accesso', this, 'red')">

        <a href=#Home_Accesso><button class="tablink" onclick="openPage('Home_Accesso', this, 'red')">Home</button></a>
        <a href=#Partite><button class="tablink" onclick="openPage('Partite', this, 'blue')">Partite</button></a>
        <a href=#Come_Funziona><button class="tablink" onclick="openPage('Come_Funziona', this, 'green')">Come Funziona</button></a>
        <a href=#Utente><button class="tablink" onclick="openPage('Utente', this, 'orange')"><?php echo "Impostazioni - $_COOKIE[mail]"?></button></a>
        
        

   
        <div id="Home_Accesso" class="tabcontent">
            <div class="split_02">

                <div id = "app">

                    <div  class="product=image">
                        <img v-bind:src="image" width="600" height="300"/>
                    </div>
                
                    <span v-for="x in variants" :key="x.id" class ="color-box">
                        <button class="btn btn-lg btn-primary" v-on:click="updateImage(x.image)">{{x.sport}}</button>
                    </span>
                    
                </div>
                <script type="text/javascript" src="../vue/prova.js"></script>

                <hr>

                    <div class="boxes">
                        <input type="text" id="citta_accesso" name="citta" placeholder="Inserisci la Città..." onclick="primaCitta('citta_accesso', 'centro_sportivo_accesso')"/>
                        <input type="text" id="centro_sportivo_accesso" name="nome" placeholder="...Oppure il Centro Sportivo..." onclick="primaCentro('citta_accesso', 'centro_sportivo_accesso')"/>
                        
                        <select name="opzione" id="browsers" onchange="verifyPlayers('check_value', 'browsers');">
                            <option value="calcio_A5">Calcio A5</option>
                            <option value="beach_volley">Beach Volley</option>
                            <option value="calcio_A8">Calcio A8</option>
                            <option value="rugby">Rugby</option>
                            <option value="squash">Squash</option>
                        </select>

                        <input type="date" name="data" onchange="return validaCerca();" id=e>

                        <input type="time" name="orario" id=orario onchange="return validaCercaTime();">

                        <input type='checkbox' onclick='myFunction(`check`)' checked=""/> Non Siete Tutti?
            
                        <div id="check">
                            
                            Quanti Giocatori Mancano?: <input id="check_value" type="number" value=0 onchange="verifyPlayers('check_value', 'browsers');">
            
                        </div>
            
                    </div>
                   
                    <button id="button_ajax_home_accesso" class="btn btn-lg btn-success" value="Cerca">
                        CERCA
                    </button>

                    <div id = "div1">
    
                    </div>

                <hr>

                <div class='h4'> 
                    Gestisci un centro sportivo?
                </div>
                
                <button class="btn btn-link btn-info" onclick="myFunction('centro_sportivo')"> 
                    Clicca qui per aggiungere il tuo centro sportivo 
                </button>
                <div id="centro_sportivo">
                    <form action="../php/aggiunta_centro.php" method="POST">
                    
                        <input name="nome" type="text" required placeholder="Nome Centro Sportivo...">
                        <br>
                        <input name="citta" type="text" required placeholder="Città Centro Sportivo">
                        <br>
                        <input name="indirizzo" type="text" required placeholder="Via del Centro Sportivo...">
                        <br>
                        <input name="descrizione" type="text" required placeholder="Descrizione Centro Sportivo...">
                        <br>
                        <input name="regole" type="text" required placeholder="Regole Centro Sportivo...">
                        <br>
                        <!-- <input name="photo" type="file" accept=".png, .jpg, .jpeg" placeholder="Allega una Foto Qui...">
                        <br> -->

                        <hr style="border: 1px dashed black;" />
                        
                        Elenco Servizi:
                        <button type="button" class="btn btn-info" onclick="myFunction('servizi')">Click Me</button>

                        <div id="servizi">
                            
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="docce"> Docce
                                <img src="https://image.flaticon.com/icons/png/512/93/93958.png" style="width:64px;height:64px;"> 
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="ristorante"> Ristorante
                                <img src="https://img.icons8.com/material/452/restaurant--v1.png" style="width:64px;height:64px;"> 
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="bar"> Bar 
                                <img src="https://img.icons8.com/ios/452/cafe.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="pizzeria"> Pizzeria 
                                <img src="https://img.icons8.com/ios/452/pizza.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="area_picnic"> Area Picnic 
                                <img src="https://img.icons8.com/ios/452/picnic-table.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="spogliatoi"> Spogliatoi 
                                <img src="https://img.icons8.com/ios/452/drawer.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="casacche"> Casacche 
                                <img src="https://img.icons8.com/small/452/vest.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="pub"> Pub 
                                <img src="https://img.icons8.com/ios/452/poolside-bar.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="parcheggio"> Parcheggio 
                                <img src="https://img.icons8.com/ios/452/outdoor-parking.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="tornei_campionati"> Tornei/Campionati 
                                <img src="https://img.icons8.com/ios/452/tournament-mode.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="servizi[]" value="sala_feste"> Sala Feste 
                                <img src="https://img.icons8.com/ios/452/party-baloons.png" style="width:64px;height:64px;">
                            </label>
                                
                        </div>
                        <br>
                        <hr style="border: 1px dashed black;" />

                        Elenco Sport:
                        <button type="button" class="btn btn-info" onclick="myFunction('sport')">Click Me</button>

                        <div id="sport">
                            
                            <label> 
                                <input type="checkbox" name="sport[]" value="calcio_a5"> Calcio A5
                                <img src="https://img.icons8.com/metro/452/5.png" style="width:64px;height:64px;"> 
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="sport[]" value="beach_volley"> Beach Volley 
                                <img src="https://img.icons8.com/ios/452/volleyball--v2.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="sport[]" value="calcio_a8"> Calcio A8 
                                <img src="https://img.icons8.com/windows/452/8.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="sport[]" value="rugby"> Rugby 
                                <img src="https://img.icons8.com/metro/452/rugby.png" style="width:64px;height:64px;">
                            </label>
                            
                            <label> 
                                <input type="checkbox" name="sport[]" value="squash"> Squash 
                                <img src="https://img.icons8.com/ios/452/squash-racquet.png" style="width:64px;height:64px;">
                            </label>
                        </div>
                        <hr style="border: 1px dashed black;" />
                        <br>
                        <input class="btn btn-lg btn-success" type="submit" value="INVIA">
                    
                    </form>
                </div>
                <hr>
                
                <div class='h2'> 
                    Prenota il tuo campo sportivo 
                </div>

                <div>
                    VELOCE &rarr; Trova rapidamente un campo disponibile nella tua zona e prenota con un clic.    
                    <br>
                    GRATUITO &rarr; Nessun costo aggiuntivo in fase di prenotazione.
                    <br>
                    FACILE &rarr; Basta telefonate ai centri della tua zona, effettua una ricerca e trova il campo migliore per te.
                    <br>
                    SCONTI &rarr; Sconti fino al 50% rispetto al costo attuato dal campo.    
                </div>    
                <hr>
                <div class='h5'>
                    
                    <div>    
                        Campi sportivi in Italia &rarr; 
                        
                        <span id = 'campi_sportivi_Italia'>
                            <button class="btn btn-info" id="button_campi_sportivi_Italia">Scoprili</button>
                        </span>
                    </div>
                    <div>
                        Utenti Registrati &rarr;

                        <span id = 'utenti_registrati'>
                            <button class="btn btn-info" id="button_utenti_registrati">Scoprili</button>
                        </span>
                    </div>
                    <div>
                        Prenotazioni totali &rarr;

                        <span id = 'prenotazioni_totali'>
                            <button class="btn btn-info" id="button_prenotazioni_totali">Scoprili</button>
                        </span>
                    </div>
    
                </div>   

            </div>
        </div>

        <div id="Partite" class="tabcontent">
            <div class="split_02">

                <div class='h3'> 
                    Come al solito vuoi giocare ma non hai compagni sufficienti oppure non riuscite ad essere
                    abbastanza per una Partitella? Bhe allora stai nel sito giusto, ci sono migliaia di partite
                    a cui mancano dei giocatori, unisciti a loro !! 
                </div>
                <br>

                <div class='h4'> 
                    Innanzitutto ti chiediamo di completare la form qui sotto, in questo modo potremo proporti
                    tutto l'elenco possibile di partite a cui mancano dei componenti !! 
                </div>

                <br>

                <div class="split_02">
                    <form action="ricerca_singola.php" class="form-search" method="POST" name="myForm">
                            
                        <div class="boxes">
                            
                            <input type="text" placeholder="Inserisci la Città..."/>
                            <input type="text" placeholder="...Oppure il Centro Sportivo..."/>

                            <select id="browsers">
                                <option value="CalcioA5">Calcio A5</option>
                                <option value="Beach_Volley">Beach Volley</option>
                                <option value="CALCIOA8">Calcio A8</option>
                                <option value="Rugby">Rugby</option>
                                <option value="Squash">Squash</option>
                            </select>

                            <input type="date" onchange="return validaCerca();" id="date_partite">

                            <input type="time" id="orario_partite" onchange="return validaCercaTime();">

                            <input class="btn btn-lg btn-success" type="submit" value="Cerca" onclick="return validaCercaTime();">
                    
                        </div>

                    </form>
                </div>
                
            </div>            

        </div>

        <div id="Come_Funziona" class="tabcontent">
        
            <div class="split_02">


                <div class='h2'> 
                    Per poter usare pienamente 'Partitella?' basta seguire pochi semplici 
                    passi, vedrai che è semplicissimo !! 
                </div>
                <br>
                Siete al completo e vuoi prenotare un campo

                <button class="btn btn-info" onclick="myFunction('how_work_prenota')">Click Me</button>

                <div id="how_work_prenota">
                
                Facile, basta andare nel tab "Menù" (il primo a sinistra) e da lì
                potrai prenotare un campo sportivo, facile ed intuitivo

                </div>
                <hr>
                Hai una voglia folle di giocare ma non conosci nessuno oppure
                non siete abbastanza per fare una Partitella?
                <button class="btn btn-info" onclick="myFunction('how_work_partite')">Click Me</button>

                <div id="how_work_partite">
                
                    Nella sezione "Partite" puoi selezionare la tua città e da lì 
                    ti compariranno tutte le partite alle quali mancano degli elementi !!
                
                </div>
                <hr>
                Hai un campo sportivo e vuoi aggiungerlo al nostro sistema

                <button class="btn btn-info" onclick="myFunction('how_work_gestione')">Click Me</button>

                <div id="how_work_gestione">
                
                    Nella Home c'è la sezione apposita !!
                
                </div>
                <hr>
                Vuoi iscriverti/loggarti?

                <button class="btn btn-info" onclick="myFunction('how_work_accesso')">Click Me</button>

                <div id="how_work_accesso">
                
                    Basta che vai nella sezione "Accedi/Registrati" --> Se leggi solamente
                    "Impostazioni" significa che sei già loggato !!

                </div>
                <hr>
            </div>
        </div> 

        <div id="Utente" class="tabcontent">

            <div class="split_02">
                
                <a href="../php/logout.php">
                    <button class="btn btn-danger"> Clicca qui per fare il log-out </button>
    
                </a>

                <hr>
                Storico Prenotazioni
                <button id="button_storico_prenotazioni" onclick = "myFunction('div2')" class="btn btn-info" value="Click me">
                    Click me
                </button>

                <div id = "div2">

                </div>

                <hr>
                
                
                <!--  DA QUI NON SI VEDE  -->
                
                <div id = "messaggi">
                    
                </div>
                
                <!--  FIN QUI NON SI VEDE  -->


                Impostazioni Profilo

                <button class="btn btn-info" onclick="myFunction('profilo')">Click Me</button>

                <div id="profilo">
                    <form action="../php/profilo.php" method="POST" 
                    onsubmit="return validaCambioPassword('prima_password', 
                    'seconda_password', 'nome_impostazioni', 
                    'cognome_impostazioni')">
                        <div class='table'>
                            <div class='tr'>
                                <div class='td'>
                                    <input placeholder="Nuovo Nome..." type="text" name = "nome" id="nome_impostazioni">
                                </div>
                            </div>
                            <div class='tr'>
                                <div class='td'>
                                    <input placeholder="Nuovo Cognome..." type="text" name ="cognome" id="cognome_impostazioni" value="" />
                                </div>
                            </div>
                            
                            <div class='tr'>
                                <div class='td'>
                                    <input placeholder="Nuova Password..." type="password" name ="password" value="" id="prima_password">
                                </div>
                                <div class='td'>
                                    &nbsp;
                                    <label> <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this, "prima_password", "prima_toggleText");'>&nbsp; <span id='prima_toggleText'>Mostra Password</span> </label>
                                </div>
                            </div>

                            <div class='tr'>
                                
                                <div class='td'>
                                
                                    <input placeholder="Conferma Password..." type="password" value="" id="seconda_password">
                                </div>

                                <div class='td'>
                                    &nbsp;
                                    <label> 
                                        <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this, "seconda_password", "seconda_toggleText");'>&nbsp; <span id='seconda_toggleText'>Mostra Password</span> 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-lg" type="submit" value="MODIFICA">EFFETTUA LE MODIFICHE</button>
                    </form>
                </div> 

                <hr>

                Impostazioni Conto

                <button class="btn btn-info" onclick="myFunction('conto')">Click Me</button>

                <div id="conto">
                    Aggiungi Denaro
                    <br>
                    Cambia Carta Pagamento
                    <br>
                </div> 

                <hr>

                Assistenza

                <button class="btn btn-info" onclick="myFunction('assistenza')">Click Me</button>

                <div id="assistenza">
                    Contatta Assistenza
                    <br>
                    Informazioni Legali "Partitella?"

                </div>  

            </div>
        
        </div>
    </body>                

</html>