
include_once '../internal/dbconnection.php';
header('Content-Type: text/html; charset=utf-8');
// Conecta com o Banco de Dados


public class Service {


    function getData() {
        $conexao = connect();
        $str1 = "select (select count(siape) from avaliacao where siapeaval like siape) "
                . " /(select count(*) from avaliado where Situacao not like 'impedido') * 100 as total";

        $conn = connect();
        $res1 = mysql_query ($str1, $conn);
        $fetch = mysql_fetch_assoc ($res1);
        mysql_close ($conn);

        return json_encode(array('status'  => 'success', 'data' => $fetch));
    }

}