<?PHP if(session_id()==''){session_start();}
//$basefolder ="../../";
include("../../globals_var.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head> 

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="../../app/css/CIL_boot.min.css">
         
        <title>Mine Vehicl Information Portal</title>
         
 <script src="http://code.jquery.com/jquery.min.js"></script>
 <link rel="stylesheet" href="../../slideshow/vegas.min.css">
 <script src="../../slideshow/vegas.min.js"></script>
<style>
.col-smm-12{position:relative; min-height:1px;padding-right:15px;padding-left:15px; text-align:inherit; }
@media screen and (max-width:380px){
	.col-smm-12{width:100%; } 
} 
</style>
<?PHP
if(isset($_SESSION["USER_DETAILS"]) ){ 
	echo "<script>document.location.href='chathome.php'</script>";
}
 include("../../app/xmlhttpreq.php");?>
<link rel="shortcut icon" href="../../app/logo2.ico" type="image/ico" />
</head>

<body id="bodypg" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; "> 
        <?PHP  $basefolder=$BaseUrl="../../app/";
	          include_once("../../app/header_logo.php");
		?>
	    <!---Frontend design-->
	<div class="container-fluid" id="conainer_id" style="padding:10px;padding-top:50px; ">
    	<div class="container" style="background-color:rgba(183,240,247,0.8);padding-top:10px; "> 

        		<div class="row" id="r0">
                	<div class="col-smm-12" style="padding:10px; " id="result">

                    </div>
                </div>
                <div class="row" id="r1">
                	<div class="col-smm-12" style="padding:10px; text-align:center;">
                         Number1
                     	 <input type="text" id="num1" placeholder="Enter a 1st Number:";>
                    </div>
                </div>
                <div class="row" id="r2">
                	<div class="col-smm-12" style="padding:10px; text-align:center;">
                         Number2
                     	 <input type="text" id="num2" placeholder="Enter a 2nd Number:" />
                    </div>
                </div>
                <div class="row" id="r3">
                	<div class="col-smm-12" style="padding:10px; ">
                        <button type="button" id="plus" onclick="operate(this,'num1','num2')" style="font-size:12px;font-weight:900px; height:20px; width:250px; ">+</button>

                        <button type="button" id="minus" onclick="operate(this,'num1','num2')" style="font-size:12px;font-weight:900px; height:20px; width:250px; ">-</button>

                        <button type="button" id="multiply" onclick="operate(this,'num1','num2')" style="font-size:12px;font-weight:900px; height:20px; width:250px; ">*</button>

                        <button type="button" id="devide" onclick="operate(this,'num1','num2')" style="font-size:12px;font-weight:900px; height:20px; width:250px; ">/</button>
                    </div>
                </div>
        </div>
    </div>

<script>
    /*---Call_Back_Function--*/
    function after_server_response(server_response,rid){
           var rdiv_obj = document.getElementById(rid);
           if(typeof rdiv_obj != 'undefined'){
                rdiv_obj.style.display = '';
                rdiv_obj.innerHTML= "your result :<br/>"+server_response;


           }


    }


/*Java Script Form*/
    function operate(btn,n1id,n2id){
            var num1obj = document.getElementById(n1id);
            var num2obj = document.getElementById(n2id);

            if(typeof num1obj =="undefined"  || num1obj.value==""){
                 alert("Enter a Number1:"); return;
            }
            if(typeof num2obj =="undefined"  || num2obj.value==""){
                 alert("Enter a Number2:"); return;
            }
            if(typeof btn != "undefined"){
                var _formx = new FormData();
                _formx.set('n1',num1obj.value);
                _formx.set('n2',num2obj.value);
                _formx.set('abtn',btn.innerHTML);
            /*Call server broker Function*/
                var Uri = "calc_page_server.php";
                sendOnServerData(Uri,_formx,'result',after_server_response);

            }

    }

    </script>

</body>
</html>
