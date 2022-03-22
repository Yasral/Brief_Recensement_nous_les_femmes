<?php
Class Entreprise{
    private $db;
    private $box;

    public function __construct(){
        $this->db = new Database;
        $this->box = new Database;
    }

    // These fonctions retrieve the information related to the tables that are already populated
    public function findAllFonctions(){
        $this->db->query('SELECT * FROM Fonction');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllRegimeJuridiques(){
        $this->db->query('SELECT * FROM Regime_juridique');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllQuartiers(){
        $this->db->query('SELECT * FROM Quartier_village');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllSecteurActivites(){
        $this->db->query('SELECT * FROM Secteur_activite');

        $results = $this->db->resultSet();

        return $results;
    }

    /*
        Don't forget the one about the repondant gonna use the last insert id method 
    */

    // These fonctions retrieve the information related to the tables that are already populated

    public function ajout($data){
        $this->db->query("INSERT INTO Repondant (fonction_id, nom_repondant, prenom_repondant, numero_repondant, email_repondant) VALUES (:fonction_id, :nom_repondant, :prenom_repondant, :numero_repondant, :email_repondant)");

        // Bind values
        $this->db->bind(':fonction_id', $data['fonction_id']);
        $this->db->bind(':nom_repondant', $data['nom_repondant']);
        $this->db->bind(':prenom_repondant', $data['prenom_repondant']);
        $this->db->bind(':numero_repondant', $data['numero_repondant']);
        $this->db->bind(':email_repondant', $data['email_repondant']);

        if($this->db->execute()){
            echo "Repondant successfully saved";
        }else{
            echo "Repondant not saved";
        }

        $last_id = $this->db->lastInsertion();
        echo $last_id;

        $this->box->query("INSERT INTO Entreprise (regime_juridique_id, quartier_village_id, repondant_id, secteur_id, nom_entreprise, rccm, ninea, nbre_employes, page_web, siege_social, date_creation, organigramme, dispositif_formation, cotisation_sociale, contrat_formel) VALUES (:regime_juridique_id, :quartier_village_id, :repondant_id, :secteur_id, :nom_entreprise, :rccm, :ninea, :nbre_employes, :page_web, :siege_social, :date_creation, :organigramme, :dispositif_formation, :cotisation_sociale, :contrat_formel)");
        //$this->box->query("INSERT INTO Boxing (repondant_id, regime_juridique_id, quartier_village_id, nbre_employes, date_creation, organigramme) VALUES (:repondant_id, :regime_juridique_id, :quartier_id, :nbre_employes, :date_creation, :organigramme)");

        // Bind values
        $this->box->bind(':regime_juridique_id', $data['regime_juridique_id']);
        $this->box->bind(':quartier_village_id', $data['quartier_village_id']);

        // $this->box->bind(':quartier_id', $data['quartier_id']);


        $this->box->bind(':repondant_id', $last_id);
        $this->box->bind(':secteur_id', $data['secteur_id']);
        $this->box->bind(':nom_entreprise', $data['nom_entreprise']);
        $this->box->bind(':rccm', $data['rccm']);
        $this->box->bind(':ninea', $data['ninea']);
        $this->box->bind(':nbre_employes', (int)$data['nbre_employes']);
        $this->box->bind(':page_web', $data['page_web']);
        $this->box->bind(':siege_social', $data['siege_social']);
        $this->box->bind(':date_creation', $data['date_creation']);
        $this->box->bind(':organigramme', $data['organigramme']);
        $this->box->bind(':dispositif_formation', $data['dispositif_formation']);
        $this->box->bind(':cotisation_sociale', $data['cotisation_sociale']);
        $this->box->bind(':contrat_formel', $data['contrat_formel']);

        if($this->box->execute()){
            echo "Yes";
        //    return true;
        }else{
            echo "No";
            // return false;
        }
    }

    public function liste(){
        //  
    }

    public function update(){
        // 
    }

    public function delete(){
        // 
    }
}