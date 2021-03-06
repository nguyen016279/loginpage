<?php
    session_start();
    require_once "db.php";
    require_once 'util.php';
    $user = $_SESSION[AUTH];
    if (!isset($user)){
        header('Location: login.php');
    }
    $sql = "select * from products";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        body {
            font: 14px/18px'OpenSans-Bold', sans-serif;
        }
        
        ul {
            list-style: none;
        }
        
        .wrapper {
            width: 700px;
            margin: 20px auto;
        }
        /* products */
        
        .products {
            margin: 40px 0;
            overflow: hidden;
            border-left: 1px solid #d9d9d9;
            border-bottom: 1px solid #d9d9d9;
        }
        
        .products ul li p {
            display: none;
        }
        
        .products ul.list li p {
            display: block;
        }
        
        .products .list li {
            float: none;
            display: block;
            width: 691px;
            height: 245px;
        }
        
        .products .list li .titlePro {
            float: left;
            position: relative;
            padding: 45px 0 20px 0;
            width: auto;
            height: auto;
            border: 0;
            background: transparent;
        }
        
        .products .list li:hover .titlePro {
            border: 0;
        }
        
        .products .list li .titlePro a {
            padding: 0 0 5px 0;
        }
        
        .products .list li .titlePro .descTitle {
            color: #333;
            text-transform: none !important;
            padding: 10px 0 0 0;
        }
        
        .products .list li .titlePro p {
            color: #333;
            text-transform: none !important;
            width: 440px;
        }
        
        .products .list li .wrapimg {
            height: 243px;
            float: left;
            border-right: 1px solid #d9d9d9;
            margin: 0 13px 0 0;
            width: 230px;
            position: relative;
        }
        
        .products .list li .wrapimg img {
            position: absolute;
            margin: auto;
            width: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        
        .products .list li .addPro {
            height: 243px;
            border-bottom: 1px solid rgba(51, 51, 51, 1);
        }
        
        .products .list li .addPro a {
            margin: 45% auto auto 40px;
        }
        
        .products.catalog {
            margin: 80px auto 40px auto;
        }
        
        .products.category {
            margin: 10px 0;
            width: 693px;
            float: left;
        }
        
        .products ul li {
            float: left;
            margin: 0;
            padding: 0;
            width: 230px;
            height: 244px;
            position: relative;
            border-top: 1px solid #d9d9d9;
            border-right: 1px solid #d9d9d9;
        }
        
        .products ul li img {
            position: absolute;
            margin: auto;
            width: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        
        .products ul li:hover .addPro,
        .products ul li:hover .addPro a {
            opacity: 1;
        }
        
        .products ul li:hover .titlePro {
            border: 1px solid rgba(51, 51, 51, 1);
            border-top: 0;
        }
        
        .products ul li:hover .titlePro a {
            color: #010101;
        }
        
        .addPro {
            position: absolute;
            top: 0;
            left: 0;
            width: 228px;
            height: 186px;
            border: 1px solid rgba(51, 51, 51, 1);
            border-bottom: 0;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            -webkit-transition: opacity 0s;
            -moz-transition: opacity 0s;
            -o-transition: opacity 0s;
        }
        
        .addPro a {
            text-decoration: none;
            display: inline-block;
            width: 157px;
            height: 40px;
            margin: 100px auto auto 40px;
            background-color: #333;
            text-align: center;
            font: 14px/40px'OpenSans-Italic', sans-serif;
            color: #fff;
            opacity: 0;
            -webkit-transition: opacity 1s;
            -moz-transition: opacity 1s;
            -o-transition: opacity 1s;
        }
        
        .titlePro {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 208px;
            height: 36px;
            border: 1px solid rgba(51, 51, 51, 0);
            -webkit-transition: opacity 1s;
            -moz-transition: opacity 1s;
            -o-transition: opacity 1s;
            border-top: 0;
            padding: 10px;
            background: rgba(255, 255, 255, 0.5);
        }
        
        .titlePro p,
        .titlePro span,
        .titlePro a {
            text-transform: uppercase;
        }
        
        .titlePro a {
            color: #003f75;
            text-decoration: none;
            display: block;
        }
        
        .titlePro span {
            color: #a20000;
        }
        
        .view p {
            top: 5px;
            margin: 0 10px 0 0;
        }
        
        .view p,
        .view a {
            float: left;
            display: inline-block;
            text-decoration: none;
            position: relative;
        }
        
        .icon-grid {
            background: url("http://cdn1.iconfinder.com/data/icons/jigsoar-icons/16/_thumbnail.png") no-repeat 0 0;
            height: 16px;
            width: 16px;
            top: 7px;
        }
        
        .icon-list {
            background: url("http://cdn3.iconfinder.com/data/icons/other-icons/48/list-32.png") no-repeat 0 0;
            height: 32px;
            width: 32px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="view">
            <p>View as:</p>
            <a href="#" class="icon-grid"></a>
            <a href="#" class="icon-list"></a>

        </div>

        <div class="products category">
            <ul class="">
                <?php foreach ($results as $key => $result) : ?>
                <li>
                    <div class="wrapimg">
                        <img src="<?= $result['image'] ?>">
                        <div class="addPro"> <a href="javascript:;">+ Add to shopping cart</a>
                        </div>
                    </div>
                    <div class="titlePro"> <a href="javascript:;"><?= $result['name'] ?></a>
                        <span><?= $result['price'] ?></span>

                        <p class="descTitle">Detailed item information</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book.</p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <script>
        $(".view a").on('click', function() {
            $('.products ul').toggleClass('list');
            return false;
        });
    </script>
</body>

</html>