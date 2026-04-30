<?PHP  if(session_id()==''){session_start();}
include("../../pdoConfig.php");
include("../../pdoFunction.php");
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone);
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");


	if(isset($_POST["n1"]) && isset($_POST["n2"]) && isset($_POST["abtn"])){

	   $num_val1 = $_POST["n1"];
	   $num_val2 = $_POST["n2"];
	   $sign = $_POST["abtn"];
	   if($sign == "+"){
	        echo $num_val1 + $num_val2;
	   }
       else if($sign == "-"){
	        echo $num_val1 - $num_val2;
	   }
       else if($sign == "*"){
	        echo $num_val1 * $num_val2;
	   }
       else if($sign == "/"){
	        echo $num_val1 / $num_val2;
	   }
       else{
            echo "Please click atleast one button!";
       }

	}
?>
