$(document).ready(function(){
                 $("#departement").change(function(){
                   var hDepartments = ($(this).find(":selected").val());
                   switch (hDepartments) {
                     case "Abidjan":
                        $("#commune").empty();
                        $("#commune").append(new Option("Abidjan","Abidjan"));
                        $("#map").innerHTML = map.setView([5.316667, -4.033333], 10);
                        break;
                     case "Bas-Sassandra" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Gbôkié","Gbôkié"));
                        $("#commune").append(new Option("Nawa","Nawa"));
                        $("#commune").append(new Option("San-Pédro","San-Pédro"));
                        $("#map").innerHTML = map.setView([5.49998, -6.666664],8);
                        break;
                     case "Comoé" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Indénié-Djuablin","Indénié-Djuablin"));
                        $("#commune").append(new Option("Sud-Comoé","Sud-Comoé"));
                        $("#map").innerHTML = map.setView([6.7333, -3.4834],9);
                        break;
                     case "Denguélé" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Folon","Folon"));
                        $("#commune").append(new Option("Kabadougou","Kabadougou"));
                        $("#map").innerHTML = map.setView([9.4999, -7.417],8);
                        break;
                     case "Gôh-Djiboua" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Gôh","Gôh"));
                        $("#commune").append(new Option("Lôh-Djiboua","Lôh-Djiboua"));
                        $("#map").innerHTML = map.setView([6.1332, -5.9333],9);
                        break;
                      case "Lacs" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bélier","Bélier"));
                        $("#commune").append(new Option("Iffou","Iffou"));
                        $("#commune").append(new Option("Moronou","Moronou"));
                        $("#commune").append(new Option("NZi","NZi"));
                        $("#map").innerHTML = map.setView([6.6499, -4.6999],9);
                        break;
                      case "Lagunes" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Agnéby-Tiassa","Agnéby-Tiassa"));
                        $("#commune").append(new Option("Grands-Ponts","Grands-Ponts"));
                        $("#commune").append(new Option("Mé","Mé"));
                        $("#map").innerHTML = map.setView([5.9333, -4.2167],9);
                        break;
                      case "Montagnes" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Cavally","Cavally"));
                        $("#commune").append(new Option("Guémon","Guémon"));
                        $("#commune").append(new Option("Tonkpi","Tonkpi"));
                        $("#map").innerHTML = map.setView([7.3999, -7.55],8);
                        break;
                      case "Sassandra-Marahoué" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Haut-Sassandra","Haut-Sassandra"));
                        $("#commune").append(new Option("Marahoué","Marahoué"));
                        $("#map").innerHTML = map.setView([6.8833, -6.45],8);
                        break;
                      case "Savanes" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bagoué","Bagoué"));
                        $("#commune").append(new Option("Poro","Poro"));
                        $("#commune").append(new Option("Tchologo","Tchologo"));
                        $("#map").innerHTML = map.setView([9.4165, -5.6166],8);
                        break;
                      case "Vallée du Bandama" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Gbêkê","Gbêkê"));
                        $("#commune").append(new Option("Hambol","Hambol"));
                        $("#map").innerHTML = map.setView([8.1333, -5.1001],8);
                        break;
                      case "Woroba" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bafing","Bafing"));
                        $("#commune").append(new Option("Béré","Béré"));
                        $("#commune").append(new Option("Worodougou","Worodougou"));
                        $("#map").innerHTML = map.setView([8.4832, -6.6],8);
                        break;
                      case "Yamoussoukro":
                        $("#commune").empty();
                        $("#commune").append(new Option("Yamoussoukro","Yamoussoukro"));
                        $("#map").innerHTML = map.setView([6.8092, -5.2954],10);
                        break;
                      case "Zanzan" :
                        $("#commune").empty();
                        $("#commune").append(new Option("Bounkani","Bounkani"));
                        $("#commune").append(new Option("Gontougou","Gontougou")); 
                        $("#map").innerHTML = map.setView([8.6167, -3.15],8);
                   }
                 });
               });