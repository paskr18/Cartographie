$(document).ready(function(){
                 $("#departement").change(function(){
                   var hDepartments = ($(this).find(":selected").val());
                   switch (hDepartments) {
                     case "Abidjan":
                        $("#commune").empty();
                        $("#commune").append(new Option("Abidjan","Abidjan"));
                        break;
                     case "Bas-Sassandra" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Gbôkié","Gbôkié"));
                        $("#commune").append(new Option("Nawa","Nawa"));
                        $("#commune").append(new Option("San-Pédro","San-Pédro"));
                        break;
                     case "Comoé" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Indénié-Djuablin","Indénié-Djuablin"));
                        $("#commune").append(new Option("Sud-Comoé","Sud-Comoé"));
                        break;
                     case "Denguélé" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Folon","Folon"));
                        $("#commune").append(new Option("Kabadougou","Kabadougou"));
                        break;
                     case "Gôh-Djiboua" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Gôh","Gôh"));
                        $("#commune").append(new Option("Lôh-Djiboua","Lôh-Djiboua"));
                        break;
                      case "Lacs" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bélier","Bélier"));
                        $("#commune").append(new Option("Iffou","Iffou"));
                        $("#commune").append(new Option("Moronou","Moronou"));
                        $("#commune").append(new Option("NZi","NZi"));
                        break;
                      case "Lagunes" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Agnéby-Tiassa","Agnéby-Tiassa"));
                        $("#commune").append(new Option("Grands-Ponts","Grands-Ponts"));
                        $("#commune").append(new Option("Mé","Mé"));
                        break;
                      case "Montagnes" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Cavally","Cavally"));
                        $("#commune").append(new Option("Guémon","Guémon"));
                        $("#commune").append(new Option("Tonkpi","Tonkpi"));
                        break;
                      case "Sassandra-Marahoué" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Haut-Sassandra","Haut-Sassandra"));
                        $("#commune").append(new Option("Marahoué","Marahoué"));
                        break;
                      case "Savanes" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bagoué","Bagoué"));
                        $("#commune").append(new Option("Poro","Poro"));
                        $("#commune").append(new Option("Tchologo","Tchologo"));
                        break;
                      case "Vallée du Bandama" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Gbêkê","Gbêkê"));
                        $("#commune").append(new Option("Hambol","Hambol"));
                        break;
                      case "Woroba" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bafing","Bafing"));
                        $("#commune").append(new Option("Béré","Béré"));
                        $("#commune").append(new Option("Worodougou","Worodougou"));
                        break;
                      case "Yamoussoukro":
                        $("#commune").empty();
                        $("#commune").append(new Option("Yamoussoukro","Yamoussoukro"));
                        break;
                      case "Zanzan" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bounkani","Bounkani"));
                        $("#commune").append(new Option("Gontougou","Gontougou"));
                   }
                 });
               });