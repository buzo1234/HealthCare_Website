<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "../components/header.php" ?>

    <!-- Carousel -->
    <section class="lg:max-w-6xl lg:mx-auto mt-5">     
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://cms-contents.pharmeasy.in/banner/df34a17f271-HimalayaBaby-ICB-April22-min.jpg?dim=700x0&dpr=1&q=100" class="d-block w-100" alt="..." >
            </div>
            <div class="carousel-item">
            <img src="https://cms-contents.pharmeasy.in/banner/3112278be1a-Summersale.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://cms-contents.pharmeasy.in/banner/4a9fee56d3d-HimalayaWellness-ICB-April22-min.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev bg-gradient-to-r from-black/90 to-transaparent" type="button" data-target="#carouselExampleIndicators" data-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next bg-gradient-to-l from-black/90 to-transaparent" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
        </div>
    </section>

    <!-- Products Categories -->
    <section class="px-3 lg:max-w-6xl lg:mx-auto">
        <p class="mt-5 font-bold text-xl">Product Categories</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
            <?php 
                require_once "../config.php";
                $sql = "select * from product_category";
                if($result = $mysqli->query($sql)){
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<a href='./category.php?cat_id={$row['cat_id']}'><div class='flex flex-col items-center cursor-pointer mx-2 my-3 px-3 py-2 shadow-xl col-span-1 h-[250px] justify-center'>
                        <img src='".$row["cat_img"]."' alt='category' class='w-40 object-contain'/>
                        <p class='truncate font-semibold text-center'>".$row["cat_name"]."</p>
                        </div></a>";
                    }
                    }
                }
            ?>
        </div>
    </section>
    
    <?php include "../components/footer.php" ?>
</body>
</html>