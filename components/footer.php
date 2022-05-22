<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/footer.css">
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
    <!-- Footer -->
    <section class="class21">
      <div class="class22">
        <div class="class23">
          <p class="font-bold text-lg mb-2">Company</p>
          <p>About Us</p>
          <p>Project Summary</p>
        </div>

        <div class="class23">
          <p class="font-bold text-lg mb-2">Our Services</p>
          <p>Order Medicine</p>
          <p>Healthcare Products</p>
          <p>Book an Appointment</p>
        </div>

        <div class="class23">
          <p class="font-bold text-lg mb-2">Featured Categories</p>
          <?php
            require_once "../config.php";
            $sql = "select * from product_category";
            if($result = $mysqli->query($sql)){
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo "<p>".$row["cat_name"]."</p>";
                }
              }
            }
          ?>
        </div>

        <div class="class23">
          <p class="font-bold text-lg mb-2">Our Socials</p>
          <div class="flex space-x-3">

            <img src="../images/twitter.png" alt="twitter" class="w-8 ">
            <img src="../images/instagram.png" alt="instagram" class="w-8 bg">
            <img src="../images/facebook.png" alt="facebook" class="w-8">
          </div>
        </div>
        </div>
        <div class="w-3/4 h-[1px] bg-gray-500 "></div>
        <div class="flex w-full px-4 justify-center mt-3 mb-3">
          &copy; 2022 Arushi, Manipal Jaipur. All Rights Reserved
        </div>
    </section>
  </body>
</html>
