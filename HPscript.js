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

var playButton = document.getElementById('playBtn');
var playField = document.getElementsByClassName('imgMusic')[0];
var icon = document.querySelector(".fa-play-circle");

var wavesurfer = WaveSurfer.create({
  container: '#waveform',
  waveColor: '#ddd',
  progressColor: 'purple',
  barWidth: 5,
  responsive: true,
  height: 60,
  barRadius: 4
});

wavesurfer.load('musics/hay-trao-cho-anh.mp3');

playField.onclick = function() {
  wavesurfer.playPause();

}
wavesurfer.on("play", function() {
  // Remove the "fa-play-circle" class from the icon
  icon.classList.remove("fa-play-circle");

  // Add the "fa-pause-circle-o" class to the icon
  icon.classList.add("fa-pause-circle-o");

});

// Add an event listener to the wavesurfer instance for the "pause" event
wavesurfer.on("pause", function() {
  // Add the "fa-play-circle" class to the icon
  icon.classList.add("fa-play-circle");

  // Remove the "fa-pause-circle-o" class from the icon
  icon.classList.remove("fa-pause-circle-o");

});


wavesurfer.on('ready', function() {
  var timeDisplay = document.getElementById('time');
  var minutes = Math.floor(wavesurfer.getCurrentTime() / 60);
  var seconds = Math.floor(wavesurfer.getCurrentTime() % 60);
  var timeString = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
  timeDisplay.innerHTML = timeString;

  wavesurfer.on('audioprocess', function() {
    
    var currentTime = wavesurfer.getCurrentTime();
    var remainingTimeDiv = document.getElementById('total-time');
    // Get the current volume of the audio
    var volume = wavesurfer.backend.getVolume();

    // Map the volume to a value between 0 and 1
    var normalizedVolume = volume / 1;

    // Calculate the hue value for the gradient based on the normalized volume
    var hue = normalizedVolume * 180;

    // Update the background color with the new hue value
    document.body.style.background = 'linear-gradient(to bottom, hsl(' + hue + ', 150%, 50%), hsl(' + (hue + 30) + ', 100%, 50%))';
    minutes = Math.floor(wavesurfer.getCurrentTime() / 60);
    seconds = Math.floor(wavesurfer.getCurrentTime() % 60);
    timeString = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
    timeDisplay.innerHTML = timeString;
    remainingTimeDiv.innerHTML = formatTime(wavesurfer.getDuration() - currentTime);
  });

  wavesurfer.on('seek', function() {
    var currentTime = wavesurfer.getCurrentTime();
    var remainingTimeDiv = document.getElementById('total-time');
    timeDisplay = document.getElementById('time');
    minutes = Math.floor(wavesurfer.getCurrentTime() / 60);
    seconds = Math.floor(wavesurfer.getCurrentTime() % 60);
    timeString = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
    timeDisplay.innerHTML = timeString;
    remainingTimeDiv.innerHTML = formatTime(wavesurfer.getDuration() - currentTime);
  });

  function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    return minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
}

  var totalDuration = wavesurfer.getDuration();
  // Convert total duration to minutes and seconds format
  var minutest = Math.floor(totalDuration / 60);
  var secondst = Math.floor(totalDuration % 60);

  // Format minutes and seconds with leading zeros
  minutest = (minutest < 10 ? '0' : '') + minutest;
  secondst = (secondst < 10 ? '0' : '') + secondst;

  // Update the #total-time div element with the total duration
  var totalTimeDiv = document.getElementById('total-time');
  totalTimeDiv.innerHTML = minutest + ':' + secondst;

});


startAuto()





