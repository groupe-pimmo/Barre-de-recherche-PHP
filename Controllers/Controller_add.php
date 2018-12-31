<?php
    class Controller_add extends Controller{

        public function action_add_client(){

            $ajout = false;
    
            //Test si les informations nécessaires sont fournies
            if (isset($_POST["nom"]) and trim($_POST["prenom"]) !== "" 
                and isset($_POST["prenom"]) and trim($_POST["prenom"]) !== "" 
                and isset($_POST["adresse"]) and trim($_POST["adresse"]) !== ""
                and isset($_POST["cp"]) and trim($_POST["cp"]) !== "" 
                and isset($_POST["ville"]) and trim($_POST["ville"]) !== "" 
                and isset($_POST["mail"]) and trim($_POST["mail"]) !== "" 
                and isset($_POST["telephone"]) and trim($_POST["telephone"]) !== "" ){
    
                    //Préparation du tableau infos
                    $infos = [];
                    $noms = ['nom', 'prenom', 'adresse', 'cp','ville', 'mail', 'telephone'];
                    foreach($noms as $v){
                        if (isset($_POST[$v]) and trim($_POST[$v]) !== "")
                            $infos[$v] = $_POST[$v];
                        else
                            $infos[$v] = null;
                    }
    
                    $m = Model::get_model(); //Récupération du modèle
                    $ajout = $m->add_client($infos); //Ajout du client dans la base
            }
            
            //$ajout vaut true si le client a été ajouté, et false sinon.
    
            //Préparation de $data pour l'affichage de la vue message
            $data = [
                "title" => "Ajout client"
            ];
            if($ajout)
                $data["message"] = "Le client a été ajouté à la base de donnée.";
            else {
                $data["message"] = "Le client n'a pas pu être ajouté à la base de données.";
            }
            $this->render("message", $data);      
        }
    
    
        public function action_default(){

            $this->action_add_client();
    
        }
    

    }