

<?php


//CONNECTING TO THE DATABASE
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark bank"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname); 
    //IF CONNECTION IS NOT SUCCESSSFUL
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
?>
<!--HTML CODE STARTS -->
<html>
<head> 
    <title>Transaction Page</title>
    <style>
    body {
               padding-top: 60px;
               font-size:25px;
               background: #f5fce3;
               background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
               background: linear-gradient(to right, #f5fce3,#00FF00);
        }
    .transferMoney{
        color:black;
        background: #91c1c9;
        background: -webkit-linear-gradient(to bottom,  #91c1c9, #5e9da8 );
        background: linear-gradient(to bottom, #91c1c9, #008000);
        padding: 40px;
        position:fixed;
        top:50%;
        left:50%;
        height:400px;
        width:400px;
        border-radius:10px;
        transform: translate(-50%, -50%);
    }
 
    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
      
     
</head>
<!-- BODY-->
<body>
<!-- INCLUDING NAVBAR-->
<?php include('navbar.php'); ?>
<!-- Creating Form to collect information related to do transaction-->
<div class = 'transferMoney'>
    <h1>Transfer Money</h1>
    <!-- Form's action attribute points to this page only-->
    <!-- Note: To redirect page to samee php write "php echo $_SERVER['PHP_SELF'];" in action attribute-->
    <form name="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
    <!-- To structurise form it is put in a table--onsubmit="return validateForm()"-->
        <table id="table1">
        <!-- ROW 1 : PAYER ACCOUNT ID IS ASKED-->
        <tr>
            <td><b> Payer Account No.: </b> </td>
            <td><input type="number" name="payerID"  min=100 required><td><br><br>
        </tr>
        <!-- ROW 2 : PAYEE ACCOUNT ID IS ASKED-->
        <tr>
            <td> <b>Payee Account No.:</b></td>
            <td><input type="number" name="payeeID" min=100 required ><td><br><br>
        </tr>
        <!-- ROW 3 : AMOUNT TO BE TRANSFERRED IS ASKED-->
        <tr>
            <td><b>Amount (in Rupees):<b></td>
            <td><input type="number" name="amount" min=1 required><td><br><br>
        </tr>
        <!-- ROW 4 : BUTTON TO ASK TO CONFIRM TRANSACTION-->
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td><center> <input type="submit"  value="SUCCEED"> <td></center><br><br>
        </tr>
       
        </table>
    </form>
</div>
 <!-- FORM / TABLE ENDS HERE WITH DIV TAG-->
 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["payerID"].value;
            var y = document.forms["myForm"]["payeeID"].value;
            var z = document.forms["myForm"]["amount"].value;
            var regex=/^[0-9]+$/;

            
            if (x == "" || y=="" || z=="") {
                alert("Fill it!!");
                return false;
            }

            //var num = z>0?1:-1;
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid amount to do transaction");
                return false;
            }
            if(isNaN(z)|| !x.match(regex)|| !y.match(regex) ||!z.match(regex)){
                alert("Enter correct input!");
                return false;
            }
            
           // var data = <?php //echo json_encode("42", JSON_HEX_TAG); ?>;
        }
            
 </script>
</body>