<?php 

require_once "../config.php";

$id = $_POST['id'];

?>

<option value="-">--pilih tanggal mulai--</option>
<?php
$result = selectjumlahjam($id);
while ($row = mysqli_fetch_assoc($result)){
    ?>
    <option value="<?= $row["id"]; ?>"><?= $row["jumlah_jam"];?></option>
    <?php 
}
?>
