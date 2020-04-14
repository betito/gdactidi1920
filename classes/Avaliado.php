<?php

class Avaliado
{

    var $className = "Avaliado";

    var $tableName = "";

    var $showCommandFlag = FALSE;

    var $dataname = [
        "id" => "",
        "nome" => "",
        "tipo" => "", /* servidor ou chefia*/
        "unid_org" => "",
        "sigla_org" => "",
        "siape" => "",
        "cargo" => "",
        "ramal" => "",
        "email" => "",
        "grupo" => "",
        "subordinacao" => "",
        "Situacao" => "",
        "senha" => "",
        "visivel" => "",
        "datereg" => ""

    ];

    var $data = [];

    public function Avaliado()
    {
        $this->tableName = strtolower($this->className);

        foreach ($this->dataname as $k => $v) {
            $this->data[$k] = "";
        }
        $this->data["id"] = - 1; // -1 quer dizer que está vazio
    }

    public function setData($data)
    {
        foreach ($data as $fieldname => $v) {

            if (isset($this->dataname[$fieldname])) {
                $this->data[$fieldname] = $data[$fieldname];
            } else {
                echo ("field not found :: " . $fieldname);
            }
        }
    }

    public function setField($fname, $value)
    {
        if (isset($this->dataname[$fname])) {
            $this->data[$fname] = $value;
        }
    }

    public function getField($fname)
    {
        if (isset($this->dataname[$fname])) {
            return $this->data[$fname];
        }
    }

    public function setDataFromForm($post)
    {
        foreach ($post as $fieldname => $v) {
            if (isset($this->dataname[$fieldname])) {
                $this->data[$fieldname] = htmlentities($post[$fieldname]);
            }
        }
    }

    public function setAllFromDB($dbassocarray)
    {
        foreach ($dbassocarray as $fieldname => $v) {
            if (isset($this->dataname[$fieldname])) {
                $this->data[$fieldname] = $dbassocarray[$fieldname];
            }
        }
    }

    public function printData()
    {
        foreach ($this->data as $fieldname => $v) {
            echo ($this->dataname[$fieldname] . " = [" . $this->data[$fieldname] . "]");
        }
    }

    public function showCommand($com)
    {
        if ($this->showCommandFlag) {
            echo ("<br/><i><b>Command @" . $this->className . "</i></b><br/>");
            echo ("<br/>" . $com . "<br/>");
        }
    }

    public function getFieldsInComma()
    {
        $str = "";
        foreach ($this->dataname as $k => $v) {
            if ($k != "id") {
                $str = $str . $k . ", ";
            }
        }
        return rtrim(trim($str), ",");
    }

    public function getFieldsValuesInComma()
    {
        $str = "";
        foreach ($this->data as $k => $v) {
            if ($k != "id") {
                $str = $str . "'" . $v . "', ";
            }
        }

        return rtrim(trim($str), ",");
    }

    public function getPairsFieldsValues()
    {
        $str = "";
        foreach ($this->data as $k => $v) {
            if ($k != "id") {
                $str = $str . $k . " = '" . $v . "', \n";
            }
        }

        return rtrim(trim($str), ",");
    }

