<?php

include 'dbconfig.php';

session_start();

if(isset($_GET['logout']))
{
    session_destroy();

    header('Location:ui.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Hub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
        *
        {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 0;
            padding: 0;
        }
        #header
        {
            background-color: black;
            text-align: right;
        }

        #header>a
        {
        color: white;
        text-decoration: none;
        font-size: 15px;
        margin-right: 30px;
        }

        #dropdown
        {
            display: inline-block;
            position: relative;
        }

        #dropdown button
        {
            border: none;
            background-color: forestgreen;
            color: white;
            font-size: 20px;
            padding: 5px 25px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;

        }

        #header #dropdown-content
        {
            position: absolute;
            visibility:collapse;
            right: 0;
            z-index: 1000;
        }

        #header #dropdown-content a
        {
            display: block;
            white-space: nowrap;
            text-decoration: none;
            color: black;
            background-color: rgb(219, 219, 219);
            padding: 10px 20px;
        }
        
        #dropdown:hover button
        {
            background-color: darkgreen;
        }

        #dropdown:hover #dropdown-content
        {
            visibility: visible;
        }
        
        #header #dropdown-content>a:hover
        {
            background-color: #999;

        }

        #logo-section
        {
            z-index: 1;
            position: relative;
            background-color: #082541;
            height: 150px;
        }
       
        img[src='../UI Development/assets/images/388900b94951db6a1591a56808d39e9e.gif']
        {
            height: 150px;
            width: 230px;
        }

        .left-align
        {
            position: absolute;
            left: 0;
            width: 100%;
        }

        .right-align
        {
            position: absolute;
            right: 0;
            width: 100%;
        }

        #logo-section h1
        {
            position: absolute;
            top: 8px;
            left: 260px;
            font-size: 75px;
            white-space: nowrap;
            font-weight: bold;
            color:#88cfb7;
        }

        #logo-section p
        {
            position: absolute;
            top: 88px;
            left:260px;
            white-space: nowrap;
            color: #88cfb7;
            font-size: 18.5px;

        }

        #logo-section form input
        {
            position: absolute;
            width: 280px;
            height: 30px;
            right: 70px;
            top: 60px;
            border: none;
            padding: 10px;
            padding-right: 30px;
            font-size: 16px;
            border-radius: 30px 0px 0px 30px;
        }

        #logo-section form button
        {
            position: absolute;
            height: 30px;
            right: 20px;
            width: 50px;
            top: 60px;
            border: none;
            font-size: 15px;
            border-radius: 0px 30px 30px 0px;
        }

        #menubar
        {
            background-color: #676363;
        }

        #menubar ul
        {
            display: flex;
            flex-direction: row;
            list-style-type: none;
            justify-content: center;
        }

        #menubar a
        {
            display: block;
            color: white;
            text-decoration: none;
            padding: 5px 50px;
            font-size: 20px;
            font-style: fantasy;
            font-weight: bolder;
            white-space: nowrap;
        }

        #menubar a:hover
        {
            background-color: #111;
        }

        #menubar .active
        {
            background-color: forestgreen;
        }

        #menubar .active:hover
        {
            background-color: darkgreen;
        }

    </style>
</head>
<body>
    <section id="header">
        <a href="legal/privacy.html">Privacy Policy</a>
        <a href="legal/tnc.html">Terms and Condition</a>

        <?php if(!isset($_SESSION['username']))
        { ?>
        <div id="dropdown">
            <button>LOGIN</button>
            <div id="dropdown-content">
                <a href="../UI Development/Authpentication/login.php">Log into Existing Account</a>
                <a href="../UI Development/Authpentication/register.php">Create a new Account</a>
            </div>
        </div>
        <?php }
        else 
        { ?>
        <div id="dropdown">
            <button><?php echo $_SESSION['username']?></button>
            <div id="dropdown-content">
                <a href="../UI Development/Authpentication/changepwd.php">Change Password</a>
                <a href=" ui.php?logout=true">Log Out</a>
            </div>
        </div>
        <?php }
        ?>
    </section>
    
    <section id="logo-section">
        <div class="left-align">
            <img src="../UI Development/assets/images/388900b94951db6a1591a56808d39e9e.gif" />
            <h1>Music Hub</h1>
            <p>---------------------------------------------------------<br>The best Music store You ever See in your life</p>
        </div>

        <div class="right-align">
            <form method="get" action="search.html">
                <input type="search" name="keyword" placeholder="search songs, artists, playlists etc...">
                <button type="submit">submit</button>
            </form>
        </div>
    </section>

    <section id="menubar">
        <ul>
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="recent.html">Recently Added</a></li>
            <li><a href="playlist.html">playlist</a></li>
            <li><a href="fav.html">Favorites</a></li>
            <li><a href="newhits.html">New Hits</a></li>
            <li><a href="about.html">About us!</a></li>
        </ul>
    </section>

    <section id="web-content">

        <?php if(!isset($_SESSION['username']))
        {
        ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    $sql_query="select id,name,album,singer,composer,songwriter,label,starring,images from music;";
                    $result=mysqli_query($conn,$sql_query);
                    while($row=mysqli_fetch_array($result))
                {
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="../UI Development/assets/musicimages/<?php echo $row['images'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;"><?php echo $row['name'] ?></h5>
                                <p class="card-text"><?php echo "Album:",$row['album'],"<br>Singer:",$row['singer'],"<br>composer:",$row['composer'],"<br>songwriter:",$row['songwriter'],"<br>Label:",$row['label'],"<br>Starring:",$row['starring'] ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                    <?php 
                } ?>

            </div>
            <?php  
        }
    
    else 
    {
        ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    $sql_query="select id,name,album,singer,composer,songwriter,label,starring,link,images from music;";
                    $result=mysqli_query($conn,$sql_query);
                    while($row=mysqli_fetch_array($result))
                    {
                ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../UI Development/assets/musicimages/<?php echo $row['images'] ?>" class="card-img-top" alt="...">
                                <audio controls>
                                    <source src="../UI Development/assets/music/<?php echo $row['link'] ?>"/>
                                </audio>
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center;"><?php echo $row['name'] ?></h5>
                                    <p class="card-text"><?php echo "Album:",$row['album'],"<br>Singer:",$row['singer'],"<br>composer:",$row['composer'],"<br>songwriter:",$row['songwriter'],"<br>Label:",$row['label'],"<br>Starring:",$row['starring'] ?></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>

                <?php } ?>

            </div>
        <?php 
    } 
    ?>
    </section>

    <section id="footer">
    </section>

</body>
</html>