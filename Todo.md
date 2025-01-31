Base de donne
    Table habitation(
        id_habitaion
        id_type(int)
        nb chambre
        loyer_par_jour
        quartier
        description
    )
    table type(
        id_()
        nomtype
    )
    table quartier(
        id_
        nomquartier
    )
    table photos(
        id_photo
        photos
        id_habitation
    )
    table Client(
        id_client
        nomClient
        mdp
        numero_telephone
        mail
    )
    table admin(
        id_admin
        nomAdmin
        mdpAdmin
    )
    table reservation(
        id_reservation
        date_debut
        date_fin
        id_habitation
        id_client
    )
    VIEW:all
        habitation_quartier
        habitation_photo
        habitaion_type
    

backoffice
    login
        login_admin(connexion,inscription)¨{
            affichage(
                photos type quartier loyer_par_jour,all
                =>page_liste avec boutton suppr modif ajout habitation 
            )
            fonction(
                getListeHabitation
                CRUD
            )
            Integration(
                appel getListeHabitation
                CRUD
            )
            Base(
                VIEW ALL
            )
        }


frontoffice
    page inscription_client{
        afichage(
            nom 
            mail
            numero_telephone
            mdp
        )
        fonction(
            modelClient:insertionClient(nom,mail,numero_telephone,mdp)
        )
        Integration(
            ControllerClient:appel fonction insertionClient
                redirection vers login_client
        )
        Base(
            client
        )
    }

    page login_client(connexion){
        afichage(
            nom 
            mail
            numero_telephone
            mdp
        )
        fonction(
            modelClient:connexionClient(nom,mail,numero_telephone,mdp)
        )
        Integration(
            ControllerClient:appel fonction connexionClient
                redirection vers frontoffice/page_liste_habitation
        )
        Base(
            client
        )
    }

    page_liste_habitation{
        afichage(
            header(recherche description eo ambony)
            tableau liste des habitations
                a chaque habitation un lien vers page_detail_habitaion et reservation(reserver)
        )
        fonction(
            modelHabitation:getListeHabitation()
        )
        Integration(
            ControllerHabitation:appel fonction getListeHabitation
                redirection vers frontoffice/page_detail_habitaion si clique photos
                redirection vers frontoffice/page_reservation si clique reserver
                recherche par description->appel fonction rechercheParDescription
        )
        Base(
            view all
            reservation
        )
    }

    =>page_detail_habitaion(type,nb_chambre,description,photos){
        afichage(
            type,quartier,photos 
            boutton
        )
        fonction(
            modelHabitation:getDetails()
        )
        Integration(
            ControllerHabitation:appel fonction getDetails
                redirection vers frontoffice/page_liste_habitation
        )
        Base(
            view all
        )
    }

        
    page_reservation
        affichage
            page insertion_reservation
                date debut arrive
                date fin depart
                erreur si deja pris

        fonction
            ModelReservation
                insertionReservation
                    true
                    false
            
            ControllerReservation
                appel fonction insertionReservation et redirection vers page_liste_habitation avec message de succes
                si cas erreur (deja prise) redirection vers page_reservation avec message d erreur
    

