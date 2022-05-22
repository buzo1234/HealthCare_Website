<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/appointment.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body> 
    <?php include "../components/header.php" ?>
    <!-- Appointment Form -->
    <section class='class61'>
        <p class='font-bold text-3xl'>Book an Appointment</p>
        <form action="" method='post' class='mt-5 mb-5'>
            <table class='flex w-full'>
        
                <tr class='flex mt-3'>
                    <td class='class63'>
                        <label for="fname" class='font-semibold text-lg'>First Name</label>
                        <input type="text" placeholder='Enter First Name' class='class62' required>
                    </td>
                    <td class='class63'>
                        <label for="lname" class='font-semibold text-lg'>Last Name</label>
                        <input type="text" placeholder='Enter Last Name' class='class62' required>
                    </td>
                </tr>

                <tr class='flex mt-3'>
                    <td class='class63'>
                        <label for="email" class='font-semibold text-lg'>Email</label>
                        <input type="text" placeholder="Enter your email address" class='class62' required>
                    </td>
                    <td class='class63'>
                        <label for="phone" class='font-semibold text-lg'>Phone Number</label>
                        <input type="Number" placeholder="Enter phone number" class='class62' required>
                    </td>
                </tr>

                <tr class='flex w-full mt-3'>
                    <td colspan='2' class='class63 w-full'>
                        <label for="cat" class='font-semibold text-lg'>Consultation needed in</label>
                        <select name="cat" id="cat" class='class62'>
                            <option value="body_pain">Body Pain</option>
                            <option value="mental_stress">Mental Stress</option>
                            <option value="high_fever">High Fever</option>
                            <option value="dizziness">Dizziness</option>
                            <option value="normal_checkup">Normal Checkup</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>

                <tr class='flex mt-3'>
                    <td class='flex w-fit flex-col mx-3' colspan='1'>

                        <label for="date" class='font-semibold text-lg'>Select Date</label>
                        <input type="date" class='class62' required>
                    </td>
                </tr>
                
                <tr class='flex justify-center my-5'>
                    <td>
                        <p class='text-red-600'>Our Associates will call you soon for confirmation!</p>
                    </td>
                </tr>

                <tr class='flex justify-center'>
                    <td>
                        <button type='submit' class='bg-blue-500 px-3 py-2 text-xl text-white font-semibold rounded-lg'>Book Now</button>
                    </td>
                </tr>

            </table>
        </form>
    </section>
    <?php include "../components/footer.php" ?>
</body>
</html>