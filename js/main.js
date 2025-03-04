const productContainers2 = [...document.querySelectorAll(".container-pro")];
const nxtBtn2 = [...document.querySelectorAll(".arrived .nxt-btn")];
const preBtn2 = [...document.querySelectorAll(".arrived .pre-btn")];
const proCon = productContainers2[0].getBoundingClientRect();
const containerWidth2 = proCon.width;
let maxScroll2 =
  productContainers2[0].scrollWidth - productContainers2[0].clientWidth;

// autobrand2();
// function autobrand2() {
//   if (productContainers2[0].scrollLeft < maxScroll2) {
//     productContainers2[0].scrollLeft += containerWidth2 / 2;
//     setTimeout(autobrand2, 4000);
//   } else {
//     prebrand2();
//   }
// }

// function prebrand2() {
//   if (productContainers2[0].scrollLeft > 0) {
//     productContainers2[0].scrollLeft -= containerWidth2 / 2;
//     setTimeout(prebrand2, 4000);
//   } else {
//     autobrand2();
//   }
// }
productContainers2.forEach((item, i) => {
  let containerDimensions2 = item.getBoundingClientRect();
  let containerWidth2 = containerDimensions2.width;

  nxtBtn2[i].addEventListener("click", () => {
    item.scrollLeft += containerWidth2;
  });

  preBtn2[i].addEventListener("click", () => {
    item.scrollLeft -= containerWidth2;
  });
});

const productContainers3 = [...document.querySelectorAll(".brandCon")];
const nxtBtn3 = [...document.querySelectorAll(".brand .nxt-btn")];
const preBtn3 = [...document.querySelectorAll(".brand .pre-btn")];
const containerDimensions = productContainers3[0].getBoundingClientRect();
const containerWidth3 = containerDimensions.width;
let maxScroll =
  productContainers3[0].scrollWidth - productContainers3[0].clientWidth;
// autobrand();
// function autobrand() {
//   if (productContainers3[0].scrollLeft != maxScroll) {
//     productContainers3[0].scrollLeft += containerWidth3 / 2;

//     const myTimeout = setTimeout(autobrand, 4000);
//   } else {
//     prebrand();
//   }
// }

// function prebrand() {
//   if (productContainers3[0].scrollLeft > 0) {
//     productContainers3[0].scrollLeft -= containerWidth3 / 2;
//     const myTimeout = setTimeout(prebrand, 4000);
//   } else {
//     autobrand();
//   }
// }

productContainers3.forEach((item, i) => {
  let containerDimensions3 = item.getBoundingClientRect();

  let containerWidth3 = containerDimensions3.width;

  nxtBtn3[i].addEventListener("click", () => {
    item.scrollLeft += containerWidth3 / 1.5;
  });

  preBtn3[i].addEventListener("click", () => {
    item.scrollLeft -= containerWidth3 / 1.5;
  });
});

// Promption
var timeOut = 0;
var slideIndex = 0;
var autoOn = true;

autoSlides();
function currentSlide(n) {
  showSlides((slideIndex = n - 1));
}

function autoSlides() {
  timeOut = timeOut - 20;

  if (autoOn == true && timeOut < 0) {
    showSlides();
  }
  setTimeout(autoSlides, 20);
}

function prevSlide() {
  timeOut = 3000;

  var slides = document.getElementsByClassName("image");
  var dots = document.getElementsByClassName("dot");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slideIndex--;

  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  if (slideIndex == 0) {
    slideIndex = slides.length;
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

function showSlides() {
  timeOut = 3000;

  var slides = document.getElementsByClassName("image");
  var dots = document.getElementsByClassName("dot");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slideIndex++;

  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
let span = document.querySelector(".scroll-to-top");
window.onscroll = function () {
  if (this.scrollY >= 700) {
    span.classList.add("show");
  } else {
    span.classList.remove("show");
  }
};
span.onclick = function () {
  window.scrollTo({
    top: 0,
  });
};
const productContainers = [...document.querySelectorAll(".Category")];
const nxtBtn = [...document.querySelectorAll(".SecCategory .nxt-btn")];
const preBtn = [...document.querySelectorAll(".SecCategory .pre-btn")];

productContainers.forEach((item, i) => {
  let containerDimensions = item.getBoundingClientRect();
  let containerWidth = containerDimensions.width;

  nxtBtn[i].addEventListener("click", () => {
    item.scrollLeft += containerWidth / 1.6;
  });

  preBtn[i].addEventListener("click", () => {
    item.scrollLeft -= containerWidth;
  });
});
let links = document.querySelectorAll(".isDisabled");

for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function (event) {
    event.preventDefault();
  });
}
