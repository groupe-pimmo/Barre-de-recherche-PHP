<?php
    class Controller_search extends Controller{
         
        public function action_search_pro(){

            if (isset($_POST["cp"]) and trim($_POST["cp"]) !== "" 
            and isset($_POST["formule"])){
                
                $infos = [];
                $noms = ['cp', 'formule'];

                foreach($noms as $v){
                    if (isset($_POST[$v]) and trim($_POST[$v]) !== "")
                        $infos[$v] = $_POST[$v];
                    else
                        $infos[$v] = null;
                }
    
                $m = Model::get_model(); //Récupération du modèle
                $data = [
                    'pro' => $m->search_pro($infos) //Réccupère tous les professionnels correspondants à la recherche
                ];
                //Si on a bien un prix nobel d'identifiant$_GET["id"]
                if($data !== false ){ 
                    $this->render("pro",$data);
                } 
                else {
                    $this->action_error("Pas de professionnel correspondant à votre recherche");
                }

            }

        }

        }
    

    }
?>