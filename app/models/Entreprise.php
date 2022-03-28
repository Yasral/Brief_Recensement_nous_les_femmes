<?php
Class Entreprise{
    private $db;
    // private $box;

    public function __construct(){
        $this->db = new Database;
        // $this->box = new Database;
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

        $this->db->query("INSERT INTO Entreprise (user_id, regime_juridique_id, quartier_village_id, repondant_id, secteur_id, nom_entreprise, rccm, ninea, nbre_employes, page_web, siege_social, date_creation, organigramme, dispositif_formation, cotisation_sociale, contrat_formel) VALUES (:user_id, :regime_juridique_id, :quartier_village_id, :repondant_id, :secteur_id, :nom_entreprise, :rccm, :ninea, :nbre_employes, :page_web, :siege_social, :date_creation, :organigramme, :dispositif_formation, :cotisation_sociale, :contrat_formel)");
        //$this->box->query("INSERT INTO Boxing (repondant_id, regime_juridique_id, quartier_village_id, nbre_employes, date_creation, organigramme) VALUES (:repondant_id, :regime_juridique_id, :quartier_id, :nbre_employes, :date_creation, :organigramme)");

        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':regime_juridique_id', $data['regime_juridique_id']);
        $this->db->bind(':quartier_village_id', $data['quartier_village_id']);

        // $this->box->bind(':quartier_id', $data['quartier_id']);


        $this->db->bind(':repondant_id', $last_id);
        $this->db->bind(':secteur_id', $data['secteur_id']);
        $this->db->bind(':nom_entreprise', $data['nom_entreprise']);
        $this->db->bind(':rccm', $data['rccm']);
        $this->db->bind(':ninea', $data['ninea']);
        $this->db->bind(':nbre_employes', (int)$data['nbre_employes']);
        // $this->db->bind(':nbre_employes', $data['nbre_employes']);
        $this->db->bind(':page_web', $data['page_web']);
        $this->db->bind(':siege_social', $data['siege_social']);
        $this->db->bind(':date_creation', $data['date_creation']);
        $this->db->bind(':organigramme', $data['organigramme']);
        $this->db->bind(':dispositif_formation', $data['dispositif_formation']);
        $this->db->bind(':cotisation_sociale', $data['cotisation_sociale']);
        $this->db->bind(':contrat_formel', $data['contrat_formel']);

        if($this->db->execute()){
            echo "Entreprise successfully saved";
        //    return true;
        }else{
            echo "Entreprise not saved";
            // return false;
        }
    }

    public function liste(){
        // Enabling the database connection
        $this->db->query('SELECT * , nom_repondant FROM Entreprise INNER JOIN Repondant ON repondant_id = id_repondant'); 

        $results = $this->db->resultSet();

        return $results;
    }

    public function modifier($data){
        $this->db->query("UPDATE Repondant SET fonction_id = :fonction_id, nom_repondant = :nom_repondant, prenom_repondant = :prenom_repondant, numero_repondant = :numero_repondant, email_repondant = :email_repondant WHERE id_repondant = :repondant_id");

        echo "First step Repondant query";

        // $this->db->query("UPDATE Repondant SET fonction_id = :fonction_id WHERE id_repondant = :repondant_id");

        // Bind values
        // $this->db->bind(':id_repondant', $data['_id']);
        $this->db->bind(':repondant_id', $data['repondant_id']);
        $this->db->bind(':fonction_id', $data['fonction_id']);
        $this->db->bind(':nom_repondant', $data['nom_repondant']);
        $this->db->bind(':prenom_repondant', $data['prenom_repondant']);
        $this->db->bind(':numero_repondant', $data['numero_repondant']);
        $this->db->bind(':email_repondant', $data['email_repondant']);

        echo "First step Repondant bind";

        if($this->db->execute()){
            echo "Repondant {$data['repondant_id']} successfully updated ";
        }else{
            echo "Repondant {$data['repondant_id']} not saved";
        }

        echo "First step Repondant execution";

        // Getting the updated repondant id

        echo "Second step Entreprise query";

        $this->db->query("UPDATE Entreprise SET user_id = :user_id, regime_juridique_id = :regime_juridique_id, quartier_village_id = :quartier_village_id, repondant_id = :repondant_id, secteur_id = :secteur_id, nom_entreprise = :nom_entreprise, rccm = :rccm, ninea = :ninea, nbre_employes = :nbre_employes, page_web = :page_web, siege_social = :siege_social, date_creation = :date_creation, organigramme = :organigramme, dispositif_formation = :dispositif_formation, cotisation_sociale = :cotisation_sociale, contrat_formel = :contrat_formel WHERE id_entreprise = :id_entreprise");

        // Bind values
        $this->db->bind(':id_entreprise', $data['id_entreprise']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':regime_juridique_id', $data['regime_juridique_id']);
        $this->db->bind(':quartier_village_id', $data['quartier_village_id']);

        // $this->db->bind(':repondant_id', $updated_id);
        $this->db->bind(':repondant_id', $data['repondant_id']);
        $this->db->bind(':secteur_id', $data['secteur_id']);
        $this->db->bind(':nom_entreprise', $data['nom_entreprise']);
        $this->db->bind(':rccm', $data['rccm']);
        $this->db->bind(':ninea', $data['ninea']);
        // $this->db->bind(':nbre_employes', (int)$data['nbre_employes']);
        $this->db->bind(':nbre_employes', (int)$data['nbre_employes']);
        $this->db->bind(':page_web', $data['page_web']);
        $this->db->bind(':siege_social', $data['siege_social']);
        $this->db->bind(':date_creation', $data['date_creation']);
        $this->db->bind(':organigramme', $data['organigramme']);
        $this->db->bind(':dispositif_formation', $data['dispositif_formation']);
        $this->db->bind(':cotisation_sociale', $data['cotisation_sociale']);
        $this->db->bind(':contrat_formel', $data['contrat_formel']);

        var_dump($data);
        echo "Second step Entreprise bind";

        if($this->db->execute()){
            //echo "Entreprise {$data['id_entreprise']} was successfully updated ";
            echo "Entreprise was successfully updated ";
        }else{
            echo "Entreprise was not saved";
        }

        echo "Second step entreprise executed";
    }

    public function delete(){
        // 
    }

    // This function retrieve an entreprise id
    public function findEntrepriseById($id){
        $this->db->query("SELECT * FROM Entreprise INNER JOIN Repondant WHERE id_entreprise = :id_entreprise AND repondant_id = id_repondant");

        $this->db->bind(':id_entreprise', $id);

        $row = $this->db->single();

        return $row;
    }
}