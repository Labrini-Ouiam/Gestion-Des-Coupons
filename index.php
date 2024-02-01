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
  <style>
    .scroller {
      height: 200px;
      overflow: hidden;
    }

    .scroller_inner {
      display: flex;

      animation: HorizontalScroll 20s infinite linear;
      width: fit-content;
    }

    @keyframes HorizontalScroll {
      to {
        transform: translateX(-50%);
      }
    }
  </style>
  <title>Coupon Free</title>
</head>

<body style="font-family: 'Roboto Condensed', sans-serif" class="relative bg-stone-100">
  <!-- retrieving data -->
  <?php
  /*
  $sql1 = "SELECT coupon.* , mark.logo FROM `coupon` INNER JOIN mark ON mark.id_mark=coupon.id_mark";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($rows as $row) {
        echo $row["nom_coupon"]; // Vous pouvez remplacer "echo" par ce que vous souhaitez faire avec $row["nom_coupon"]
    }
}
*/
$sql = "SELECT coupon.*, mark.logo, mark.nom_mark FROM `coupon` INNER JOIN mark ON mark.id_mark = coupon.id_mark";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $coupons = $result->fetch_all(MYSQLI_ASSOC);
}
 /* $sql2 = "SELECT logo FROM mark";
  $result = $conn->query($sql1);

  $couponLogos = array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $couponLogos[] = $row["logo"];
    }
  }
*/
?>
  <!-- MODAL WINDOW -->
  <div class="fixed z-[1] inset-0 transition-all duration-500 ease-in-out bg-black/70 w-full opacity-0 pointer-events-none" id="hijab"></div>
  <div class="w-[40rem] h-[24rem] top[50%] left-[50%] bg-gray-900 z-20 absolute drop-shadow-md flex rounded-md opacity-0 pointer-events-none translate-x-[-50%] translate-y-[30%] transition-all duration-500 ease-in-out" id="modal">
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
      <form action="newsletter.php" method="POST" class="px-5 pt-5" id="formNewsletter">
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
        <button type="submit" class="border text-lg bg-[#FF059B] text-white px-12 py-1 rounded-lg mt-5 w-full hover:bg-pink-600 transition-all duration-500" onclick="showAlert()">
          Sign up
        </button>
      </form>
    </div>
  </div>

  <!-- MODAL WINDOW COUPON CODE -->
  <div class="w-[40rem] h-[30rem] fixed left-[50%] bg-white z-20 drop-shadow-md rounded-md translate-x-[-50%] translate-y-[30%] flex-col items-center opacity-0 pointer-events-none transition-all duration-500 flex" id="modal2"></div>

  <header class="px-28">
    <nav class="flex justify-between py-10 items-stretch capitalize font-bold text-xl tracking-wider">
      <ul class="flex gap-14 list-none">
        <li>
          <a href="#" class="hover:text-pink-700 transition-all duration-300">Home</a>
        </li>
        <li>
          <a href="#" class="hover:text-pink-700 transition-all duration-300">Coupons</a>
        </li>
        <li>
          <a href="page2.php" class="hover:text-pink-700 transition-all duration-300">Brands</a>
        </li>
      </ul>
      <div class="text-pink-500 cursor-pointer hover:text-black transition-all duration-300" id="openModal">
        Newsletter
      </div>
    </nav>

    <div class="h-96">
      <!-- Recherche -->
      <form action="">
        <div class="bg-white w-1/4 flex items-center justify-between rounded-l-3xl rounded-r-xl absolute right-0 mr-28 drop-shadow-md">
          <input class="pl-5 w-full text-lg bg-white rounded-l-3xl py-2 rounded-r-xl" placeholder="Search" />

          <div class="w-[1.6rem] mr-3 absolute right-0">
            <button type="submit">
              <img src="img/loop.svg" alt="loop logo" class="cursor-pointer" />
            </button>
          </div>
        </div>
      </form>
      <!-- end Recherche -->
      <div class="flex justify-between pt-14">
        <div class="flex flex-col items-center w-1/3">
          <h1 class="text-7xl font-bold w-56 text-center tracking-wide text-slate-700 py-8">
            Save Money Shop Smart
          </h1>
          <button class="border text-lg bg-pink-500 text-white px-12 py-2 rounded-lg mt-5 hover:bg-pink-600 transition-all duration-500">
            Get Coupons
          </button>
        </div>
        <div class="w-[32rem] h-[32rem] mt-[-3.5rem]">
          <img src="img/header.png" class="w-full h-full object-contain" alt="promos tree" />
        </div>
      </div>
    </div>
  </header>

  <!-- Half Price save -->
  <div class="scroller mt-32 mb-12">
    <ul class="scroller_inner">
      <li class="w-[125vw] shrink-0 h-[200px] relative">
        <img src="img/save.png" class="w-full h-full object-contain" alt="" />
      </li>
      <li class="w-[125vw] shrink-0 h-[200px] relative">
        <img src="img/save.png" class="w-full h-full object-contain" alt="" />
      </li>
    </ul>
  </div>
  <!-- Carassol -->
  <div class="carousel overflow-hidden flex justify-center items-center relative">
    <div id="leftButton" class="w-[1rem] h-[1rem] absolute left-20 cursor-pointer">
      <img src="img/left.svg" class="w-full h-full object-contain" alt="get best deals image" />
    </div>
    <ul class="flex gap-6 justify-center items-center" style="transition: transform 0.5s ease-in-out" id="imageList">
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm hidden">
      <a href="page2.php?brand=Asus">
      <img src="brand_logos/Asus.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>
      </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm">
      <a href="page2.php?brand=Apple">
      <img src="brand_logos/Apple.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>
      </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm">
      <a href="page2.php?brand=hp">
      <img src="brand_logos/hp.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>      </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm">
      <a href="page2.php?brand=Philips">
      <img src="brand_logos/Philips.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>      </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm">
      <a href="page2.php?brand=Colgate">
      <img src="brand_logos/Colgate.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>       </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm">
      <a href="page2.php?brand=Lego">
      <img src="brand_logos/Lego.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>       </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm">
      <a href="page2.php?brand=Nike">
      <img src="brand_logos/Nike.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
   </a>       </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm hidden">
        <img src="brand_logos/Puma.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
      </li>
      <li class="w-[12rem] h-[6rem] border drop-shadow-sm hidden">
        <img src="brand_logos/Microsoft.jpeg" class="w-full h-full object-contain" alt="get best deals image" />
      </li>
    </ul>
    <div id="rightButton" class="w-[1rem] h-[1rem] absolute right-20 cursor-pointer">
      <img src="img/right.svg" class="w-full h-full object-contain" alt="get best deals image" />
    </div>
  </div>
  <section class="py-24 px-28">
    <h2 class="text-center text-5xl font-bold tracking-wide text-pink-500">
      Today's Top Deals
    </h2>

    <div class="flex flex-wrap pt-20 gap-3 justify-center cursor-pointer">
      <?php foreach ($coupons as $coupon) : ?>
        <!-- loop through coupon -->
        <button class="border h-full bg-white flex gap-2 pt-4 rounded-md drop-shadow-md hover:bg-slate-100 transition-all duration-500" onclick="openModal2('<?php echo base64_encode($coupon['logo']); ?>','<?php echo $coupon['nom_coupon']; ?>','<?php echo $coupon['date_fin']; ?>','<?php echo $coupon['poursentage']; ?>','<?php echo $coupon['nom_mark']; ?>')">
          <div class="w-[8rem] h-[8rem]">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($coupon['logo']); ?>" class="w-full h-full object-contain" />
          </div>
          <div class="px-4">
            <span class="font-semibold uppercase text-lg"><?php echo $coupon['nom_coupon']; ?></span>
            <p class="font-semibold text-sm text-gray-500 max-w-[15rem]">
              Click the coupon to get more information about it
            </p>
          </div>
        </button>
      <?php endforeach; ?>
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

<?php $conn->close(); ?>