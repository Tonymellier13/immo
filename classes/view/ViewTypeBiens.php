
<?php
require_once "../model/ModelTypeBiens.php";
class ViewTypeBien
{
    public static function TypeBien()
    {
    ?>
        <div class="container ">
            <div id="id"></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="id" method="post">
                <div class="form-group">
                    <input type="text" id="libelle" name="libelle" class="form-control" placeholder="libelle">
                </div>
                <div>
                    <button type="submit" id="ajoutBien" name="ajoutBien" class="btn btn-primary">Valider</button>
                </div>

            </form>

        </div>
    <?php
    }
    public static function ListeTypeBien()
    {
        $types = ModelTypeBien::ListeTypeBien();

    ?>
        <table class="container">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">type_bien</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($types as $type) {
                ?>
                <tr>
                    <th><?php echo $type["id"] ?></th>
                    <td><?php echo $type["libelle"] ?></td>
                    
                    <td><a class="btn btn-primary" target="_blank" href="ModifTypeBien.php?id=<?php echo $type["id"] ?>&libelle=<?php echo $type["libelle"] ?>" role="button">Modifier Type</a></td>
                    <td><a class="btn btn-danger" target="_blank" href="SupprimeType.php?id=<?php echo $type["id"] ?>" role="button">SupType</a></td>              
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    }
    public static function modifTypeBien(){
        ?>
        <div class="container ">
            <div id="id"></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="id" method="post">
                <div class="form-group">
                    <input type="text" id="libelle" name="libelle" class="form-control" value="<?php echo $_GET["libelle"] ?>" placeholder="Libelle">
                </div>
                <div>
                    <button type="submit" id="valider" name="valider" value="<?php echo $_GET["id"] ?>" class="btn btn-primary">Valider</button>
                </div>
            </form>

        </div>
    <?php
   
    }
}


?>