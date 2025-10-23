// ===== Carousel utama (infinite loop) =====
const carouselInner = document.getElementById("carouselInner");
const items = document.querySelectorAll(".carousel-item");
const totalItems = items.length;

let currentIndex = 1; // mulai dari slide pertama (setelah clone)
let isTransitioning = false;

// clone first & last item
const firstClone = items[0].cloneNode(true);
const lastClone = items[totalItems - 1].cloneNode(true);

carouselInner.appendChild(firstClone);
carouselInner.insertBefore(lastClone, items[0]);

// update total setelah clone
const updatedItems = document.querySelectorAll(".carousel-item");
const updatedTotal = updatedItems.length;

// atur posisi awal
carouselInner.style.transform = `translateX(-${100 * currentIndex}%)`;

function goToSlide(index) {
  if (isTransitioning) return;
  isTransitioning = true;

  currentIndex = index;
  carouselInner.style.transition = "transform 0.5s ease-in-out";
  carouselInner.style.transform = `translateX(-${100 * currentIndex}%)`;
}

carouselInner.addEventListener("transitionend", () => {
  isTransitioning = false;

  if (currentIndex === 0) {
    carouselInner.style.transition = "none";
    currentIndex = totalItems;
    carouselInner.style.transform = `translateX(-${100 * currentIndex}%)`;
  }
  if (currentIndex === updatedTotal - 1) {
    carouselInner.style.transition = "none";
    currentIndex = 1;
    carouselInner.style.transform = `translateX(-${100 * currentIndex}%)`;
  }
});

// tombol navigasi
document.getElementById("nextBtn").addEventListener("click", () => {
  goToSlide(currentIndex + 1);
});
document.getElementById("prevBtn").addEventListener("click", () => {
  goToSlide(currentIndex - 1);
});

// auto play
setInterval(() => goToSlide(currentIndex + 1), 5000);



// ===== Carousel card (responsif dengan max 3 card) =====
const cardCarouselInner = document.getElementById("cardCarouselInner");
const cardCarouselWrapper = document.getElementById("cardCarouselWrapper");
const cards = cardCarouselInner.querySelectorAll(".card");
let cardIndex = 0;
let visibleCards = 3;

function updateWrapperWidth() {
  const wrapperWidth = cardCarouselWrapper.offsetWidth;
  const cardWidth = cards[0].offsetWidth + 16; // card + gap

  // responsif: tentukan berapa card tampil
  if (wrapperWidth < 640) visibleCards = 1;       // HP
  else if (wrapperWidth < 1024) visibleCards = 2; // Tablet
  else visibleCards = 3;                          // Desktop

  const totalWidth = cards.length * cardWidth;
  cardCarouselInner.style.width = `${totalWidth}px`;
  showCard(cardIndex);
}

function showCard(index) {
  const totalCards = cards.length;
  if (index > totalCards - visibleCards) cardIndex = 0;
  else if (index < 0) cardIndex = totalCards - visibleCards;
  else cardIndex = index;

  const cardWidth = cards[0].offsetWidth + 16;
  const offset = -cardIndex * cardWidth;
  cardCarouselInner.style.transform = `translateX(${offset}px)`;
}

// tombol navigasi
document.getElementById("cardNext").addEventListener("click", () => {
  showCard(cardIndex + 1);
});
document.getElementById("cardPrev").addEventListener("click", () => {
  showCard(cardIndex - 1);
});

window.addEventListener("load", updateWrapperWidth);
window.addEventListener("resize", updateWrapperWidth);

// // auto play
// setInterval(() => showCard(cardIndex + 1), 4000);
