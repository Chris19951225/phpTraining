<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "Gothnumber666";
    $dbname = "mysql";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE phptraining.Person (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    Dateofbirth DATE,
    emailaddress VARCHAR(30),
    age INT(3)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Person created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    */

    /*$servername = "localhost";
    $username = "root";
    $password = "Gothnumber666";
    $dbname = "mysql";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table

    $sql = "INSERT INTO phptraining.Person(firstname, surname, DateOfBirth, emailaddress,age)
            VALUES ";
    for($i = 0; $i < 10; $i++)
    {
        $sql.="('".$i."bla','".$i."ble', '200".$i."-10-01','".$i."@gmail.com',".$i.")";
        if($i!=9)
        {
            $sql.=",";
        }
        else{
            $sql.=";";
        }
    }


    if ($conn->query($sql) === TRUE) {
        echo "Values added successfully";
    } else {
        echo "Error adding values: " . $conn->error;
    }

    $conn->close();*/

    class Person {

        private $servername = "localhost";
        private $username = "root";
        private $password = "Gothnumber666";
        private $dbname = "mysql";
        private $success = false;

        public $fname = '';
        public $sname = '';
        public $dob = '';
        public $email = '';
        public $age = 0;

        function createPerson($fname,$sname,$dob,$email,$age)
        {
            $this->fname = $fname;
            $this->sname = $sname;
            $this->dob = $dob;
            $this->email = $email;
            $this->age = $age;
        }

        function loadPerson($fname,$sname)
        {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM phptraining.Person WHERE firstname='".$fname."' AND surname='".$sname."'";

            $result = $conn->query($sql);
            $conn->close();

            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                /*echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["surname"]. " (Date of Birth: "
                        .$row["DateOfBirth"]."), email: ".$row["emailaddress"]." - Age: ".$row["age"]."<br>";*/
                die(json_encode("id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["surname"]. " (Date of Birth: "
                    .$row["Dateofbirth"]."), email: ".$row["emailaddress"]." - Age: ".$row["age"]));
            } else {
                //echo "0 results";
                die(json_encode($fname . " " . $sname . " doesn't exist"));
            }

        }

        function savePerson()
        {
            // Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to create table

            $sql = "INSERT INTO phptraining.Person(firstname, surname, Dateofbirth, emailaddress,age)
            VALUES ('".$this->fname."','".$this->sname."','".$this->dob."','".$this->email."',$this->age)";

            $succeeded = false;

            if ($conn->query($sql) === TRUE){
                if($conn->affected_rows > 0) {
                    $succeeded = true;
                }
            }

            $conn->close();

            if($succeeded == true)
            {
                die(json_encode($this->fname . " " . $this->sname . " has been created"));
            }
            else{
                die(json_encode($this->fname . " " . $this->sname . " has not been created"));
            }
        }

        function deleteMe()
        {
            // Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to create table

            $sql = "DELETE FROM phptraining.Person WHERE firstname='".$this->fname."' AND surname='".$this->surname."'";

            if ($conn->query($sql) === TRUE) {
                echo "Person deleted successfully";
            } else {
                echo "Error deleting person: " . $conn->error;
            }

            $conn->close();
        }

        function deletePerson($fname,$sname)
        {
            // Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to create table

            $sql = "DELETE FROM phptraining.Person WHERE firstname='".$fname."' AND surname='".$sname."'";

            $succeeded = false;

            if ($conn->query($sql) === TRUE){
                if($conn->affected_rows > 0) {
                    $succeeded = true;
                }
            }
            $conn->close();

            if($succeeded) {
                die(json_encode($fname . " " . $sname . " has been deleted"));
            }
            else{
                die(json_encode($fname . " " . $sname . " doesn't exist"));
            }
        }

        function loadAllPeople()
        {
            // Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM phptraining.Person";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["surname"]. " (Date of Birth: "
                    .$row["Dateofbirth"]."), email: ".$row["emailaddress"]." - Age: ".$row["age"]."<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        }

        function deleteAllPeople()
        {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to create table

            $sql = "DELETE FROM phptraining.Person WHERE id";

            if ($conn->query($sql) === TRUE) {
                echo "Everyone deleted successfully";
            } else {
                echo "Error deleting everyone: " . $conn->error;
            }

            $conn->close();
            return;
        }

        function updatePerson($fnameSelect,$fname,$sname,$date,$email,$age)
        {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE phptraining.Person SET firstname='".$fname."',surname='".$sname."',Dateofbirth='".$date."',
                    emailaddress='".$email."', age=".$age. " WHERE firstname='".$fnameSelect."'";

            $succeeded = false;

            if ($conn->query($sql) === TRUE){
                if($conn->affected_rows > 0) {
                    $succeeded = true;
                }
            }
            $conn->close();

            if($succeeded) {
                die(json_encode($fnameSelect ." has been updated"));
            }
            else{
                die(json_encode($fnameSelect ." doesn't exist"));
            }
        }
    }

    /* Foundation Task 6 alone
    $time_start = microtime(true);

    $person = new Person();
    $person->deleteAllPeople();

    echo "</br></br>";

    $people = array();
    for($i = 0; $i<10; $i++)
    {
        $people[$i] = new Person();
        $people[$i]->createPerson($i."bla",$i."ble","200".$i."-10-01",$i."@gmail.com",$i);
        $people[$i]->savePerson();
    }

    echo "</br></br>";

    $people[0]->loadAllPeople();

    echo "</br></br>";

    echo 'Total execution time in seconds: ' . (microtime(true) - $time_start);
    */

    //Foundation Task 7

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $user = new Person();
        $action = $_POST['action'];
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        switch($action) {
            case 'create' :
                $date = $_POST['date'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $user->createPerson($fname, $sname,$date,$email,$age);
                $user->savePerson();
                break;
            case 'read' :
                $user->loadPerson($fname,$sname);break;
            case 'update' :
                $fnameSelect = $_POST['fnameSelect'];
                $date = $_POST['date'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $user->updatePerson($fnameSelect,$fname,$sname,$date,$email,$age);break;
            case 'delete' :
                $user->deletePerson($fname,$sname);break;
            default : break;
        }
    }


