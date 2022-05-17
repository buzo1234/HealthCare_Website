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
            <p class="font-bold text-xl mb-3">Medicine Types</p>
            <?php
                require_once "../config.php";
                $sql = "select * from medicine_types";
                if($result = $mysqli->query($sql)){
                    if($result->num_rows > 0){
                        if($_GET['type_id'] ==0){
                            echo "<a href='./medbuy.php?company_id={$_GET['company_id']}&type_id=0'><p class='bg-blue-500  text-white font-semibold px-2 py-1 rounded-md'>All</p></a>";
                        }
                        else{
                            echo "<a href='./medbuy.php?company_id={$_GET['company_id']}&type_id=0'><p class='hover:bg-blue-500 hover:text-white hover:font-semibold px-2 py-1 rounded-md'>All</p></a>";
                        }
                    while($row = $result->fetch_assoc()){
                        if($row['type_id'] == $_GET['type_id']){
                            echo "<a href='./medbuy.php?company_id={$_GET['company_id']}&type_id={$row['type_id']}'>
                            <p class='bg-blue-500  text-white font-semibold px-2 py-1 rounded-md'>".$row['type_name']."</p>
                            </a>";
                        }
                        else{
                            echo "<a href='./medbuy.php?company_id={$_GET['company_id']}&type_id={$row['type_id']}'>
                            <p class='hover:bg-blue-500 hover:text-white hover:font-semibold px-2 py-1 rounded-md'>".$row['type_name']."</p>
                            </a>
                            <div class='bg-gray-200 my-1 h-[0.5px]'></div>";
                        }
                        
                    }
                    }
                }
            ?>
        </div>

        <!-- Medicines of those categories -->
        <div class="flex w-full flex-col col-span-3 px-3">
            <p class="font-bold text-xl mb-3">Medicines</p>
            <div class='w-full flex justify-evenly mb-5'>
            <?php
                    require_once "../config.php";
                    $sql = "select * from medicine_companies";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            if($_GET['company_id'] ==0){
                                echo "<a href='./medbuy.php?company_id=0&type_id={$_GET['type_id']}'><p class='w-fit px-5 py-1 bg-black rounded-md text-white cursor-pointer font-semibold'>All</p></a>";
                            }
                            else{
                                echo "<a href='./medbuy.php?company_id=0&type_id={$_GET['type_id']}'><p class='w-fit px-5 py-1 border-2 border-black rounded-md cursor-pointer font-semibold'>All</p></a>";
                            }
                        while($row = $result->fetch_assoc()){
                            if($row['company_id'] == $_GET['company_id']){
                                echo "<a href='./medbuy.php?company_id={$row['company_id']}&type_id={$_GET['type_id']}'><div class='w-fit px-5 py-1 bg-black rounded-md text-white cursor-pointer font-semibold'>".$row['company_name']."</div></a>";
                            }
                            else{

                                echo "<a href='./medbuy.php?company_id={$row['company_id']}&type_id={$_GET['type_id']}'><div class='w-fit px-5 py-1 border-2 border-black rounded-md cursor-pointer font-semibold'>".$row['company_name']."</div></a>";
                            }
                        }
                        }
                    }else{
                         echo $mysqli -> error;
                        }
                ?>
                
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-2 ">
                <?php
                    require_once "../config.php";
                    if($_GET['company_id']==0 && $_GET['type_id']==0){
                        $sql = "select * from medicines";
                    }
                    elseif ($_GET['company_id']==0) {
                        $sql = "select * from medicines where type_id={$_GET['type_id']}";
                    }
                    elseif ($_GET['type_id']==0){

                        $sql = "select * from medicines where company_id={$_GET['company_id']}";
                    }
                    else{
                        $sql = "select * from medicines where company_id={$_GET['company_id']} and type_id={$_GET['type_id']}";
                    }
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<div class='col-span-1  gap-y-3 shadow-md hover:shadow-2xl hover:z-20 flex flex-col justify-center items-center px-2 py-1 bg-white'>
                                <img src='".$row['medicine_image']."' alt='product' class='w-[200px] h-[200px] object-contain shop-item-image'/>
                                <p class='font-semibold mt-2 mb-2 shop-item-title px-5'>".$row['medicine_name']."</p>
                                <p class='text-sm font-semibold mt-2 mb-2 shop-item-title px-5'>".$row['medicine_description']."</p>
                                <div class='flex w-full justify-evenly items-center pb-2'>
                                <p class='font-bold text-xl shop-item-price'>Rs. ".$row['medicine_price']."</p>
                                <button class='bg-blue-500 px-3 py-2 text-white font-semibold rounded-lg w-1/3 shop-item-button'>Add</button>
                                </div>
                            </div>";
                        }
                        }
                    }else{
                         echo $mysqli -> error;
                        }
                ?>
            </div>
        </div>

        <!-- Cart -->
        <div class="flex flex-col w-full col-span-2 px-2">
            <p class="font-bold text-xl mb-3">Cart</p>
            <section class='cart-items'>
                <!-- Cart Rows -->
            </section>
            
            <div class='bg-gray-200 h-[0.5px] flex w-full mt-2 mb-3'></div>
                
            <!-- Total Price -->
            <div class='flex w-full justify-end'>
                <p class='font-semibold text-2xl'>Total Price : Rs.<span class='font-bold text-4xl cart-total-price'>0</span></p>
                
            </div>
        
            <!-- checkout button -->                
            <button class='bg-blue-500 px-3 mx-auto  py-3 text-white text-2xl w-fit font-semibold rounded-lg mt-5 checkout-button' style="display: none;">Checkout ></button> 
            </div>

    </section>

    <?php include "../components/footer.php" ?>
</body>
</html>