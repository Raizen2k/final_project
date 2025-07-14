<?php 
    include 'base.php';

    function login($mail, $mdp) {
        $connexion = base();

        $query = "SELECT * FROM obj_membres WHERE email='%s' AND mdp='%s'";
        $query = sprintf($query, $mail , $mdp );
        $result = mysqli_query(base() , $query);

        if (mysqli_num_rows($result) == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    function getId( $mail ){
        $querry = "SELECT * FROM obj_membres WHERE email = '%s'";
        $querry = sprintf( $querry, $mail );
        return mysqli_fetch_assoc(mysqli_query(base() ,$querry ))["id_membre"];
    }

    function exists( $mail ){
        $querry = "SELECT * FROM obj_membres WHERE email = '%s'";
        $querry = sprintf( $querry, $mail );
        return mysqli_num_rows(mysqli_query(base() ,$querry )) > 0;
    }

    function insererMembre(  $nom , $anniv, $genre , $mail , $ville , $mdp ){
        $querry = "INSERT INTO obj_membres (nom , date_naissance , genre , email , ville , mdp ) VALUES ('%s', '%s')";
        $querry = sprintf( $querry, $nom , $anniv, $genre , $mail , $ville , $mdp );
        mysqli_query(base() ,$querry );
    }
