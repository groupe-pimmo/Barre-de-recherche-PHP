<?php
    class Controller_search extends Controller{
         
        public function action_default(){
            $this->action_search_presta();
        }

        public function action_search_presta(){

            if (isset($_POST["cp"]) and trim($_POST["cp"]) !== "" 
            and isset($_POST["prestation"]) and isset($_POST['formule'])){
                
                $infos = [];
                $noms = ['cp','prestation','formule'];

                foreach($noms as $v){
                    if (isset($_POST[$v]) and trim($_POST[$v]) !== "")
                        $infos[$v] = $_POST[$v];
                    else
                        $infos[$v] = null;
                }
    
                $m = Model::get_model(); //Récupération du modèle
                if($m->search_presta($infos) == false )
                    $this->action_error("Pas de prestation correspondant à votre recherche");
                else {
                    $data = [
                        'presta' => $m->search_presta($infos) //Réccupère toutes les prestations correspondants à la recherche
                    ];
                    $this->render("presta",$data);
                }
            }
        }
        
        public function action_search_pro(){

            if (isset($_POST["nom_prof"]) and trim($_POST["nom_prof"]) !== ""){
                $infos = [];
                $nom = "nom_prof";

                $infos[$nom] = $_POST[$nom];
                $m = Model::get_model(); //Récupération du modèle
                if($m->search_pro($infos) == false )
                    $this->action_error("Pas de professionnel correspondant à votre recherche");
                else {
                    $data = [
                        'pro' => $m->search_pro($infos) //Réccupère tous les professionnels correspondants à la recherche
                    ];
                    $this->render("pro",$data);               
                }
            }
        }
    }
?>