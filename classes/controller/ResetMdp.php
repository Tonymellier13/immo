</head>

<body>

    <?php
    require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../utils/Utils.php";


    if (isset($_POST['mailMdp']) && !isset($_POST['validerMdp'])) {
        if (ModelUser::existeMail($_POST["mail"])) {
            viewUser::resetMdp($_POST['mail']);
        } else {
            viewTemplate::alert('danger', 'mail inexistant ',  'mdpOublier.php');
            var_dump("non ok");
        }
    } elseif (isset($_POST['validerMdp'])) {
        ($_POST['pass2'] === $_POST['pass3']) ? ModelUser::resetMdp($_POST['mail1'], $_POST['pass2']) . viewTemplate::alert('success','Changement de mot de passe réussi','Accueil.php'): var_dump("nonnnnn");
    } else {
        viewUser::mailMdp();
       
    }


    ?>