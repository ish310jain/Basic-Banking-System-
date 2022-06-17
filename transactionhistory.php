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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <title>Contact us - Sparks Bank</title>
    <style>
        body {
background-image: url('https://wallpapercave.com/wp/wp6602995.jpg');
background-repeat: no-repeat, repeat;
background-color: #cccccc;
}
    </style>
</head>

<body style="background-color:#212529;">
    <?php include 'database.php'; ?>

    <style>
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed fixed-top"
        style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:18px; box-shadow: 0px 0px 15px 0px black;">

        </div>
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
                        <a class="nav-link text-nowrap" href="sendmoney.php">Transfer Money</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap active" href="transactionhistory.php">Transaction History</a>
                    </li>
                </ul>
            </b>
        </div>
    </nav>



    <style>
        th,
        td {
            text-align: center;
        }
    </style>

    <center>



        <div class="container" style="margin-top: 10%; padding:10px 80px 10px 80px; ">
            <div
                style="width:80%; background-color:yellowgreen; padding:10px 10px 10px 10px; border-radius:30px; box-shadow: 2px 2px 10px black;">
                <h1 style=" color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Transaction History</h1>
            </div>
            <?php

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("Connection not established: ".mysqli_connect_error());
    }else{
    
        $sql = "SELECT * FROM `transactions`";
        $result = mysqli_query($conn, $sql);
?>
            <table class="table table-success" style="margin-top: 30px;">
                <thead>
                    <tr>
                        <th scope="col">Sender's AccNo</th>
                        <th scope="col">Receiver's AccNo</th>
                        <th scope="col">Amount Transferred</th>

                    </tr>
                </thead>

                <style>
                    .mybtn {

                        box-shadow: 2px 2px 10px black;
                        border-radius: 30px;
                        font-weight: bold;
                        background-color: lightgreen;
                        color: green;
                    }

                    .mybtn:active {
                        background-color: green;
                        color: lightgreen;
                    }
                </style>
                <?php
echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
        if(!(empty($row['Sender']) && empty($row['Reciever']) && empty($row['Amount'])))
            {echo    '
            <tr>
              <td>'.$row['Sender'].'</td>
              <td>'.$row['Receiver'].'</td>
              <td>'.$row['Amount'].'</td>
              </td>
              </tr>';}
    }
    
    }
    echo "</tbody>";
?>
        </div>
    </center>

    
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>
