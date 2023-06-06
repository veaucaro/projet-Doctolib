<!-- ----- debut ModelRDV -->

<?php
require_once 'Model.php';

class ModelRDV {

    private $id, $patient_id, $praticien_id, $rdv_date;

    public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->patient_id = $patient_id;
            $this->praticien_id = $praticien_id;
            $this->rdv_date = $rdv_date;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPatient($patient_id) {
        $this->patient_id = $patient_id;
    }

    function setPraticien($praticien_id) {
        $this->praticien_id = $praticien_id;
    }

    function setDate($rdv_date) {
        $this->rdv_date = $rdv_date;
    }

    function getId() {
        return $this->id;
    }

    function getPatient() {
        return $this->patient_id;
    }

    function getPraticien() {
        return $this->praticien_id;
    }

    function getDate() {
        return $this->rdv_date;
    }

// Retourne tous les RDV
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des RDV
    public static function getRDV() {
        try {
            $database = Model::getInstance();
            $query = "select patient_id, praticien_id, rdv_date from rendezvous WHERE patient_id != 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results5 = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results5;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des dispos du praticien connecté
    public static function getDisposPra($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select rdv_date from rendezvous WHERE patient_id = 0 AND praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'praticien_id' => $praticien_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des RDV pris par les patients
    public static function getRDVpris($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select p.nom, p.prenom, r.rdv_date from rendezvous r, personne p WHERE r.patient_id=p.id AND r.patient_id != 0 AND r.praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'praticien_id' => $praticien_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // RDV d'un patient donné
    public static function getmesRDV($patient_id) {
        try {
            $database = Model::getInstance();
            $query = "select p.nom, p.prenom, rdv_date from rendezvous r, personne p WHERE r.praticien_id=p.id AND r.patient_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $patient_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //Retourne une liste de praticiens à sélectionner
    public static function getAllNamesPra() {
        try {
            $database = Model::getInstance();
            $query = "select nom, prenom from personne WHERE statut= 1 ;";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            $names = array();
            foreach ($results as $result) {
                $names[] = $result['nom'] . ' ' . $result['prenom'];
            }

            return $names;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Retourne les noms et prénoms du praticien sélectionné
    public static function getNomPrenom($names) {
        $names = explode(' ', $names);
        $nom = $names[0];
        $prenom = $names[1];

        $praticien = array('nom' => $nom,
            'prenom' => $prenom);

        return $praticien;
    }

    //Retourne une liste de dates en fonction du praticien sélectionné
    public static function getAllRDVPra($names) {
        try {
            //mettre sous une forme utilisable les noms du praticien sélectionné à l'étape d'avant
            $nomPrenom = self::getNomPrenom($names);
            $nom = $nomPrenom['nom'];
            $prenom = $nomPrenom['prenom'];

            $database = Model::getInstance();
            $query = "select rdv_date from rendezvous r, personne p WHERE r.praticien_id=p.id AND p.nom = :nom AND p.prenom = :prenom AND r.patient_id = 0";
            $statement = $database->prepare($query);
            $statement->execute([
                'nom' => $nom,
                'prenom' => $prenom
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Insertion du RDV dans la table en fonction des informations données 
    public static function getRDV2($nom, $prenom, $RDV, $patient_id) {
        try {
            $database = Model::getInstance();

            // recherche de l'id du praticien souhaité
            $query1 = "select id from personne p WHERE p.nom = :nom AND p.prenom = :prenom";
            $statement1 = $database->prepare($query1);
            $statement1->execute([
                'nom' => $nom,
                'prenom' => $prenom,
            ]);
            $tuple = $statement1->fetch();
            $praticien_id = $tuple['0'];

            // exécution de la mise à jour pour inscrire le RDV au nom du patient
            $query = "UPDATE rendezvous set patient_id = :patient_id WHERE praticien_id = :praticien_id AND rdv_date = :RDV ; ";
            $statement = $database->prepare($query);
            $statement->execute([
                'RDV' => $RDV,
                'patient_id' => $patient_id,
                'praticien_id' => $praticien_id
            ]);
            return $RDV;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getDispos($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous WHERE patient_id = 0 AND praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'praticien_id' => $praticien_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 3);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getdispoSuppr($praticien_id, $dispo) {
        try {
            $database = Model::getInstance();

            $query = "DELETE FROM rendezvous WHERE patient_id = 0 AND praticien_id = :praticien_id AND rdv_date = :rdv_date";
            $statement = $database->prepare($query);
            $statement->execute([
                'rdv_date' => $dispo,
                'praticien_id' => $praticien_id
            ]);

            // Vérifier si la suppression a réussi
            $suppr = $statement->rowCount(); // Nombre de lignes supprimées

            return $suppr;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelRDV -->
