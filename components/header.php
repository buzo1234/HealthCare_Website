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
      class="sticky top-0 z-30 bg-headerbg text-white flex flex-col w-full px-5 py-2 h-fit pt-3 pb-3"
    >
      <div
        class="flex justify-between items-center w-full bg-headerbg lg:max-w-6xl lg:mx-auto"
      >
        <!-- Logo -->
        <a href="../pages/index.php">
          <h2 class="font-bold cursor-pointer text-xl">Arushi ka logo</h2>
        </a>

        <!-- Search bar -->
        <div
          class="flex relative flex-col bg-searchbg rounded-lg w-1/2 items-center px-2"
        >
        <div class='flex justify-between w-full items-center'>

          <input
          type="search"
          id="search"
          class="flex w-full text-black rounded-lg h-12 outline-none px-1"
          placeholder="Search for Medicines/HealthCare Products"
          data-search
          />
          <div class="px-2 py-1 cursor-pointer">
            <img
            src="../images/search.png"
            alt="searchbutton"
            class="w-5 object-contain"
            />
          </div>
        </div>
        <div class='bg-white flex flex-col text-black w-full z-30 h-fit max-h-[600px] overflow-y-auto absolute left-0 top-11 hidden' id='results'>
          <?php
            require_once "../config.php";
            $sql = "select * from medicines";
            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo "<div class='bg-gray-100 my-2 px-2 py-2 flex items-center w-full rounded-md'>
                    <img src='".$row['medicine_image']."' class='object-contain w-1/3 h-[60px] shop-item-search-image'/>
                    <div class='w-1/3 flex flex-col'>
                      <p class='px-2 shop-item-search-title'>".$row['medicine_name']."</p>
                      <p class='font-semibold text-lg px-2 shop-item-search-price'>Rs. ".$row['medicine_price']."</p>
                    </div>
                    <div class='flex w-1/3 justify-center items-center'>
                      <button class='px-3 py-1 text-white font-semibold bg-blue-500 h-fit rounded-lg shop-item-search-button'>Add</button>
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
                  echo "<div class='bg-gray-100 my-2 px-2 py-2 flex items-center w-full rounded-md'>
                    <img src='".$img_arr[0]."' class='object-contain w-1/3 h-[60px] shop-item-search-image'/>
                    <div class='w-1/3 flex flex-col'>
                      <p class='px-2 shop-item-search-title'>".$row['product_name']."</p>
                      <p class='font-semibold text-lg px-2 shop-item-search-price'>Rs. ".$row['product_price']."</p>
                    </div>
                    <div class='flex w-1/3 justify-center items-center'>
                      <button class='px-3 py-1 text-white font-semibold bg-blue-500 h-fit rounded-lg shop-item-search-button'>Add</button>
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
        <div class="flex flex-col lg:flex-row lg:space-x-4 items-center justify-center space-y-2">
          <div class='flex space-x-2'>

            <p class="hover:underline"><?php echo $_SESSION['username']?></p>
            <img
            src="../images/user.png"
            alt="user"
            class="w-7 object-contain bg-white px-1"
            />
          </div>
          <div>
            <a href='../components/logout.php'><button class='bg-blue-500 px-3 py-1 rounded-md text-white font-semibold'>LogOut</button></a>
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
