<?php

    // Fonction permettant de vérifier si un champ du formulaire n'est pas vide et bien rempli
    function is_valid($str) {
        return isset($_POST[$str]) && !empty($_POST[$str]) && trim($_POST[$str]) !== "";
    }

    // Fonction permttant de vérifier que tout les champs sont valides
    function is_everything_valid() {
        return (
            is_valid('pseudo') &&
            is_valid('mail') &&
            is_valid('password') &&
            is_valid('check-password')
        );
    }

    // Fonction permettant d'update un utilisateur avec les nouvelles informations fournies 
    function update_user($userManager, $userId) {
        $postUser = [
            'id_user' => $userId,
            'pseudo' => $_POST['pseudo'],
            'mail' => $_POST['mail'],
            'password' => $_POST['password'],
            'is_admin' => 0
        ];

        // Update de l'utilisateur 
        $user = new User();
        $user->hydrate($postUser);
        $userManager->update($user);

        $_SESSION['mail'] = $user->get_mail();
        $_SESSION['pseudo'] = $user->get_pseudo();
    }

    // Fonction permettant d'update un utilisateur en envoyant les données uniqument si les champs sont correctement remplis, et que les mots de passe correspondent 
    function send_data($userManager, $userId) {
        if (isset($_POST['submit']) && is_everything_valid()) {
            if ($_POST['password'] == $_POST['check-password']) {
                update_user($userManager, $userId);

                header("Location: home.php");
            } else {
                echo 'Password are not the same';
            }
        }
    }

?>