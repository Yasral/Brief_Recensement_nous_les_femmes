<?php
Class Entreprises extends Controller{

    public function __construct(){
        $this->entrepriseModel = $this->model('Entreprise');
    }

    public function ajout(){

        $data = [
            'fonctions' => $this->entrepriseModel->findAllFonctions(),
            'regime' => $this->entrepriseModel->findAllRegimeJuridiques(),
            'quartier' => $this->entrepriseModel->findAllQuartiers(),
            'secteur' => $this->entrepriseModel->findAllSecteurActivites(),
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
                'nom_repondant' => trim($_POST['nom_repondant']),
                'prenom_repondant' => trim($_POST['prenom_repondant']),
                'email_repondant' => trim($_POST['email_repondant']),
                'numero_repondant' => trim($_POST['numero_repondant']),
                'fonction_id' => trim($_POST['fonction_id']),
                'nom_entreprise' => trim($_POST['nom_entreprise']),
                'rccm' => trim($_POST['rccm']),
                'ninea' => trim($_POST['ninea']),
                'nbre_employes' => trim($_POST[(int)'nbre_employes']),
                'page_web' => trim($_POST['page_web']),
                'siege_social' => trim($_POST['siege_social']),
                'date_creation' => trim($_POST['date_creation']),
                'organigramme' => trim($_POST['organigramme']),
                'dispositif_formation' => trim($_POST['dispositif_formation']),
                'cotisation_sociale' => trim($_POST['cotisation_sociale']),
                'contrat_formel' => trim($_POST['contrat_formel']),
                'secteur_id' => trim($_POST['secteur_id']),
                'quartier_village_id' => trim($_POST['quartier_village_id']),
                // 'quartier_id' => trim($_POST['quartier_id']),
                'regime_juridique_id' => trim($_POST['regime_juridique_id'])
            ];

            (int) $data['nbre_employes'];
            echo "Changement des employes";

            // Validating the checkboxes
            if(isset($_POST['organigramme'])){
                $data['organigramme'] = trim($_POST['organigramme']);
                (int) $data['organigramme'];
                echo "We made it";
            }else{
                $data['organigramme'] = 0;
                (int) $data['organigramme'];
                echo "No we don't";
            }

            if(isset($_POST['dispositif_formation'])){
                $data['dispositif_formation'] = trim($_POST['dispositif_formation']);
                (int) $data['dispositif_formation'];
                echo "We made it";
            }else{
                $data['dispositf_formation'] = 0;
                (int) $data['dispositif_formation'];
                echo "No we don't";
            }

            if(isset($_POST['cotisation_sociale'])){
                $data['cotisation_sociale'] = trim($_POST['cotisation_sociale']);
                (int) $data['cotisation_sociale'];
                echo "We made it";
            }else{
                $data['cotisation_sociale'] = 0;
                (int) $data['cotisation_sociale'];
                echo "No we don't";
            }

            if(isset($_POST['contrat_formel'])){
                $data['contrat_formel'] = trim($_POST['contrat_formel']);
                (int) $data['contrat_formel'];
                echo "We made it";
            }else{
                $data['contrat_formel'] = 0;
                (int) $data['contrat_formel'];
                echo "No we don't";
            }

            if ($this->entrepriseModel->ajout($data)) {
                    //Redirect to the login page
                    // var_dump($data);
                    header('location: ' . URLROOT . '/entreprises/liste');
            } else {
                    die("Une erreur s'est produite.");
                }
        };

        $this->view('entreprises/ajout', $data);
    }

    public function liste(){

        // Returning the corresponding view 
        $this->view('entreprises/liste');
    }
} 