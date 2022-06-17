<!--Name - Ish Jain-->
<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="statics/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="statics/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="statics/favicon-16x16.png">
    <link rel="manifest" href="statics/site.webmanifest">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Send money - Spark Bank</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="padding-top:8%;">




    <?php include 'database.php'; ?>
    <style>
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed fixed-top"
        style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:18px; box-shadow: 0px 0px 15px 0px black;">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <b>
                <ul class="navbar-nav ">
                    <li class="nav-item nav-links" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" href="customerdetails.php">View Customer Details</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; ">
                        <a class="nav-link text-nowrap active" href="sendmoney.php">Transfer Money</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" href="transactionhistory.php">Transaction History</a>
                    </li>
                </ul>
            </b>
        </div>
    </nav>



    <style>
        .formin {
            border-radius: 20px;
            width: 380px;
            height: 50px;
            padding: 10px 10px 10px 15px;
        }

        .mybtn {
            margin-bottom: 10px;
            box-shadow: 2px 2px 10px black;
            border-radius: 30px;
            background-color:yellowgreen;
            font-weight: bold;
            color: black;
        }

        .mybtn:active {
            background-color: black;
            color: white;
        }
        .mybtn:hover {
            background-color: black;
            color: white;
        }


        td {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        body {
background-image: url('https://wallpapercave.com/wp/wp6602995.jpg');
background-repeat: no-repeat, repeat;
background-color: #cccccc;
}
        
    </style>

    <center>

        <div class="container" style="margin-top:2%;">
            <div
                style="width:80%; background-color:yellowgreen; padding:10px 10px 10px 10px; border-radius:30px; box-shadow: 2px 2px 10px black;">
                <h1 style=" color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Transfer Money</h1>
            </div>
            <br><br>
                <form action="sendmoney.php" method="post">
                    <table>
                        <tr>
                            <td><input type="text" class="formin form-control" name="AccNo1" id=""
                                    placeholder="Sender's Account Number"
                                    value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"></td>
                        <tr>
                        <tr>
                            <td><input type="number" class="formin form-control" name="Amount" id=""
                                    placeholder="Amount to be Transferred"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="formin form-control" name="AccNo2" id=""
                                    placeholder="Reciever's Account Number"></td>
                        </tr>
                    </table>
                    <br><input class="btn mybtn btn-outline-default" type="submit" value="Transfer"><br><br>
                </form>
            </div>
        </div>


        <?php 

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{
       if($_SERVER['REQUEST_METHOD']=='POST')
{

    
    $sender = $_POST['AccNo1'];
    $amount = $_POST['Amount'];
    $reciever = $_POST['AccNo2'];
    $checkblcquery = "SELECT Blc FROM users where AccNo='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
    $ava_blc = mysqli_fetch_assoc($checkblc)['Blc'];

    if($amount>=1 && $amount<=$ava_blc){
    $sql1 = "UPDATE users SET Blc= Blc-$amount WHERE AccNo='$sender'";
    $sql2 = "UPDATE users SET Blc= Blc+$amount WHERE AccNo='$reciever'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if($result1 && $result2){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Transaction Successful")';  
        echo '</script>'; 
    $sql = "INSERT INTO transactions(Sender, Receiver, Amount) VALUES ($sender, $reciever, $amount)";
    $r = mysqli_query($conn, $sql);


}
}else{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Transaction Unsuccessful")';  
    echo '</script>'; 
}
}
}
?>
    </center>




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>