<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src='../javascript/store.js'></script> -->
</head>
<body>
    <?php include "../components/header.php" ?>

    <section class="grid grid-cols-6 mt-5 mb-5 px-3">
        <!-- All Categories -->
        <div class="flex flex-col w-full col-span-1 border-r-[1px] border-gray-300">
            <p class="font-bold text-xl mb-3">Categories</p>
            <?php
                require_once "../config.php";
                $sql = "select * from product_category";
                if($result = $mysqli->query($sql)){
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row['cat_id'] == $_GET['cat_id']){
                            echo "<a href='./category.php?cat_id={$row['cat_id']}'>
                            <p class='bg-blue-500  text-white font-semibold px-2 py-1 rounded-md'>".$row['cat_name']."</p>
                            </a>";
                        }
                        else{
                            echo "<a href='./category.php?cat_id={$row['cat_id']}'>
                            <p class='hover:bg-blue-500 hover:text-white hover:font-semibold px-2 py-1 rounded-md'>".$row['cat_name']."</p>
                            </a>
                            <div class='bg-gray-200 my-1 h-[0.5px]'></div>";
                        }
                        
                    }
                    }
                }
            ?>
        </div>

        <!-- Product of those categories -->
        <div class="flex w-full flex-col col-span-3 px-3">
            <p class="font-bold text-xl mb-3">Products</p>
            <div class="w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-2 ">
                <?php
                    require_once "../config.php";
                    $sql = "select * from products where product_cat_id={$_GET['cat_id']}";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $img_arr = explode(",", $row['product_img']);
                            echo "<div class='col-span-1  gap-y-3 shadow-md hover:shadow-2xl hover:z-20 flex flex-col justify-center items-center px-2 py-1 bg-white'>
                                <img src='".$img_arr[0]."' alt='product' class='w-[200px] h-[200px] object-contain shop-item-image'/>
                                <p class='text-sm font-semibold mt-2 mb-2 shop-item-title px-5'>".$row['product_name']."</p>
                                <div class='flex w-full justify-evenly items-center pb-2'>
                                <p class='font-bold text-xl shop-item-price'>Rs. ".$row['product_price']."</p>
                                <button class='bg-blue-500 px-3 py-2 text-white font-semibold rounded-lg w-1/3 shop-item-button'>Add</button>
                                </div>
                            </div>";
                        }
                        }
                    }
                ?>
            </div>
        </div>

        <!-- Cart -->
        <div class="flex flex-col w-full col-span-2 px-2">
            <p class="font-bold text-xl mb-3">Cart</p>
            <section class='cart-items'>

            <!-- <div class='cart-row'>

                
                <div class='flex w-full justify-between items-center px-2 bg-gray-200 py-2 mx-3 my-1 '>
                    <img src="../images/facebook.png" alt="" class='w-1/6'>
                    <div class='flex flex-col px-4 w-full'>
                        <p class='font-semibold truncate cart-item-title'>Product Name</p>
                        <p class='text-lg font-bold cart-price'>Rs. 345</p>
                    </div>

                    <div class='flex sm:flex-col md:flex-col lg:flex-row'>
                        <div class='flex items-center mb-1'>

                            <p class='font-semibold'>Qty:</p>
                            <input type="number" value='1' class='w-12 h-12 mx-4 px-2 cart-quantity-input'>
                        </div>
                        <button class='bg-red-500 px-2 py-1 text-white font-semibold rounded-md text-lg w-3/4 lg:w-full remove-button'>Remove</button>
                    </div>
                </div>
                
                
                
            </div> -->
            </section>
            
            <div class='bg-gray-200 h-[0.5px] flex w-full mt-2 mb-3'></div>

            <!-- Total Price -->
            <div class='flex w-full justify-end'>
                <p class='font-semibold text-2xl'>Total Price : Rs.<span class='font-bold text-4xl cart-total-price'>0</span></p>
                
            </div>
            <!-- checkout button -->                
            <button class='bg-blue-500 px-3 mx-auto  py-3 text-white text-2xl w-fit font-semibold rounded-lg mt-5 checkout-button'>Checkout ></button> 
            </div>

    </section>

    <?php include "../components/footer.php" ?>
</body>
</html>