    public function insert($conn)
    {
        if ($this->data["id"] == - 1) {

            $this->data["datereg"] = date("Y-m-d H:i:s");
            $fn = $this->getFieldsInComma();
            $fv = $this->getFieldsValuesInComma();
            $command = "insert into " . $this->tableName . "(" . $fn . ") values " . "(" . $fv . ");";

            try {

                $this->showCommand($command);

                $res = mysql_query($command);
                if ($res) {
                    return True;
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
                return $command;
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "<br/>INSERT :: precisa setar o ID<br/>";
        }

        return False;
    }

    public function update($conn)
    {
        if ($this->data["id"] != "") {

            $command = "update " . $this->tableName . " set " . $this->getPairsFieldsValues() . " where id like \"" . $this->data["id"] . "\"";

            try {
                $this->showCommand($command);
                $res = mysql_query($command);

                if ($res) {
                    return true;
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "<br/>UPDATE :: precisa setar o Name<br/>";
        }

        return False;
    }
    
    public function updateCad($conn)
    {
        if ($this->data["id"] != "") {
            
            $command = "update " . $this->tableName .
                " set nome = \"" . $this->data["nome"] . "\", " .
                " siape = \"" . $this->data["siape"] . "\", " .
                " unid_org = \"" . $this->data["unid_org"] . "\", " .
                " sigla_org = \"" . $this->data["sigla_org"] . "\", " .
                " ramal = \"" . $this->data["ramal"] . "\", " .
                " email = \"" . $this->data["email"] . "\", " .
                " cargo = \"" . $this->data["cargo"] . "\"" .
                " where id like \"" . $this->data["id"] . "\"";
            
            try {
                $this->showCommand($command);
                $res = mysql_query($command);
                
                if ($res) {
                    return true;
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "<br/>UPDATE :: precisa setar o ID<br/>";
        }
        
        return False;
    }
    


    public function delete($conn)
    {

        // echo ($this->getField ( "id" ));
        if ($this->getField("id") != "-1") {

            $command = "delete from " . $this->tableName . " where id = " . $this->getField("id");

            try {

                $this->showCommand($command);

                $res = mysql_query($command);
                if ($res) {
                    return True;
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "<br/>Need set an ID up<br/>";
        }

        return False;
    }

    public function save($conn)
    {
        if ($this->data["name"] != "") {

            $res = null;
            if ($this->checkNameExists($conn)) {

                $res = $this->update($conn);
                echo ("================== UPDATE =========================");
            } else {
                $res = $this->insert($conn);
                echo ("================== INSERT =========================");
            }
        } else {
            echo "<br/>SAVE :: precisa setar o Name<br/>";
        }

        return False;
    }

    public function getAllAsArrayAssoc($conn)
    {
        $command = "SELECT * FROM " . $this->tableName . " order by nome asc";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocForUser($conn, $userid)
    {
        $command = "SELECT date_format(b.dateevent, '%d/%m/%Y') as dtevent, " . " date_format(b.dateeventend, '%d/%m/%Y') as dteventend, " . " b.*, b.localevent as blocal, b.hourevent as bhour, " . " b.linkinfo as blink,  e.name as ename, u.id as uis, u.name as uname " . " FROM board b " . " inner join event e on e.id = b.eventId " . " inner join user u on u.id = b.userid " . " where b.userid = " . $userid . " order by b.dateevent desc, b.hourevent asc, e.name asc ";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocForAdmin($conn, $userid)
    {
        $command = "SELECT date_format(b.dateevent, '%d/%m/%Y') as dtevent, " . " date_format(b.dateeventend, '%d/%m/%Y') as dteventend, " . " b.*, b.localevent as blocal, b.hourevent as bhour, " . " b.linkinfo as blink,  e.name as ename, u.id as uis, u.name as uname " . " FROM board b " . " inner join event e on e.id = b.eventId " . " inner join user u on u.id = b.userid " . " where (lower(b.moderate) like \"preparando\" and b.userid = " . $userid . ") or " . " (not (lower(b.moderate) like \"preparando\")) " . " order by b.dateevent desc, b.hourevent asc, e.name asc ";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocEditais($conn)
    {
        $command = "SELECT date_format(b.dateevent, '%d/%m/%Y') as dtevent, " . " date_format(b.dateeventend, '%d/%m/%Y') as dteventend, " . " b.*, b.localevent as blocal, b.hourevent as bhour, " . " b.linkinfo as blink,  e.name as ename " . " FROM board b " . " inner join event e on e.id = b.eventId " . " where moderate like \"ACEITO\" and " . " lower(e.name) like \"%edita%\" " . " b.datepublish <= curdate() " . " order by b.dateevent desc, b.hourevent asc, e.name asc ";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocAccepted($conn)
    {
        $command = "SELECT date_format(b.dateevent, '%d/%m/%Y') as dtevent, " . " date_format(b.dateeventend, '%d/%m/%Y') as dteventend, " . " b.*, b.localevent as blocal, b.hourevent as bhour, " . " b.linkinfo as blink,  e.name as ename " . " FROM board b " . " inner join event e on e.id = b.eventId " . " where moderate like \"ACEITO\" " . " order by b.dateevent desc, b.hourevent asc, e.name asc ";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocPublish($conn)
    {
        $command = "SELECT date_format(b.dateevent, '%d/%m/%Y') as dtevent, " . " b.*, e.name as ename " . " FROM board b " . " inner join event e on e.id = b.eventId " . " where b.datepublish <= curdate() " . " and moderate like \"ACEITO\"" . " order by b.dateevent desc, e.name asc ";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocPublishWhere($conn, $attrib, $value)
    {
        $command = "SELECT * "
            . " FROM " . $this->tableName . " WHERE " . $attrib . " LIKE \"". $value . "\"";


        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);

            if ($res) {

                if (mysql_num_rows($res) > 0){
                    while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                        array_push($result, $f);
                    }
                }else{

                    $result["status"] = "success";
                    $result["total"] = "0";
                    $result["msg"] = "Nenhum registro";
                }
                // var_dump($result);
            } else {
                $result["status"] = "error";
                $result["msg"] = mysql_error();
            }
        } catch (Exception $e) {
            $result["status"] = "error";
            $result["msg"] = 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function getAllAsArrayAssocNext($conn)
    {
        $command = "SELECT DATE_FORMAT(b.dateevent, '%d/%m/%Y') as dtevent, b.*, c.name as cname, p.name as pname, l.name as lname, e.name as ename " . " FROM board b " . " inner join course c on c.id = b.courseId " . " inner join level l on l.id = b.levelId " . " inner join professor p on p.id = b.professorId " . " inner join event e on e.id = b.eventId " . " where b.dateevent >= curdate() " . " order by b.dateevent desc, c.name asc ";

        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }

    public function checkSIAPEExists($id)
    {
        $command = "select count(*) as tot from " . $this->tableName . " where siape like \"" . $id . "\"";

        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                $f = mysql_fetch_assoc($res);
                echo ("TOTAL:: ".$f["tot"]."<br/>");
                if (((int) $f["tot"]) >= 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return false;
    }
    
    public function checkExistsField($field, $value)
    {
        $command = "select count(*) as tot from " . $this->tableName . " where ". $field . " like \"" . $value . "\"";        
        try {
            
            $this->showCommand($command);
            
            $res = mysql_query($command);
            if ($res) {
                $f = mysql_fetch_assoc($res);
                echo ("TOTAL:: ".$f["tot"]."<br/>");
                if (((int) $f["tot"]) >= 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }
        
        return false;
    }

    public function retrieveFromDB($conn, $id)
    {
        $command = "select * from " . $this->tableName . " where id like \"" . $id . "\"";

        try {

            $this->showCommand($command);

            $res = mysql_query($command);

            if ($res) {

                while ($f = mysql_fetch_assoc($res)) {
                    $this->setAllFromDB($f);
                }

                return True;
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return False;
    }

    public function retrieveFromDBByAttr($attrib, $value)
    {
        $command = "select * from " . $this->tableName . " where " . $attrib . " like \"" . $value . "\"";

        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                // echo "<br/>no IF <br/>";

                while ($f = mysql_fetch_assoc($res)) {
                    $this->setAllFromDB($f);
                }

                return True;
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return False;
    }

    public function retrieveFromDBById($conn, $id)
    {
        $command = "select * from " . $this->tableName . " where id = " . $id;

        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                // echo "<br/>no IF <br/>";

                while ($f = mysql_fetch_assoc($res)) {
                    $this->setAllFromDB($f);
                }

                return True;
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return False;
    }

    public function moderate($conn, $moderate, $reason)
    {
        if ($this->getField("id") != - 1) {

            $command = "update " . $this->tableName . " set moderate = \"" . $moderate . "\", " . " reason = \"" . $reason . "\" " . " where id like \"" . $this->getField("id") . "\"";

            try {

                $this->showCommand($command);
                $res = mysql_query($command);

                if ($res) {
                    return true;
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "<br/>UPDATE :: precisa setar o ID<br/>";
        }

        return False;
    }


    public function registerDownload($conn, $pubid, $userid)
    {
        if (($pubid != "") && ($userid != "")) {

            $dateoccur = date("Y-m-d H:i:s");
            $command = "insert into download  (publication_id, user_id, dateoccur) values ("
                . "\"$pubid\", \"$userid\", \"$dateoccur\")";

            try {

                $this->showCommand($command);
                $res = mysql_query($command);

                if ($res) {
                    return true;
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "<br/>REGISTER DOWNLOAD :: precisa setar o ID<br/>";
        }

        return False;
    }

    public function getAllAsArrayAssocDownloads($conn)
    {
        $command = "SELECT p.id as pid, count(p.id) as countpid, p.title as ptitle FROM download d "
            ." inner join publication p on d.publication_id = p.id GROUP BY pid "
                ." ORDER by countpid DESC, ptitle ASC";

                $result = Array();
                try {

                    $this->showCommand($command);

                    $res = mysql_query($command);
                    if ($res) {
                        while ($f = mysql_fetch_array($res)) {
                            array_push($result, $f);
                        }
                        // var_dump($result);
                    } else {
                        echo "<br/>" . mysql_error() . "<br/>";
                    }
                } catch (Exception $e) {
                    echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
                }

                return $result;
    }

    public function getAllAsArrayAssocDetails($conn, $pid)
    {
        $command = "SELECT p.id as pid, u.name as uname, p.title as ptitle, "
            ." d.dateoccur as ddate FROM download d "
            ." inner join publication p on d.publication_id = p.id "
            ." inner join user u on d.user_id = u.id "
            ." where p.id = $pid "
            ." ORDER by ddate DESC, ptitle ASC;";

                $result = Array();
                try {

                    $this->showCommand($command);

                    $res = mysql_query($command);
                    if ($res) {
                        while ($f = mysql_fetch_array($res)) {
                            array_push($result, $f);
                        }
                        // var_dump($result);
                    } else {
                        echo "<br/>" . mysql_error() . "<br/>";
                    }
                } catch (Exception $e) {
                    echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
                }

                return $result;
    }

    public function getTotalDownloadsForPub($conn, $id)
    {
        $command = "SELECT count(d.publication_id) as countid FROM download d "
            . " where d.publication_id = " . $id;

                $result = Array();
                try {

                    $this->showCommand($command);

                    $res = mysql_query($command);
                    if ($res) {
                        while ($f = mysql_fetch_array($res)) {
                            array_push($result, $f);
                        }
                        // var_dump($result);
                    } else {
                        echo "<br/>" . mysql_error() . "<br/>";
                    }
                } catch (Exception $e) {
                    echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
                }

                return $result;
    }

    /*
     * 3188  3189
     */

    public function getAllArrayAssocWithTotalDownloads($conn, $filter)
    {
        $command = "";
        if ($filter == NULL) {
            $command = "SELECT p.*, count(d.publication_id) as countid FROM publication p "
            . " left join  download d on d.publication_id = p.id "
            . " GROUP by p.id order by count(d.publication_id) desc ";
        }else{
            $command = "SELECT p.*, count(d.publication_id) as countid FROM publication p "
                . " left join download d on d.publication_id = p.id "
                . " where area_ids in (" . $filter . ") "
                . " GROUP by p.id order by count(d.publication_id) desc ";
        }

            $result = Array();
            try {

                $this->showCommand($command);

                $res = mysql_query($command);
                if ($res) {
                    while ($f = mysql_fetch_array($res)) {
                        array_push($result, $f);
                    }
                    // var_dump($result);
                } else {
                    echo "<br/>" . mysql_error() . "<br/>";
                }
            } catch (Exception $e) {
                echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
            }

            return $result;
    }

    public function getAllArrayAssocWithTotalDownloadsForPub($conn, $pubid)
    {

        $command = "SELECT count(d.publication_id) as countid, p.* FROM publication p "
            . " left join download d on d.publication_id = p.id "
            . " where p.id = '" . $pubid . "' "
            . " GROUP by p.id";


        $result = Array();
        try {

            $this->showCommand($command);

            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }

        return $result;
    }
    
    
    public function getDistinctAsArrayAssoc($conn, $attr)
    {
        $command = "SELECT distinct(".$attr.") as attrres FROM " . $this->tableName . " order by ". $attr ." asc";
        
        $result = Array();
        try {
            
            $this->showCommand($command);
            
            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }
        
        return $result;
    }
    
    public function getAllWhereAsArrayAssoc($conn, $attr, $val)
    {
        $command = "SELECT * FROM " . $this->tableName . " where $attr = \"". $val ."\"";
        
        $result = Array();
        try {
            
            $this->showCommand($command);
            
            $res = mysql_query($command);
            if ($res) {
                while ($f = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    array_push($result, $f);
                }
                // var_dump($result);
            } else {
                echo "<br/>" . mysql_error() . "<br/>";
            }
        } catch (Exception $e) {
            echo 'Caught exception in [ ' . $this->class_name . ' ]: ' . $e->getMessage() . "\n";
        }
        
        return $result;
    }
    
    

}

?>
