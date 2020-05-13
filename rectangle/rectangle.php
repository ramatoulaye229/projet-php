<!--
saisir la longueur et la largeur d'un rectangle à partir du formilaire
longueur positif
largeur positif 
longuer>largeur
longueur et largeur doivent etre numeric(entier,reel)
traitements
-calculer le Dp
-calculer P
-calculer la S 
-calculer la diagnonal
    -->
    <? php
    require_once ( "validation.php" );
    require_once ( "rectangleController.php" );
$ errors = [];
$ resultat = [];
$ longueur = "" ;
$ largeur = "" ;

// Ouvrir session_start ()
   session_start ();
   if (! isset ( $ _SESSION [ 'id' ])) {
    $ _SESSION [ 'id' ] = 0 ;
   }

   /// session_destroy ();

    if ( isset ( $ _POST [ 'btn_submit' ])) {

        if ( $ _POST [ 'btn_submit' ] === "calcul" ) {
        $ longueur = $ _POST [ 'longueur' ];
        $ largeur = $ _POST [ 'largeur' ];
         $ result = is_empty ( $ longueur );
         if ( $ result ! == true ) {
            $ errors [ 'longueur' ] = $ result ;

         }

         $ result = is_empty ( $ largeur );
         if ( $ result ! == true ) {
            $ errors [ 'largeur' ] = $ result ;

         }
         if ( count ( $ errors ) === 0 ) {
            $ result = compare ( $ longueur , $ largeur );
            if ( $ result === true ) {
                      $ resultat [ "demi_perimetre" ] = demi_perimetre ( $ longueur , $ largeur );
                      $ resultat [ "perimetre" ] = perimetre ( $ longueur , $ largeur );
                      $ resultat [ "surface" ] = surface ( $ longueur , $ largeur );
                      $ resultat [ "diagonale" ] = diagonale ( $ longueur , $ largeur );
                      $ id = $ _SESSION [ 'id' ];
                      $ id ++;
                      $ _SESSION [ "Resultat" . $ id ] = $ resultat ;
                      $ _SESSION [ 'id' ] = $ id ;



            } else {
                $ erreurs = $ résultat ;
            }
         }

            if ( isset ( $ errors [ 'longueur' ])) {
                $ longueur = "" ;
            }
            if ( isset ( $ errors [ 'largeur' ]))) {
                $ largeur = "" ;
            }

        } else {
            session_destroy ();
        }
    }


 ?>

<! doctype html >
< html  lang = " en " >
  < tête >
    < titre > Titre </ titre >
    <! - Balises META requises ->
    < meta  charset = " utf-8 " >
    < meta  name = " viewport " content = " width = device-width, initial-scale = 1, shrink-to-fit = no " >

    <! - Bootstrap CSS ->
    < Link  rel = " stylesheet " href =" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css " intégrité =" SHA384-ggOyR0iXCbMQv3Xipma34MD + dH / 1fQ784 / j6cY / iJTQUOhcWr7x9JvoRxT2MZw1T " crossorigin = " anonyme " >
  </ tête >
  < corps >

         < div  class = " container mt-5 " >

         <? php  if ( isset ( $ errors [ 'all' ]))) {
             $ largeur = "" ;
             $ longueur = "" ;

         ?>
         < div  class = " alert alert-danger col-4 " >
             < strong > Erreur </ strong >  <? php  echo  $ errors [ 'all' ]; ?>
         </ div >
        <? php
        }
        ?>
             < form  method = " post " action = "" >
                 < div  class = " form-group row " >
                     < label  for = " inputName " class = " col-sm-1-12 col-form-label " > Longueur </ label >
                     < div  class = " col-6 ml-2 " >
                         < input  type = " text " class = " form-control " name = " longueur " value = " <? = $ longueur ?> " id = " inputName " placeholder = "" >
                     </ div >
            <? php  if ( isset ( $ errors [ 'longueur' ])) {


            ?>
                     < div  class = " alert alert-danger col-4 " >
                         < strong > Erreur </ strong >  <? php  echo  $ errors [ 'longueur' ]; ?>
                     </ div >
             <? php
            }
            ?>

                 </ div >
                 < div  class = " form-group row " >
                     < label  for = " inputName " class = " col-sm-1-12 col-form-label " > Largeur </ label >
                     < div  class = " col-6 ml-3 " >
                         < input  type = " text " class = " form-control " name = " largeur " value = " <? = $ largeur ?> " id = " inputName " placeholder = "" >
                     </ div >

                     <? php  if ( isset ( $ errors [ 'largeur' ])) {

                    ?>
                    < div  class = " alert alert-danger col-4 " >
                        < strong > Erreur </ strong >  <? = $ errors [ 'largeur' ]; ?>
                    </ div >
                 <? php
                 }
                ?>
                 </ div >

                 < div  class = " form-group row " >
                     < div  class = " offset-sm-2 col-sm-2 " >
                         < button  type = " submit " name = " btn_submit " value = " calcul " class = " btn btn-primary " > Calculatrice </ button >
                     </ div >
                     < div  class = " col-sm-2 " >
                         < button  type = " submit " name = " btn_submit " value = " reinitialisation " class = " btn btn-secondary " > Réinitialiseur </ button >
                     </ div >
                 </ div >
             </ formulaire >
         </ div >
<? php
      if ( isset ( $ _POST [ 'btn_submit' ]) && $ _POST [ 'btn_submit' ] === "calcul" && count ( $ errors ) === 0 ) {
?>
        < table  class = " table container bordé de table " >
            < thead >
                < tr >
                    < th > Demi-Périmètre </ th >
                    < th > Preimetre </ th >
                    < th > Surface </ th >
                    < th > Diagonale </ th >
                </ tr >
            </ thead >
            < tbody >
            <? php
                foreach ( $ _SESSION  comme   $ resultat ) {

            ?>
                < tr >
                    < td  scope = " row " > <? = $ resultat [ "demi_perimetre" ] ?> </ td >
                    < td > <? = $ resultat [ "perimetre" ] ?> </ td >
                    < td > <? = $ resultat [ "surface" ] ?> </ td >
                    < td > <? = $ resultat [ "diagonale" ] ?> </ td >
                </ tr >

                <? php
                }
                ?>

            </ tbody >
        </ table >

    <? php
       }
 ?>

    <! - JavaScript en option ->
    <! - jQuery d'abord, puis Popper.js, puis Bootstrap JS ->
    < Scénario  src = " https://code.jquery.com/jquery-3.3.1.slim.min.js " intégrité =" SHA384-Q8i / X + 965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH + 8abtTE1Pi6jizo " crossorigin =" anonyme " > </ scénario >
    < Scénario  src = " https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " intégrité =" SHA384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin =" anonyme " > </ script >
    < Scénario  src = " https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " intégrité =" SHA384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf / nJGzIxFDsf4x0xIM + B07jRM " crossorigin =" anonyme " > </ scénario >
  </ corps >
</ html >