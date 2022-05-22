<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <script src="../javascript/store.js"></script>
    <script src='../javascript/search.js' defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: '#da373d',
              headerbg: '#232F3E',
              searchbg: '#F7F7F7',
            },
          },
        },
      };
    </script>
  </head>
  <body>
    <!-- Header -->
    <section
      class="class1"
    > 
      <div
        class="class2"
      >
        <!-- Logo -->
        <a href="../pages/index.php">
          <h2 class="font-bold cursor-pointer text-xl">Arushi ka logo</h2>
        </a>

        <!-- Search bar -->
        <div
          class="class3"
        >
        <div class='class4'>

          <input
          type="search"
          id="search"
          class="class5"
          placeholder="Search for Medicines/HealthCare Products"
          data-search
          />
          <div class="class6">
            <img
            src="../images/search.png"
            alt="searchbutton"
            class="class7"
            />
          </div>
        </div>
        <div class='class8' id='results'>
          <?php
            require_once "../config.php";
            $sql = "select * from medicines";
            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo "<div class='class9'>
                    <img src='".$row['medicine_image']."' class='class10 shop-item-search-image'/>
                    <div class='class11'>
                      <p class='class12 shop-item-search-title'>".$row['medicine_name']."</p>
                      <p class='class13 shop-item-search-price'>Rs. ".$row['medicine_price']."</p>
                    </div>
                    <div class='class14'>
                      <button class='class15 shop-item-search-button'>Add</button>
                    </div>
                  </div>";
                }
                }else{
                  echo $mysqli -> error;
                }
            }
            else{
              echo $mysqli -> error;
            }

            $sql2 = "select * from products";
            if($result = $mysqli->query($sql2)){
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  $img_arr = explode(",", $row['product_img']);
                  echo "<div class='class9'>
                    <img src='".$img_arr[0]."' class='class10 shop-item-search-image'/>
                    <div class='class11'>
                      <p class='class12 shop-item-search-title'>".$row['product_name']."</p>
                      <p class='class13 shop-item-search-price'>Rs. ".$row['product_price']."</p>
                    </div>
                    <div class='class14'>
                      <button class='class15 shop-item-search-button'>Add</button>
                    </div>
                  </div>";
                }
                }else{
                  echo $mysqli -> error;
                }
            }
            else{
              echo $mysqli -> error;
            }
          ?>
        </div>
        </div>

        <!-- Login/SignUp -->
        <div class="class16">
          <div class='class17'>

            <p class="hover:underline"><?php echo $_SESSION['username']?></p>
            <img
            src="../images/user.png"
            alt="user"
            class="class18"
            />
          </div>
          <div>
            <a href='../components/logout.php'><button class='class19'>LogOut</button></a>
          </div>
        </div>
      </div>
    </section>
    <section class="h-[0.5px] bg-gray-500 flex w-full"></section>
    <section
      class="z-10 bg-headerbg text-white shadow-lg flex flex-col w-full px-5 py-2 h-fit"
    >
      <div
        class="flex w-full justify-center space-x-5 text-lg mt-2 lg:max-w-6xl lg:mx-auto"
      >
        <a
          href="../pages/medicine.php"
          class="hover:underline hover:text-white hover:font-bold"
          >Order Medicines</a
        >
        <a
          href="../pages/products.php"
          class="hover:underline hover:text-white hover:font-bold"
          >HealthCare Products</a
        >
        <a
          href="../pages/appointment.php"
          class="hover:underline hover:text-white hover:font-bold"
          >Book Appointment</a
        >
      </div>
    </section>
  </body>
</html>
