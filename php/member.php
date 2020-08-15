<html>
    <head><title>Members Only Page</title></head>
    <body>
    <?php

    //member.php
    function update_elevatorNetwork($node_ID,$field_Name="status",$new_value=1): void{
        $db = new PDO(
         'mysql:host=127.0.0.1;dbname=elevator',
         'root',
         ''
        );

        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->beginTransaction();
        try {
            //Change elevatorNetwork
            $query = 'UPDATE elevatorNetwork SET :fieldName = :newValue1 WHERE nodeID = :id';

            $statement = $db->prepare($query);
            echo "$field_Name<br />";
            $statement->bindValue('fieldName',$field_Name);
            $statement->bindValue('newValue1',$new_value);
            $statement->bindValue('id',$node_ID);
            if (!$statement->execute()){
                throw new Exception('Error - exception thrown while updating table!');
            }
            $db->commit();
            }
        catch (Exception $e) {
            $db->rollBack();
        }
    }
    

    
    session_start();

        if (isset($_SESSION['username'])) {
            echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";

            //Members only conent here
            echo "<p>Wow, so exclusive!</p>";
            $db = new PDO(
                'mysql:host=127.0.0.1;dbname=elevator',
                'root',
                ''
            );

        } else {
            echo "<p>You must log in please.</p>";
        }
    ?>



    <h3> Input NEW Data to the database using the form below</h3>
    <form action="member.php" method="POST">
        status: <input type="text" name="status" /><br />
        currentFloor: <input type="text" name="currentFloor" /><br />
        requestedFloor: <input type="text" name="requestedFloor" /><br />
        <input type="submit" value="Add to database" />
    </form>

    <?php
    if (isset($_POST['status'])){
        $query3= 'INSERT INTO elevatorNetwork (date,time,status,currentFloor,requestFloor,otherInfo) VALUES
        (:date,:time,:status,:currentFloor,:requestedFloor,:otherInfo)';
        $statement = $db->prepare($query3);
        $curr_date_query = $db->query('SELECT CURRENT_DATE()');
        $curr_date = $curr_date_query->fetch(PDO::FETCH_ASSOC);
        $curr_time_query = $db->query('SELECT CURRENT_TIME()');
        $curr_time = $curr_time_query->fetch(PDO::FETCH_ASSOC);
        $status = $_POST['status'];
        $currentFloor = $_POST['currentFloor'];
        $requestedFloor = $_POST['requestedFloor'];

        $params = [
            'date' => $curr_date['CURRENT_DATE()'],
            'time' => $curr_time['CURRENT_TIME()'],
            'status' => $status,
            'currentFloor' => $currentFloor,
            'requestedFloor' => $requestedFloor,
            'otherInfo' => 'na'
        ];
        $result = $statement->execute($params);
    }
    ?>
        
    <h4> Modify Data to the database using the form below</h4>
    <form action="member.php" method="POST">
    nodeID: <input type="text" name="nodeID" /><br />
    Field Name: <input type="text" name="field" /><br />
    New Value: <input type="text" name="newValue" /><br />
    <input type="submit" value="Update database" />
    </form>

    <?php
    if (isset($_POST['nodeID'])){
        update_elevatorNetwork($_POST['nodeID'],$_POST['field'],$_POST['newValue']);
    }
    ?>
    
    <h5> Delete a row from the database with a given nodeID:</h5>
    <form action="member.php" method="POST">
    nodeID: <input type="text" name="nodeID2" /><br />
    <input type="submit" value="Delete Row" />
    </form>

    <?php
    if (isset($_POST['nodeID2'])){
        $query4= 'DELETE FROM elevatorNetwork WHERE nodeID=:nodeID2';
        $statement = $db->prepare($query4);
        $statement->bindValue('nodeID2',$_POST['nodeID2']);
        $statement->execute();
    }
    ?>

    <h2>Entire contents of the elevatorNetwork table</h2>

    <?php
    $rows = $db->query('SELECT * FROM elevatorNetwork ORDER BY nodeID');
    foreach ($rows as $row) {
    for ($i=0;$i<sizeof($row)/2;$i++){
    echo $row[$i] . " | ";
    }
    echo "<br />";
    }
    ?>

    Click <a href='logout.php'>here</a> to log out.
    </body>
</html>