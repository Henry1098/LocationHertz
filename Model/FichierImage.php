<?php

class FichierImage{

private $Img;

    public function transfert(){
        $ret        = false;
        $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];
            $uploads_dir = 'uploads';
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['fic']['type'];
            $img_nom  = $_FILES['fic']['name'];
            $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);

            if (!is_dir($uploads_dir)) {
                mkdir($uploads_dir, 0777, true);
                copy($img_nom, "$uploads_dir");
            }
            
            return "$uploads_dir/$img_nom";
        }
    }



}
?>