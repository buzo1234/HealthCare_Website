<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/medicine.css">
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
            <img src="https://consumer-app-images.pharmeasy.in/marketing/comp_3step.jpg" class="d-block w-100" alt="..." >
            </div>
            <div class="carousel-item">
            <img src="https://consumer-app-images.pharmeasy.in/marketing/comp_india_covered.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://consumer-app-images.pharmeasy.in/marketing/comp_50lac.jpg" class="d-block w-100" alt="...">
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

    <!-- Medicine Companies -->
    <section class="px-3 lg:max-w-6xl lg:mx-auto">
        <p class="mt-5 font-bold text-xl">Search By Companies</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
            <?php 
                require_once "../config.php";
                $sql = "select * from medicine_companies";
                if($result = $mysqli->query($sql)){
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<a href='./medbuy.php?company_id={$row['company_id']}&type_id=0'><div class='class51'>
                        <img src='".$row["company_image"]."' alt='category' class='w-40 object-contain'/>
                        <p class='truncate font-semibold text-lg text-center'>".$row["company_name"]."</p>
                        </div></a>";
                    }
                    }
                }
            ?>
        </div>
    </section>

    <!-- Medicine Types -->
    <section class="px-3 lg:max-w-6xl lg:mx-auto">
        <p class="mt-5 font-bold text-xl">Medicine Types</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
            <?php 
                require_once "../config.php";
                $sql = "select * from medicine_types";
                if($result = $mysqli->query($sql)){
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<a href='./medbuy.php?company_id=0&type_id={$row['type_id']}'><div class='class51'>
                        <img src='".$row["type_image"]."' alt='category' class='w-full h-44 object-contain'/>
                        <p class='truncate font-semibold text-lg text-center'>".$row["type_name"]."</p>
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