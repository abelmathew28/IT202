<?php
     	echo "<pre>" . var_export($_GET, true) . "</pre>";
        if(isset($_GET['name'])){
                echo "<br>Hello, " . $_GET['name'] . "<br>";
        }

	//if(isset($_GET['number'])){
        //	$number = $_GET['number'];
        //	echo "<br>" . $number . " should be a number...";
        //	echo "<br>but it might not be<br>";
        //}
	//
	if(isset($_GET['number1'])){
                $number1_val = $_GET['number1'];
                if (is_numeric($number1_val)) {
                        echo "<br>" . $number1_val . " is a number...";
                }
                else {
                      	echo "<br>" . $number1_val . " is not a number...";
                        }
        }
	if(isset($_GET['number2'])){
                $number2_val = $_GET['number2'];
                if (is_numeric($number2_val)) {
                        echo "<br>" . $number2_val . " is a number...";
                }
                else {
                      	echo "<br>" . $number2_val . " is not a number...";
                }
        }
        $concat_number=$number1_val.$number2_val;

        echo "<br>" . " The concatenated string of ".$number1_val . " and
        ".$number2_val." is ".$concat_number;


        //TODO
	//handle addition of 2 or more parameters with proper number parsing
        //concatenate 2 or more parameter values and echo them
        //try passing multiple same-named parameters with different values
        //try passing a parameter value with special characters
        //web.njit.edu/~ucid/IT202/handleRequestData.php?parameter1=a&p2=b
?>
