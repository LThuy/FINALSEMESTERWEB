const images = document.querySelectorAll('.list-images img');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const display = document.querySelector('.carousel');
let currentIndex = 0;
let intervalId;

// Set the initial background image to the first image
display.style.setProperty('--bg-image', `url(${images[0].src})`);

function showImage(index) {
  images.forEach((img, i) => {
    if (i === index) {
      img.style.display = 'block';
      display.style.setProperty('--bg-image', `url(${img.src})`);
    } else {
      img.style.display = 'none';
    }
  });
}

function nextImage() {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  showImage(currentIndex);
}

prevBtn.addEventListener('click', () => {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = images.length - 1;
  }
  showImage(currentIndex);
});

nextBtn.addEventListener('click', () => {
  nextImage();
});

function startAuto() {
  intervalId = setInterval(() => {
    nextImage();
  }, 5000);
}

function stopAuto() {
  clearInterval(intervalId);
}

startAuto();