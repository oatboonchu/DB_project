<?php
    session_start();

    $server = "localhost" ;
    $username = "root" ; 
    $password = "root" ;
    $dbname = "fooddom" ;

    $connect = new mysqli($server,$username,$password,$dbname);

    // if(!isset($_POST('rs'))){
    //     echo $_POST('rs');
    // }

    // if(isset($_POST('rs'))){
    //     $res_search = $_POST('rs') ;
    //     $nameres = '%'.$res_search.'%';
    // }
    if (isset($_POST['search'])) {
        $choose_res = "%".$_POST['search']."%";
        $chooseres = "SELECT * FROM restaurant WHERE name LIKE '$choose_res'";
    }
    else {
        $chooseres = "SELECT * FROM restaurant";
    }
    
    $result = mysqli_query($connect,$chooseres);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
        
    <style>
         @import url("mystyle.css"); 
         
         
    </style>

</head>
<!-- <body style="background-color: gray; 
            padding-top: 8px; 
            padding-left: 2px;"> -->
<body style="background-color: gray;">

    <div class="page">

        <a href="profile.php">
            <img src="img/profile.png" style="
            position: absolute;
            width: 63px;
            height: 64px;
            left: 31px;
            top: 36px;">
        </a>

        <a href="Home.php">
            <img src="img/logo.png" style="
            position: absolute;
            width: 72px;
            height: 57.93px;
            left: 325px;
            top: 36px;">
        </a>

            <form class="form-inline" action="Home.php" method="POST">
                <!-- <input type="text" name="rs" placeholder="เลือกร้านค้า" style=" -->
                <input name="search"type="search" id="myInput" placeholder="เลือกร้านค้า" aria-label="Search" style="
                position: absolute;
                width: 375px;
                height: 60px;
                left: 21px;
                top: 116px;
                background: #FFFFFF;
                border-radius: 30px;
                background-image: url('https://cdn.discordapp.com/attachments/698833923102212122/708762674204246117/unknown.png');
                background-position: 15px 8px; 
                background-repeat: no-repeat;
                
                padding: 12px 20px 12px 65px;">
            </form>

            <!-- white page -->
            <div style="
            position: absolute;
            width: 366px;
            height: 605px;
            left: 24px;
            top: 196px;
            background: #FFFFFF;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 30px;">
                <div style="
                
                padding-top: 15px;
                "></div>
                
                <?php 
                $num = 0;
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    $cname = $row['name'];
                    $num++;
                    $chair = "SELECT SUM(chair) as total_chair FROM tables WHERE res_name = '$cname' ";
                    $row_chair = $connect->query($chair);

                    while($chair = $row_chair->fetch_assoc()){ 
                     ?>


                     <!-- gray page -->
                    <form action="Fn1_choose.php?id=<?php echo $cname;?> " method="POST">
                        <button  name="check_search" style="
                            width: 335px;
                            height: 107px;
                            left: 15.5px;
                            top: 20 px;
                            margin-left: 15.5px;
                            padding-top: 3px;
                            
                            border-radius: 17px;
                            border-width: thin;
                            background: #F4F4F4;
                            font-family: 'Kanit';
                            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
                            font-size: 18px;
                            line-height: 26px;
                            color: #F8CE4E;
                            " >
                            
                                <div  style="
                                    width: 91px;
                                    height: 91px;
                                    left: 13px;
                                    top: 10px;
                                    margin-left: 3px;
                                    background: #F8CE4E;
                                    border-radius: 17px;
                                    float: left;">
                                </div>

                                <div  style="
                                    width: 198px;
                                    height: 86px;
                                    left: 115.5px;
                                    top: 14px;
                                    float: right;
                                    color: #918D8D;
                                    text-align: left;">
                                    
                                    
                                    <table >
                                        <tbody id="myTable">
                                        <tr>
                                            <td scope="row">
                                                <?php echo "Name : ".$row['name']; ?> <br>
                                                <?php echo "Time : ".$row['open_close']; ?> <br>
                                                <?php echo "chair : ".$chair['total_chair']; ?> 
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    </div>
                                
                                </button>
                                
                            </form>
                            
                            <div style="padding-top: 13px;">
                            </div>
                        
                        

                    <?php 
                  
                }

            }?>
            

             </div> 


            <a href="Fn2_choose.php">
            <img src="img/ranicon.png" style="
                position: relative;
                width: 106px;
                height: 106px;
                left: 154px;
                top: 788px;
                z-index: 1;">
            </a>


        <tap class="bottom_tab" style="border-radius: 30px;">
            <a href="setting.php">
            <img src="img/settingicon.png" style="
                position: absolute;
                left: 78.02%;
                right: 14.01%;
                top: 35%;
                bottom: 3.35%;">
            </a>
            

            <a href="Home.php">
            <img src="img/homeicon.png" style="
                position: absolute;
                left: 14.73%;
                right: 77.29%;
                top: 35%;
                bottom: 3.38%;">
            </a>

        </tap>
            
        
            
    </div>

    <script>
    // $(document).ready(
    //     function(){
    //         $("#myInput").on("keyup", function() {
    //         var value = $(this).val().toLowerCase();
    //         $("#myTable tr").filter(
    //             function() {
    //                 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //                 // setTimeout(() => {
    //                     const elem = document.getElementByName("check_search");
    //                     elem.parentNode.removeChild(elem);
    //                 // }, 0);
    //             });
    //         });
    //     }
    // );
</script>

</body>
</html>