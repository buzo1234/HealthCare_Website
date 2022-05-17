
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
<body >
  <?php include "../components/header.php" ?>

  <!-- Carousel -->
  <section>

    
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://cms-contents.pharmeasy.in/banner/ebc0b3f5f5c-MEDI40_Dweb.jpg?dim=1440x0&dpr=1&q=100" class="d-block w-100" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="https://cms-contents.pharmeasy.in/banner/7400d70904b-DWEB.jpg?dim=1440x0&dpr=1&q=100" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://cms-contents.pharmeasy.in/banner/b9b34dbc96d-GETCSH_DWEB.jpg?dim=1440x0&dpr=1&q=100" class="d-block w-100" alt="...">
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

<!-- Features -->
<section class="px-3 flex w-full justify-center mt-5 lg:max-w-6xl lg:mx-auto grid grid-cols-3 gap-4">
  <div class="col-span-1 shadow-xl rounded-lg">
    <div class="relative justify-between bg-sky-500 text-white font-bold">
      <p class="py-3 px-2 text-lg">Order Medicines</p>
      <img src="https://assets.pharmeasy.in/web-assets/dist/7c645a8d.png?dim=186x0&dpr=1.25&q=100" alt="" class="absolute right-0 top-0 w-[125px] lg:w-[135px]">
    </div>
    <div class="px-2 py-3">
      <a href='./medicine.php'><button class="bg-yellow-500 px-3 py-2 text-white font-bold rounded-lg">Order Now</button></a>
    </div>
  </div>

  <div class="col-span-1 shadow-xl rounded-lg">
    <div class="relative justify-between bg-sky-500 text-white font-bold">
      <p class="py-3 px-2 text-lg">HealthCare Products</p>
      <img src="https://assets.pharmeasy.in/web-assets/dist/c7c7095b.png?dim=186x0&dpr=1.25&q=100" alt="" class="absolute right-0 top-0 w-[125px] lg:w-[135px]">
    </div>
    <div class="px-2 py-3">
      <a href='./products.php'><button class="bg-yellow-500 px-3 py-2 text-white font-bold rounded-lg">Order Now</button></a>
    </div>
  </div>

  <div class="col-span-1 shadow-xl rounded-lg">
    <div class="relative justify-between bg-sky-500 text-white font-bold">
      <p class="py-3 px-2 text-lg">Appointments</p>
      <img src="https://assets.pharmeasy.in/web-assets/dist/e1d3ac1c.png?dim=186x0&dpr=1.25&q=100" alt="" class="absolute right-0 top-0 w-[125px] lg:w-[135px]">
    </div>
    <div class="px-2 py-3">
      <a href='./appointment.php'><button class="bg-yellow-500 px-3 py-2 text-white font-bold rounded-lg">Book Now</button></a>
    </div>
  </div>

</section>

<!-- Featured Categories -->
<section class="flex mt-5 flex-col max-w-6xl mx-auto px-3">
  <p class="font-bold text-xl">Featured Categories</p>
  <div class="flex w-full px-2 overflow-x-scroll">
    <?php 
      require_once "../config.php";
      $sql = "select * from product_category";
      if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<a href='./category.php?cat_id={$row['cat_id']}' class='flex flex-col cursor-pointer bg-gray-100 mx-2 my-3 px-3 py-2 min-w-[150px] h-[150px] rounded-sm shadow-md'><div class='flex flex-col'>
              <img src='".$row["cat_img"]."' alt='category' class=' object-contain'/>
              <p class='truncate font-semibold text-center'>".$row["cat_name"]."</p>
            </div></a>";
          }
        }
      }
    ?>
  </div>
</section>

<!-- Health Articles -->
<section class="flex mt-5 flex-col max-w-6xl mx-auto px-3 ">
  <p class="font-bold text-xl">Health Articles</p>
  <div class="grid grid-cols-3 gap-2">
    <?php
      require_once "../config.php";
      $sql2 = "select * from articles";
      if($result = $mysqli->query($sql2)){
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<div class='flex flex-col col-span-1 my-3 px-1 py-1 shadow-xl  rounded-sm '>
              <img src='".$row["article_image"]."' alt='category' class=' object-contain'/>
              <p class='text-lg font-semibold px-2 mt-2'>".$row["article_heading"]."</p>
              <p class='px-2 mt-2'>".$row["article_body"]."...</p>
              <a class='font-bold text-xl hover:underline text-blue-600 px-2 mt-2 hover:text-blue-600 cursor-pointer' href='".$row["aricle_url"]."'>Read More ></a>
            </div>";
          }
        }
      }
    ?>
  </div>
</section>

<!-- Footer -->
<section>
    <?php include "../components/footer.php" ?>
</section>

</body>
</html>