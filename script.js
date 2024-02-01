function openModal2(img, brand, dateFin, pourcentage,bname) {
  modal2.classList.remove("pointer-events-none", "opacity-0");
  modal2.innerHTML = fillModal(img, brand, dateFin, pourcentage,bname);
  hijab.classList.remove("opacity-0", "pointer-events-none");
  document.body.classList.add("overflow-hidden");
}

function fillModal(base64Image, brand, dateFin, pourcentage,bname) {
  const randomCouponCode = generateRandomCouponCode();
  return `<div class="w-[1.6rem] h-[1.6rem] ml-auto m-3 mr-4 cursor-pointer">
    <img src="img/exit2.svg" alt="close icon" class="w-full h-full object-contain" id="exit2" />
  </div>
  <div class="w-[10rem] h-[6rem]">
    <img src="data:image/jpeg;base64,${base64Image}" alt="" class="w-full h-full object-contain" />
  </div>
  <h1 class="text-gray-900 uppercase text-lg font-bold pt-6">${brand}</h1>
  <span class="text-2xl pt-2 font-semibold px-32">${pourcentage}% off your order</span>
  <span class="pt-5">ends in ${formatDate(dateFin)}</span>
  <div class="border border-black mt-6 w-1/2 py-2 px-3 rounded-lg relative mb-2 drop-shadow-lg">
    <span class="text-xl font-bold pl-6" id="textCopy">${randomCouponCode}</span>
    <div class="h-full w-1/2 bg-pink-500 rounded-r-lg rounded-l-3xl absolute z-50 top-0 right-0 flex justify-center items-center drop-shadow-lg cursor-pointer" id="copy">
      <span class="text-white text-xl font-bold ml-auto pl-4">Copy</span>
      <div class="h-[2rem] w-[2rem] ml-auto drop-shadow-lg cursor-pointer">
        <img src="img/copy.svg" alt="copy icon" class="w-full h-full object-contain" />
      </div>
    </div>
  </div>
  <p>
    Copy and paste this code at <span class="text-pink-500">${bname}</span>
  </p>`;
}

function generateRandomCouponCode() {
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  const length = 10;
  let couponCode = '';

  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * characters.length);
    couponCode += characters.charAt(randomIndex);
  }

  return couponCode;
}



function formatDate(dateString) {
  const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', options);
}


document.addEventListener("DOMContentLoaded", function () {
  const close = document.getElementById("exit1");
  const modal2 = document.getElementById("modal2");
  const hijab = document.getElementById("hijab");
  const newsletter = document.getElementById("openModal");
  const formNewsletter = document.getElementById("formNewsletter");

  document.addEventListener("click", function (event) {
    if (
      event.target.id === "exit2" ||
      event.target.id === "copy" ||
      event.target.id === "hijab"
    ) {
      closeModal2();
    }
  });

  function closeModal2() {
    modal2.classList.add("pointer-events-none", "opacity-0");
    hijab.classList.add("opacity-0", "pointer-events-none");
    document.body.classList.remove("overflow-hidden");
  }

  document.addEventListener("click", function (event) {
    if (event.target.id === "copy") {
      const textToCopy = document.getElementById("textCopy");

      if (textToCopy) {
        const text = textToCopy.innerText;

        navigator.clipboard
          .writeText(text)
          .then(() => {
            console.log("Text copied to clipboard!");
            alert("Text copied to clipboard!");
          })
          .catch((err) => {
            console.error("Unable to copy text to clipboard", err);
          });
      }
    }
  });

  function openModal() {
    modal.classList.remove("opacity-0", "pointer-events-none");
    hijab.classList.remove("opacity-0", "pointer-events-none");
    document.body.classList.add("overflow-hidden");
  }

  document.addEventListener("click", function (event) {
    if (event.target.id === "modal") {
      openModal();
    }
  });

  function closeModal() {
    modal.classList.add("opacity-0", "pointer-events-none");
    hijab.classList.add("opacity-0", "pointer-events-none");
    document.body.classList.remove("overflow-hidden");
  }

  close.addEventListener("click", closeModal);
  hijab.addEventListener("click", closeModal);
  formNewsletter.addEventListener("submit", closeModal);
  newsletter.addEventListener("click", openModal);
});
