<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Noto+Sans:wght@400;500;600;700&family=Roboto+Condensed:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <title>Document</title>
</head>

<body>
  <?php


  // Get the brand name from the query parameter
  $brandName = isset($_GET['brand']) ? $_GET['brand'] : '';

  // Fetch coupons for the specified brand
  $sql = "SELECT coupon.*, mark.logo,mark.nom_mark FROM `coupon` INNER JOIN mark ON mark.id_mark = coupon.id_mark WHERE mark.nom_mark = '$brandName'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $coupons = $result->fetch_all(MYSQLI_ASSOC);
  }
  ?>
  <div class="z-10 bg-black/70 w-full h-[100%]" id="hijab"></div>
  <div class="w-[40rem] h-[24rem] top[50%] left-[50%] bg-gray-900 z-20 absolute drop-shadow-md rounded-md hidden translate-x-[-50%] translate-y-[30%]" id="modal">
    <div class="rounded-md relative">
      <img src="img/img2.png" alt="" class="w-full h-full object-contain rounded-l-md" />
      <div class="absolute top-0 z-30 w-full h-full flex flex-col items-center">
        <h1 class="text-white text-3xl pt-6 tracking-wider font-bold">
          Newsletter
        </h1>
        <p class="text-3xl font-semibold text-white pt-14 px-20 text-center">
          Make Sure you're not missing out Sign up now
        </p>
      </div>
    </div>
    <div class="flex-1 h-full relative">
      <div class="absolute w-[1.8rem] h-[1.8rem] right-0 mt-2 mr-2 cursor-pointer">
        <img src="img/ext.svg" alt=" exit button" id="exit1" />
      </div>
      <h1 class="text-white text-center text-3xl pt-6 tracking-wider font-bold">
        buisnext
      </h1>
      <form action="" class="px-5 pt-5" id="formNewsletter">
        <label class="text-white flex flex-col text-lg font-semibold">
          First Name
          <input type="text" id="firstName" name="firstName" required class="rounded-sm text-gray-800 pl-2 mt-2 py-0.5" />
        </label>
        <label class="text-white flex flex-col text-lg mt-2 font-semibold">
          Last Name
          <input type="text" id="lastName" name="lastName" required class="rounded-sm text-gray-800 pl-2 mt-2 py-0.5" />
        </label>
        <label class="text-white flex flex-col text-lg mt-2 font-semibold">
          Email
          <input type="email" id="email" name="email" required class="rounded-sm text-gray-800 pl-2 mt-2 py-0.5" />
        </label>
        <button type="submit" class="border text-lg bg-[#FF059B] text-white px-12 py-1 rounded-lg mt-5 w-full hover:bg-pink-600 transition-all duration-500">
          Sign up
        </button>
      </form>
    </div>
  </div>

  <!-- MODAL WINDOW COUPON CODE -->
  <div class="w-[40rem] h-[30rem] fixed left-[50%] bg-white z-20 drop-shadow-md rounded-md translate-x-[-50%] translate-y-[30%] flex-col items-center hidden" id="modal2">
    <div class="w-[1.6rem] h-[1.6rem] ml-auto m-3 mr-4 cursor-pointer">
      <img src="img/exit2.svg" alt="close icone" class="w-full h-full object-contain" id="exit2" />
    </div>
    <div class="w-[10rem] h-[6rem]">
      <img src="img/logo-2.png" alt="" class="w-full h-full object-contain" />
    </div>
    <h1 class="text-gray-900 uppercase text-lg font-bold pt-6">Adidas</h1>
    <span class="text-2xl pt-2 font-semibold px-32">15% of your order</span>
    <span class="pt-5">ends in 10/10/10</span>
    <div class="border border-black mt-6 w-1/2 py-2 px-3 rounded-lg relative mb-2 drop-shadow-lg">
      <span class="text-xl font-bold pl-6" id="textCopy">6X90902289</span>
      <div class="h-full w-1/2 bg-pink-500 rounded-r-lg rounded-l-3xl absolute z-50 top-0 right-0 flex justify-center items-center drop-shadow-lg cursor-pointer" id="copy">
        <span class="text-white text-xl font-bold ml-auto pl-4">Copy</span>
        <div class="h-[2rem] w-[2rem] ml-auto drop-shadow-lg cursor-pointer">
          <img src="img/copy.svg" alt="copy icon" class="w-full h-full object-contain" />
        </div>
      </div>
    </div>
    <p>
      Copy and paste this code at <span class="text-pink-500">lenovo</span>
    </p>
  </div>

  <header class="px-28">
    <nav class="flex justify-between py-10 items-stretch capitalize font-bold text-xl tracking-wider">
      <ul class="flex gap-14 list-none">
        <li>
          <a href="index.php" class="hover:text-pink-700 transition-all duration-300">Home</a>
        </li>
        <li>
          <a href="index.php" class="hover:text-pink-700 transition-all duration-300">Coupons</a>
        </li>
        <li>
          <a href="#" class="hover:text-pink-700 transition-all duration-300">Brands</a>
        </li>
      </ul>
      <div class="text-pink-500 cursor-pointer hover:text-black transition-all duration-300" id="openModal">
        Newsletter
      </div>
    </nav>
  </header>
  <div class="bg-gray-800 w-full h-16">
    <ul class="flex h-full justify-center items-center pr-32">
      <li class="">
        <a href="index.php" class="border-2 w-full h-full text-2xl font-bold px-8 py-4 text-white hover:bg-pink-600 transition-all duration-300 ease-in-out uppercase">COUPONS</a>
      </li>
      <li class="">
        <a href="page2.php?brand=Adidas" class="border-2 w-full h-full text-2xl font-bold px-8 py-4 text-white hover:bg-pink-600 transition-all duration-300 ease-in-out uppercase">Adidas</a>
      </li>
      <li class="">
        <a href="page2.php?brand=Puma" class="border-2 w-full h-full text-2xl font-bold px-8 py-4 text-white hover:bg-pink-600 transition-all duration-300 ease-in-out uppercase">Puma</a>
      </li>
      <li class="">
        <a href="page2.php?brand=Lego" class="border-2 w-full h-full text-2xl font-bold px-8 py-4 text-white hover:bg-pink-600 transition-all duration-300 ease-in-out uppercase">Lego</a>
      </li>
      <li class="">
        <a href="page2.php?brand=Reebok" class="border-2 w-full h-full text-2xl font-bold px-8 py-4 text-white hover:bg-pink-600 transition-all duration-300 ease-in-out uppercase">Reebok</a>
      </li>
      <li class="">
        <a href="page2.php?brand=Sony" class="border-2 w-full h-full text-2xl font-bold px-8 py-4 text-white hover:bg-pink-600 transition-all duration-300 ease-in-out uppercase">Sony</a>
      </li>
    </ul>
    <form action="" class="mt-2">
      <div class="bg-white w-1/4 flex items-center justify-between rounded-l-3xl rounded-r-xl absolute right-0 mr-20 drop-shadow-md">
        <input class="pl-5 w-full text-lg bg-white rounded-l-3xl py-2 rounded-r-xl" placeholder="Search" />

        <div class="w-[1.6rem] mr-3 absolute right-0">
          <button type="submit">
            <img src="img/loop.svg" alt="loop logo" class="cursor-pointer" />
          </button>
        </div>
      </div>
    </form>
  </div>
  <section class="py-24 px-28">
    <h2 class="text-center text-5xl font-bold tracking-wide text-pink-500">
      <?php echo $brandName; ?>
    </h2>
    <p class="pt-6 text-2xl text-slate-600 text-center">
      Here are the coupons related to this brand
    </p>

    <div class="flex flex-col flex-wrap pt-20 px-20 gap-5 justify-center">
      <!-- ----------------------------- -->
      <?php foreach ($coupons as $coupon) : ?>
        <div class="border h-full bg-white flex items rounded-md drop-shadow-md hover:drop-shadow-lg transition-all duration-500">
          <div class="flex flex-1">
            <div class="w-[8rem] h-[8rem]">
              <!-- Use the logo stored as a blob in mark.logo -->
              <img src="data:image/jpeg;base64,<?php echo base64_encode($coupon['logo']); ?>" class="w-full h-full object-contain" />
            </div>
            <div class="px-4 pt-4">
              <!-- Display the brand name and coupon name -->
              <span class="font-semibold uppercase text-lg"><?php echo $coupon['nom_mark']; ?></span>
              <p class="font-semibold text-sm text-gray-500">
                <?php echo $coupon['nom_coupon']; ?>
              </p>
            </div>
          </div>
          <div class="flex w-1/3 items-center justify-center">
            <button class="py-2 text-lg font-bold px-9 rounded-md text-white bg-pink-500 drop-shadow-lg hover:bg-pink-600 hover:text-slate-200 hover:px-10 hover:py-3 transition-all duration-500" >
              Redeem code
            </button>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- ----------------------------- -->
    </div>
  </section>
  <footer class="bg-pink-400 w-full h-32 mt-10 text-white">
    <ul class="flex gap-2 text-sm justify-center pt-14 pb-1">
      <li><a href="">About us</a></li>
      <li><a href="">Privacy policy</a></li>
      <li><a href="">Contact Us</a></li>
    </ul>
    <p class="text-sm text-center">
      copyright © 2023 BUISNEXT. All Rights Reserved.
    </p>
  </footer>
</body>
<script src="script.js" defer></script>

</html>