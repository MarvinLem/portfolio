<?php
function wpm_custom_post_type()
{
    $labels = array(
        'name' => 'Projets',
        'singular_name' => 'Projet',
        'menu_name' => 'Projets',
        'all_items' => 'Tous les projets',
        'view_item' => 'Voir les projets',
        'add_new_item' => 'Ajouter un nouveau projet',
        'add_new' => 'Ajouter',
        'edit_item' => 'Editer le projet',
        'update_item' => 'Modifier le projet',
        'search_items' => 'Rechercher un projet',
        'not_found' => 'Non trouvé',
        'not_found_in_trash' => 'Non trouvé dans la corbeille',
    );
    $args = array(
        'label' => 'Projets',
        'description' => 'Tous les projets',
        'labels' => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => __('dashicons-welcome-add-page'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'projets'),
    );
    register_post_type('projets', $args);
}

function wpm_custom_post_type_skills()
{
    $labels = array(
        'name' => 'Compétences',
        'singular_name' => 'Compétence',
        'menu_name' => 'Compétences',
        'all_items' => 'Toutes les compétences',
        'view_item' => 'Voir les compétences',
        'add_new_item' => 'Ajouter une nouvelle compétence',
        'add_new' => 'Ajouter',
        'edit_item' => 'Editer la compétence',
        'update_item' => 'Modifier la compétence',
        'search_items' => 'Rechercher une compétence',
        'not_found' => 'Non trouvé',
        'not_found_in_trash' => 'Non trouvé dans la corbeille',
    );
    $args = array(
        'label' => 'Compétences',
        'description' => 'Toutes les compétences',
        'labels' => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => __('dashicons-hammer'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'skills'),
    );
    register_post_type('skills', $args);
}

function wpm_custom_post_type_about()
{
    $labels = array(
        'name' => 'A propos',
        'singular_name' => 'A propos',
        'menu_name' => 'A propos',
        'all_items' => 'Toutes les informations',
        'view_item' => 'Voir les informations',
        'add_new_item' => 'Ajouter une nouvelle information',
        'add_new' => 'Ajouter',
        'edit_item' => "Editer l'informations",
        'update_item' => "Modifier l'informations",
        'search_items' => 'Rechercher une informations',
        'not_found' => 'Non trouvé',
        'not_found_in_trash' => 'Non trouvé dans la corbeille',
    );
    $args = array(
        'label' => 'A propos',
        'description' => 'Toutes les informations',
        'labels' => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => __('dashicons-admin-users'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'about'),
    );
    register_post_type('about', $args);
}

function remove_menus(){
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'upload.php' );
    remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'users.php' );
}

function send_mail(){
    $destination = "marvin.lemarchand@student.hepl.be";
    $message_send = "Votre message a bien été envoyé";
    $message_not_send = "Une erreur s'est produise votre message n'a pas été envoyé";
    $error = "Certains champs n'ont pas été completés";

    if (!isset($_POST['envoi']))
    {
        //formulaire non envoyé
        echo '<p>'.$error.'</p>'."\n";
    }
    else {

        function rec($text)
        {
            $text = htmlspecialchars(trim($text), ENT_QUOTES);
            if (1 === get_magic_quotes_gpc()) {
                $text = stripslashes($text);
            }

            $text = nl2br($text);
            return $text;
        }

        ;

        function isEmail($email)
        {
            $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
            return (($value === 0) || ($value === false)) ? false : true;
        }

        $nom = (isset($_POST['nom'])) ? rec($_POST['nom']) : '';
        $prenom = (isset($_POST['nom'])) ? rec($_POST['nom']) : '';
        $email = (isset($_POST['email'])) ? rec($_POST['email']) : '';
        $mobile = (isset($_POST['mobile'])) ? rec($_POST['mobile']) : '';
        $message = (isset($_POST['message'])) ? rec($_POST['message']) : '';

        $email = (isEmail($email)) ? $email : '';

        if (($nom != '') && ($prenom != '') && ($email != '') && ($message != '')) {
            $headers = 'From:' . $nom . ' ' . $prenom . ' <' . $email . '>' . "\r\n" .
                'Reply-To:' . $email . "\r\n" .
                'Mobile Number:' . $mobile. "\r\n" .

                $message = str_replace("&#039;", "'", $message);
            $message = str_replace("&#8217;", "'", $message);
            $message = str_replace("&quot;", '"', $message);
            $message = str_replace('<br>', '', $message);
            $message = str_replace('<br />', '', $message);
            $message = str_replace("&lt;", "<", $message);
            $message = str_replace("&gt;", ">", $message);
            $message = str_replace("&amp;", "&", $message);

            $cible = $destination;

            $num_emails = 0;
            $tmp = explode(';', $cible);
            foreach ($tmp as $email_destinataire) {
                if (mail($email_destinataire, $message, $headers))
                    $num_emails++;
            }

            echo '<p>' . $message_send . '</p>';

        } else {

            echo '<p>' . $message_not_send . '</p>';

        };
    }
    header( "Location: http://www.lemarchandmarvin.com/");
}

add_image_size( 'screenshot', 720, 340 );

add_action( 'admin_post_nopriv_send_form', 'send_mail' );
add_action( 'admin_post_send_form', 'send_mail' );

add_action( 'init', 'wpm_custom_post_type', 0 );
add_action( 'init', 'wpm_custom_post_type_skills', 0 );
add_action( 'init', 'wpm_custom_post_type_about', 0 );
add_action( 'admin_menu', 'remove_menus', 0 );