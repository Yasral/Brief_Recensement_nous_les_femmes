<?php
Class Entreprises extends Controller{

    public function __construct(){
        $this->entrepriseModel = $this->model('Entreprise');
    }

    public function ajout(){

        if(!isLoggedIn()){
            header("location: " . URLROOT . "/index");
        }

        $data = [
            'fonctions' => $this->entrepriseModel->findAllFonctions(),
            'regime' => $this->entrepriseModel->findAllRegimeJuridiques(),
            'quartier' => $this->entrepriseModel->findAllQuartiers(),
            'secteur' => $this->entrepriseModel->findAllSecteurActivites(),
            'user_id' => $_SESSION['id_user'],
            'nom_repondant' => '',
            'prenom_repondant' => '',
            'email_repondant' => '',
            'numero_repondant' => '',
            'fonction_id' => '',
            'nom_entreprise' => '',
            'rccm' => '',
            'ninea' => '',
            'nbre_employes' => '',
            'page_web' => '',
            'siege_social' => '',
            'date_creation' => '',
            'organigramme' => '',
            'dispositif_formation' => '',
            'cotisation_sociale' => '',
            'contrat_formel' => '',
            'secteur_id' => '',
            'quartier_village_id' => '',
            'regime_juridique_id' => '',
            'repondant_id'
            // Don't forgot error handling empty string and regular expressions
        ];

        // Going to proceed to the verification of the datas
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

            $data = [
                'fonctions' => $this->entrepriseModel->findAllFonctions(),
                'regime' => $this->entrepriseModel->findAllRegimeJuridiques(),
                'quartier' => $this->entrepriseModel->findAllQuartiers(),
                'secteur' => $this->entrepriseModel->findAllSecteurActivites(),
                'user_id' => $_SESSION['id_user'],
                'nom_repondant' => trim($_POST['nom_repondant']),
                'prenom_repondant' => trim($_POST['prenom_repondant']),
                'email_repondant' => trim($_POST['email_repondant']),
                'numero_repondant' => trim($_POST['numero_repondant']),
                'fonction_id' => trim($_POST['fonction_id']),
                'nom_entreprise' => trim($_POST['nom_entreprise']),
                'rccm' => trim($_POST['rccm']),
                'ninea' => trim($_POST['ninea']),
                'nbre_employes' => (int)trim($_POST['nbre_employes']),
                'page_web' => trim($_POST['page_web']),
                'siege_social' => trim($_POST['siege_social']),
                'date_creation' => trim($_POST['date_creation']),
                'organigramme' => '',
                'dispositif_formation' => '',
                'cotisation_sociale' => '',
                'contrat_formel' => '',
                'secteur_id' => trim($_POST['secteur_id']),
                'quartier_village_id' => trim($_POST['quartier_village_id']),
                // 'quartier_id' => trim($_POST['quartier_id']),
                'regime_juridique_id' => trim($_POST['regime_juridique_id'])
            ];

            (int) $data['nbre_employes'];

            // Validating the checkboxes
            if(isset($_POST['organigramme'])){
                // $data['organigramme'] = trim($_POST['organigramme']);
                // (int) $data['organigramme'];

                $data['organigramme'] = 1;
                echo "checked";

            }else{
                $data['organigramme'] = (int)0;
                echo "not checked";
            }

            if(isset($_POST['dispositif_formation'])){
                // $data['dispositif_formation'] = trim($_POST['dispositif_formation']);
                // (int) $data['dispositif_formation'];

                $data['dispositif_formation'] = 1;
                echo "checked";
            }else{
                $data['dispositif_formation'] = (int)0;
                echo " not checked";
                // (int) $data['dispositif_formation'];
            }

            if(isset($_POST['cotisation_sociale'])){
                // $data['cotisation_sociale'] = trim($_POST['cotisation_sociale']);
                // (int) $data['cotisation_sociale'];
                 $data['cotisation_sociale'] = 1;
                 echo "checked";
            }else{
                $data['cotisation_sociale'] = (int)0;
                echo "not checked";
                // (int) $data['cotisation_sociale'];
            }

            if(isset($_POST['contrat_formel'])){
                // $data['contrat_formel'] = trim($_POST['contrat_formel']);
                // (int) $data['contrat_formel'];
                $data['contrat_formel'] = 1;
                echo "checked";
            }else{
                $data['contrat_formel'] = (int)0;
                echo "not checked";
                // (int) $data['contrat_formel'];
            }

            // var_dump($data);

            if ($this->entrepriseModel->ajout($data)) {
                echo "Datas successfully saved";
                header("location: " . URLROOT . "/entreprises/liste");
            }else{
                die("Une erreur s'est produite."); 
            }
        }

        $this->view('entreprises/ajout', $data);
    }

    public function liste(){

        $data = $this->entrepriseModel->liste();

        // var_dump($data);

        // Returning the corresponding view 
        $this->view('entreprises/liste', $data);
    }

    public function modifier($id){
        $entreprise = $this->entrepriseModel->findEntrepriseById($id);

        if(!isLoggedIn()){
            header("location: " . URLROOT . "/index");
        }elseif($entreprise->user_id != $_SESSION['id_user']){
            header("location: " . URLROOT . "/index");
        }

        // var_dump($entreprise);

        // From now on we gonna reproduce the same as the ajout method

        $box = $entreprise->repondant_id;

        $data = [
            'fonctions' => $this->entrepriseModel->findAllFonctions(),
            'regime' => $this->entrepriseModel->findAllRegimeJuridiques(),
            'quartier' => $this->entrepriseModel->findAllQuartiers(),
            'secteur' => $this->entrepriseModel->findAllSecteurActivites(),
            'entreprise' => $entreprise,
            'id_entreprise' => $id,
            'user_id' => $_SESSION['id_user'],
            'nom_repondant' => '',
            'prenom_repondant' => '',
            'email_repondant' => '',
            'numero_repondant' => '',
            'fonction_id' => '',
            'nom_entreprise' => '',
            'rccm' => '',
            'ninea' => '',
            'nbre_employes' => '',
            'page_web' => '',
            'siege_social' => '',
            'date_creation' => '',
            'organigramme' => '',
            'dispositif_formation' => '',
            'cotisation_sociale' => '',
            'contrat_formel' => '',
            'secteur_id' => '',
            'quartier_village_id' => '',
            'regime_juridique_id' => '',
            'repondant_id' => $box
        ];

        // var_dump($data['repondant_id']);

        // $box = $data['repondant_id'];
        // echo $box;

        // var_dump($data['fonctions']);

        // Going to proceed to the verification of the datas
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

            $data = [
                'fonctions' => $this->entrepriseModel->findAllFonctions(),
                'regime' => $this->entrepriseModel->findAllRegimeJuridiques(),
                'quartier' => $this->entrepriseModel->findAllQuartiers(),
                'secteur' => $this->entrepriseModel->findAllSecteurActivites(),
                'entreprise' => $entreprise,
                'id_entreprise' => $id,
                'user_id' => $_SESSION['id_user'],
                'nom_repondant' => trim($_POST['nom_repondant']),
                'prenom_repondant' => trim($_POST['prenom_repondant']),
                'email_repondant' => trim($_POST['email_repondant']),
                'numero_repondant' => trim($_POST['numero_repondant']),
                'fonction_id' => trim($_POST['fonction_id']),
                'nom_entreprise' => trim($_POST['nom_entreprise']),
                'rccm' => trim($_POST['rccm']),
                'ninea' => trim($_POST['ninea']),
                'nbre_employes' => (int)trim($_POST['nbre_employes']),
                'page_web' => trim($_POST['page_web']),
                'siege_social' => trim($_POST['siege_social']),
                'date_creation' => trim($_POST['date_creation']),
                'organigramme' => '',
                'dispositif_formation' => '',
                'cotisation_sociale' => '',
                'contrat_formel' => '',
                'secteur_id' => trim($_POST['secteur_id']),
                'quartier_village_id' => trim($_POST['quartier_village_id']),
                // 'quartier_id' => trim($_POST['quartier_id']),
                'regime_juridique_id' => trim($_POST['regime_juridique_id']),
                'repondant_id' => $box
            ];

            // var_dump($data['repondant_id']);

            (int) $data['nbre_employes'];

            // Validating the checkboxes
            if(isset($_POST['organigramme'])){
                // $data['organigramme'] = trim($_POST['organigramme']);
                // (int) $data['organigramme'];

                $data['organigramme'] = 1;
            }else{
                $data['organigramme'] = (int)0;
                // (int) $data['organigramme'];
            }

            if(isset($_POST['dispositif_formation'])){
                // $data['dispositif_formation'] = trim($_POST['dispositif_formation']);
                // (int) $data['dispositif_formation'];

                $data['dispositif_formation'] = 1;
            }else{
                $data['dispositif_formation'] = (int)0;
                // (int) $data['dispositif_formation'];
            }

            if(isset($_POST['cotisation_sociale'])){
                // $data['cotisation_sociale'] = trim($_POST['cotisation_sociale']);
                // (int) $data['cotisation_sociale'];

                $data['cotisation_sociale'] = 1;
            }else{
                $data['cotisation_sociale'] = (int)0;
                // (int) $data['cotisation_sociale'];
            }

            if(isset($_POST['contrat_formel'])){
                // $data['contrat_formel'] = trim($_POST['contrat_formel']);
                // (int) $data['contrat_formel'];

                $data['contrat_formel'] = 1;
            }else{
                $data['contrat_formel'] = (int)0;
                // (int) $data['contrat_formel'];
            }

            if ($this->entrepriseModel->modifier($data)) {
                    echo "Update successfully done";
                    header("location: " . URLROOT . "/entreprises/liste");
            } else {
                    die("Une erreur s'est produite."); 
                }
        };        



        // Returning the corresponding view 
        $this->view('entreprises/modifier', $data);
    }
} 