<?php

class InvalidFloorExceptionTooLow extends Exception {}
class InvalidFloorExceptionTooHigh extends Exception {}
class ValidFloorException extends Exception {}

class InvalidButtonCallException extends Exception {}
class ValidButtonCallException extends Exception {}

class CarDisconnectionException extends Exception {}
class CarConnectionException extends Exception {}


function getFloorInput(int $floor) {
    if ($floor < 1 ) {  
     throw new InvalidFloorExceptionTooLow();
    } else if ($floor > 5) {
    throw new InvalidFloorExceptionTooHigh();
    } else {
    throw new ValidFloorException();
    }
} 

function buttonCallInput(int $carFloor, int $floorId){
    if ($carFloor == $floorId){
        throw new InvalidButtonCallException();
    } else {
        throw new ValidButtonCallException();
    }
}

function carConnectionTest(int $carStatus){
    if($carStatus == 0) {
        throw new CarDisconnectionExpcetion();
    } else {
        throw new CarConnectionException();
    }
}


try {
    getFloorInput(2);
} catch (InvalidFloorExceptionTooLow $e) {
    echo 'Input too low, must be between 1-5';
}catch (InvalidFloorExceptionTooHigh $e) {
    echo 'Input too high, must be between 1-5';
}catch (ValidFloorException $e) {
    echo 'Input is an acceptable floor.';
}

echo "<br />";
echo "<br />";

try {
    getFloorInput(-2);
} catch (InvalidFloorExceptionTooLow $e) {
    echo 'Input too low, must be between 1-5';
}catch (InvalidFloorExceptionTooHigh $e) {
    echo 'Input too high, must be between 1-5';
}catch (ValidFloorException $e) {
    echo 'Input is an acceptable floor.';
}

echo "<br />";
echo "<br />";

try {
    getFloorInput(12);
} catch (InvalidFloorExceptionTooLow $e) {
    echo 'Input too low, must be between 1-5';
}catch (InvalidFloorExceptionTooHigh $e) {
    echo 'Input too high, must be between 1-5';
}catch (ValidFloorException $e) {
    echo 'Input is an acceptable floor.';
}

echo "<br />";
echo "<br />";

try {
    buttonCallInput(2,3);
} catch (InvalidButtonCallException $e) {
    echo 'Elevator already on floor';
}catch (ValidButtonCallException $e) {
    echo 'Elevator incoming.';
}

echo "<br />";
echo "<br />";

try {
    buttonCallInput(2,2);
} catch (InvalidButtonCallException $e) {
    echo 'Elevator already on floor';
}catch (ValidButtonCallException $e) {
    echo 'Elevator incoming.';
}

echo "<br />";
echo "<br />";


?>