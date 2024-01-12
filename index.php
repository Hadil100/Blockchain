<?php

include("header.php");
// include("dbCon.php");
// $con = connection();
?>




<!-- Site Wraper -->
<div class="wrapper">
    <!-- START SLIDER -->
    <section class="clearfix">
        <div id="mega-slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#mega-slider" data-slide-to="0" class="active"></li>
                <li data-target="#mega-slider" data-slide-to="1"></li>
                <li data-target="#mega-slider" data-slide-to="2"></li>
                <li data-target="#mega-slider" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active beactive">
                    <img src="img/brand/brand1.jpg" alt="brand1.jpg" style="width: 100%; height: 300px;">
                    <div class="carousel-caption">
                        <h2>Welcome to Crop Auction</h2>
                    </div>
                </div>
                <div class="item">
                    <img src="img/brand/live-024049.jpg" alt="live-024049.jpg" style="width: 100%; height: 300px;">
                    <div class="carousel-caption">
                        <h2>All kinds of Crops</h2>

                    </div>
                </div>
                <div class="item">
                    <img src="img/brand/brand3.jpg" alt="brand3.jpg" style="width: 100%; height: 300px;">
                    <div class="carousel-caption">
                        <h2>BUY The crop</h2>

                    </div>
                </div>
                <div class="item">
                    <img src="img/brand/brand4.png" alt="brand4.png" style="width: 100%; height: 300px;">
                    <div class="carousel-caption">
                        <h2>Eliminate Middleman</h2>

                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
            </a>
            <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
            </a>
        </div>
    </section>
    <!-- END SLIDER -->





    <!-- START NEW  -->
    <form method="post">
        <section class="home-main-contant-style2 dip-bg-style dip-style bg-white">
            <div class="container">
                <div class="widget">
                    <h6 class="text-uppercase bottom-line">New crops</h6>
                </div>
                <div class="row">
                    <div class="new-product slider">
                        <?php


                        $sql = "SELECT vehicle.*, catagory.name as catname FROM vehicle INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE vehicle.`status` =1 ORDER BY vehicle.`ID` DESC";


                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                $ID = $row["ID"];
                                $name = $row["name"];
                                $type = $row["type"];
                                $catagory = $row["catname"];
                                $startDate = $row["startDate"];
                                $EndDate = $row["EndDate"];
                                $image = $row["image"];
                                $price = $row["price"];
                                ?>
                                <div class="col-md-4 item">
                                    <div class="products grid-product">
                                        <div class="product-grid-inner">
                                            <div class="product-grid-img">
                                                <ul class="product-labels">
                                                    <li>
                                                        <?php date_default_timezone_set("Asia/Kolkata");

                                                        $nowDate = date("Y-m-d");

                                                        ?>
                                                    </li>
                                                </ul>
                                                <a href="#" class="product-grid-img-thumbnail">
                                                    <img style="width: 335px; height: 190px; "
                                                        src="<?= $_SESSION["directory"] ?>img/vehicle/<?= $image ?>" alt="img"
                                                        class="img-responsive primary-img" />
                                                    <img src="<?= $_SESSION["directory"] ?>img/vehicle/<?= $image ?>" alt="img"
                                                        class="img-responsive socendary-img" />
                                                </a>

                                                <div class="product-grid-atb text-center"><a class=""
                                                        href="<?= $_SESSION["directory"] ?>customer/cropdetail.php?id=<?= $ID ?>">View
                                                        Details</a>
                                                </div>
                                            </div>
                                            <div class="product-grid-caption text-center">
                                                <h4><a >
                                                        <?= $name ?></a>
                                                </h4>
                                                
                                                <h4 id="price">Price:
                                                            <?= $price ?> TND
                                                        </h4>

                                             

                                                <div class="pro-size"><label>Type: <span>
                                                            <?= $type ?>
                                                        </span> </label>
                                                    <div><label>Catagory: <span>
                                                                <?= $catagory ?>
                                                            </span> </label></div>
                                                </div>
                                                <button class="btn btn-product cd-cart-btn" onclick="addToCart(<?= $price ?>), event.preventDefault();">Add to Cart</button>
    
  <!-- <a class="btn btn-product cd-cart-btn" id="buyButton"> Add to Cart</a> -->
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <?php
                            }
                        }


                        ?>

                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- END NEW  -->

    <script>
    function addToCart(price) {
        // Envoyer une requête AJAX à la page PHP pour mettre à jour la session
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_session.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            // Afficher une alerte avec le message "Added successfully"
            var alertBox = document.createElement('div');
            alertBox.textContent = 'Added successfully!';
            alertBox.style.background = 'green';
            alertBox.style.color = 'white';
            alertBox.style.padding = '10px';
            alertBox.style.position = 'fixed';
            alertBox.style.top = '0';
            alertBox.style.left = '0';
            alertBox.style.width = '100%';
            alertBox.style.textAlign = 'center';
            document.body.appendChild(alertBox);

            // Disparition de la boîte d'alerte après 3 secondes
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 3000);
        };
        xhr.send('price=' + price);
     
    }
    </script>
    <!-- START Featured  -->
    <section class="home-main-contant-style3 col-grid-style bg-white">
        <div class="container">
            <div class="widget">
                <h6 class="text-uppercase bottom-line">Top Sells</h6>
            </div>
            <div class="row">
                    <div class="new-product slider">
                        <?php
                        $sql5 = "SELECT ID,price,nom FROM bidder ";
                        $result1 = $con->query($sql5);
                        if ($result1->num_rows > 0) {
                            foreach ($result1 as $row) {
                                $ID = $row["ID"];
                                $price = $row["price"];
                                $nom = $row["nom"];
                        
                                ?>
                                <div class="col-md-4 item">
                                    <div class="products grid-product">
                                        <div class="product-grid-inner">
                                            <div class="product-grid-img">
                                                <ul class="product-labels">
                                                    <li>
                                                        <?php date_default_timezone_set("Asia/Kolkata");

                                                        $nowDate = date("Y-m-d");

                                                        ?>
                                                    </li>
                                                </ul>
                                                <img style="width: 335px; height: 190px; " src="img/sells/<?php echo $nom;?>.jpg" alt="product-image" class="img-responsive" />
                                            </div>
                                            <div class="product-grid-caption text-center">
                                            <h6><a class="p-grid-title">  <?= $nom ?></a></h6>
                                            <h4 id="price">Price:
                                            <?= $price ?> TND
                                            </h4>
                                            <button class="btn btn-product cd-cart-btn" onclick="addToCart(<?= $price ?>)">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                            }
                        }


                        ?>
                    </div>    
            </div>   
        </div>
    </section>       
    <section class="home-main-contant-style3 bg-white">
        <div class="parallax-block parallaxBg">
            <div class="container">
                <div class="parallax-block-text">
                    <p>We are happy! <br> <span class="color-green">Thanks for checking out our website.</span></p>
                </div>

            </div>
        </div>
    </section>

    <?php
    include("footer.php");
    ?></div>