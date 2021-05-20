<?php
class ViewTemplate
{
    public static function alert($message, $type, $lien)
    {
?>
        <div class=" container text-center alert alert-<?php echo $type; ?>" role="alert">
            <?php echo $message; ?>
            <br />Cliquez <a href="<?php echo $lien ?>"> ici</a> pour continuer la navigation.
        </div>
    <?php
    }
    public static function footer()
    {
    ?>
        <footer class="bg-light text-center text-lg-start">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);"><span>Portfolio Team ©<?php echo date("Y"); ?> </span></div>

        </footer>

    <?php }
    public static function menu()
    {
    ?><nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand" href="../controller/CreationUser.php">Imoo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="creationuser.php">Creation user</a>
                    </li>
                   

                </ul>

            </div>
        </nav>
<?php }
}