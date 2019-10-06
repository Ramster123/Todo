<?php require_once 'inc/top.php'; ?>
<h3>Poista tehtävä</h3>
<?php
try {
    $idt = filter_input(INPUT_POST,'id',FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $where = "";

    if ($idt) {
        foreach ($idt as $id) {
            if (is_numeric($id)) {
                if (strlen($where) > 0) {
                    $where .= " OR ";
                }
                $where .= "id = $id";
            }
        }
    }

    if (strlen($where) > 0) {
        $sql = "DELETE FROM task WHERE $where;";
        $query = $db->query($sql);
        $query->execute();
    }
    print "<p>Valitut tehtävät poistettu listalta!</p>";
}
catch (PDOExpection $pdoex) {
    print "<p>Tietojen päivittäminen epäonnistui." . $pdoex->getMessage() . "</p>";
    }
    ?>
<?php require_once 'inc/bottom.php'; ?>