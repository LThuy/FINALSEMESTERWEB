$(document).ready(function() {
  const logout = document.getElementsByClassName("logout")[0];
  const logoutbtn = document.getElementById("log_out");

  logout.addEventListener("mouseover", function() {
    logoutbtn.style.color = 'rgb(255, 255, 255)';
  })

  logout.addEventListener("mouseleave", function() {
    logoutbtn.style.color = ' #fa2c5f';
  })




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
var wavesurfer = WaveSurfer.create({
    backend: 'MediaElement',
    container: '#waveform',
    waveColor: '#ddd',
    progressColor: 'purple',
    barWidth: 5,
    responsive: true,
    height: 40,
    barRadius: 4
  });


wavesurfer.on('ready', function() {

    var playButton = document.getElementById('playBtn2');
    var buttonbackward = document.querySelector(".fa-backward");
    var buttonforward = document.querySelector(".fa-forward");
    var playField = document.getElementsByClassName('imgMusic')[0];
       
    
    wavesurfer.playPause();
    
    playField.onclick = function() {
       
      wavesurfer.playPause();
    
    }
    
    playButton.onclick = function() {
      wavesurfer.playPause();
    
    }
    
    buttonbackward.onclick = function() {
      wavesurfer.setPlaybackRate(wavesurfer.getPlaybackRate() - 0.25);
    }
    
    buttonforward.onclick = function() {
      wavesurfer.setPlaybackRate(wavesurfer.getPlaybackRate() + 0.25);
    }
    
    wavesurfer.on("play", function() {
      $("#playBtn").removeClass("fa-play-circle");
      $("#playBtn").addClass("fa-pause-circle-o");
      $("#playBtn2").removeClass("fa-play-circle");
      $("#playBtn2").addClass("fa-pause-circle-o");  
      playButton.style.Position = "relative";
      playButton.style.fontSize = "25px";
      playButton.style.cursor = "pointer";
    });


    
    
    // Add an event listener to the wavesurfer instance for the "pause" event
    wavesurfer.on("pause", function() {
      $("#playBtn").addClass("fa-play-circle");
      $("#playBtn").removeClass("fa-pause-circle-o");  
      $("#playBtn2").addClass("fa-play-circle");
      $("#playBtn2").removeClass("fa-pause-circle-o");           
    });

    

    
     
  var timeDisplay = document.getElementById('time');
  var minutes = Math.floor(wavesurfer.getCurrentTime() / 60);
  var seconds = Math.floor(wavesurfer.getCurrentTime() % 60);
  var timeString = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
  timeDisplay.innerHTML = timeString;

  wavesurfer.on('audioprocess', function() {
    
   
     // Apply CSS changes only to the song with 'active' class
     if (wavesurfer.isPlaying()) {
        // Apply CSS changes only to the song with 'active' class
        $('.songItem.active').find('img').css({
            'filter': 'brightness(60%)'
        })   
        $('.songItem.active').css({
            'background-color': 'rgb(114, 112, 112)',
            'border-radius': '8px 8px 8px 8px'
        });
    }
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

var slider = document.getElementById("volume");
var selector = document.getElementById("Selector");
var volumeIcon = document.getElementsByClassName("fa-volume-up")[0];
slider.addEventListener('input', function () { 
  var x = slider.value * 100;
  var color = 'linear-gradient(90deg, rgb(204, 0, 255)' + x + '% , rgb(156, 156, 156)' + x + '%)';
  slider.style.background = color;
  if(x < 50 && x > 0) {
    volumeIcon.classList = [];
    volumeIcon.classList.add("fa", "fa-volume-down");
  } else if(x > 50) {
    volumeIcon.classList = [];
    volumeIcon.classList.add("fa", "fa-volume-up");
  } else if(x < 1) {
    volumeIcon.classList = [];
    volumeIcon.classList.add("fa", "fa-volume-off");
  }
  setWaveSurferVolume(this.value);
 })

 volumeIcon.addEventListener('mouseover', function() {
  var x = slider.value * 100;
  var color = 'linear-gradient(90deg, rgb(204, 0, 255)' + x + '% , rgb(156, 156, 156)' + x + '%)';
  slider.style.background = color;
 })

 var sliderValue = slider.value;
 var statusVolume = "";
 volumeIcon.addEventListener('click', function() {
  slider.style.background = "";
  if (slider.value != 0) {
    // If the slider value is not 0, store the current volume icon class and set the volume to 0
    splittk = volumeIcon.classList.value.split(" ");
    statusVolume = splittk[1];
    volumeIcon.classList = [];
    volumeIcon.classList.add("fa", "fa-volume-off");
    sliderValue = slider.value;
    slider.value = 0;
    setWaveSurferVolume(0);
  } else {
    // If the slider value is 0, restore the previous volume icon class and slider value
    volumeIcon.classList.replace("fa-volume-off", statusVolume.trim());
    slider.value = sliderValue;
    setWaveSurferVolume(sliderValue);
  }
  var x = slider.value * 100;
  var color = 'linear-gradient(90deg, rgb(204, 0, 255)' + x + '% , rgb(156, 156, 156)' + x + '%)';
  slider.style.background = color;
 })


 function setWaveSurferVolume(volume) {
  wavesurfer.setVolume(volume);
}

var name_song;
var author;
var image;

    $('.m_musics').click(function(event) {    
       
      event.preventDefault();
      var url = $(this).attr('href');
      $.ajax({
        url: url,
        success: function(data) {
          $('main').html(data);
          let left_scrolls = document.getElementById("left-scrolls");
          let right_scrolls = document.getElementById("right-scrolls");
          let pop_artist = document.getElementsByClassName("item")[0];
          let left_scroll = document.getElementById("left-scroll");
          let right_scroll = document.getElementById("right-scroll");
          let pop_song = document.getElementsByClassName("pop-song")[0];
          
          if(left_scroll != null && right_scroll != null && pop_song != null) {
              left_scroll.addEventListener("click", () => {
                  pop_song.scrollLeft -= 330;
              })
              
              right_scroll.addEventListener("click", () => {
                  pop_song.scrollLeft += 330;
              })
          }
          
        if(left_scrolls != null && right_scrolls != null && pop_artist != null) {
            left_scrolls.addEventListener("click", () => {
                pop_artist.scrollLeft -= 330;
            })
            
            right_scrolls.addEventListener("click", () => {
                pop_artist.scrollLeft += 330;
            })
        }

       var play;
        $(".songItem").click(function(event) {    
          
            const id = $(event.currentTarget).attr("data-id");  
                    
                wavesurfer.load(id);
                setTimeout(function() {      
                  $("#playBtn3").removeClass();
                  $("#playBtn3").addClass('fa fa-play-circle');    
                  play = $(event.currentTarget).find('#playBtn3');
                  $(play).removeClass("fa-play-circle");
                  $(play).addClass("fa-pause-circle-o");  
                  $(".song-action").removeClass('active');
                    var img = $('.imgMusic').find('img');
                var namesong = $('.song-info').find('.name_song');
                var author_song =  $('.song-info').find('.name_author');
                var songTitle = $(event.currentTarget).find('.song-group');
                var songTitleText = songTitle.contents().filter(function() {
                  return this.nodeType === 3; // Select only text nodes
                }).text().trim(); // Concatenate and trim the text content
                name_song = songTitleText;
                namesong.html(songTitleText);
                author = $(event.currentTarget).find('.subtitle').text();
                author_song.html($(event.currentTarget).find('.subtitle').text());
                image = $(event.currentTarget).find('img').attr('src');
                img.attr('src', $(event.currentTarget).find('img').attr('src')); 

                // Get the previous song item that has the 'active' class
                var previousSongItem = $('.songItem.active');

                // Remove the 'active' class from the previous song item
                previousSongItem.removeClass('active');

                // Remove the CSS changes that were applied to the previous song item
                previousSongItem.find('img').css('filter', '');
                previousSongItem.css({
                    'background-color': '',
                    'border-radius': ''
                });

                // Add 'active' class to the clicked song
                $(event.currentTarget).addClass('active');   

                var heartIcon = document.getElementsByClassName("song-action")[0];
                var username = document.getElementById("username");  
                var songname = document.getElementsByClassName("name_song")[0];                       
            
                $.ajax({
                  url: "apis/checkExistedFavSong.php",
                  type: "POST",
                  data: {
                    username: username.innerText,
                    namesong: songname.innerText
                  },
                  success: function(response) {                
                    if(response == "true") {
                      console.log("done");
                      heartIcon.classList.add("active");
                    } else {
                      console.log("fail");
                      heartIcon.classList.remove("active");
                    }
                  },
                  error: function(xhr, status, error) {
                    console.error(status + ': ' + error);
                  }
                });              
                }, 1000);

               
                 
              
         });
        
         wavesurfer.on("pause", function() {
          $(play).removeClass("fa-pause-circle-o");
          $(play).addClass("fa-play-circle");
         })

        
          wavesurfer.on("play", function() {        
            setTimeout(function() {
              $(play).removeClass("fa-play-circle");
              $(play).addClass("fa-pause-circle-o"); 
            },1100);                     
           })

           $('.artistItem').click(function(event) { 
            event.preventDefault();
            var url = "artist.php";
            var artist = $(this).find("label").text();      
            var image_song = $(this).find("img").attr("src");
            $.ajax({
              url: url,
              type: "POST",
              data: {
                artist: artist,
                image: image_song
              },
              success: function(data) {
                $('main').html(data);
                $(".song").click(function(event) {
                  const id = $(event.currentTarget).attr("data-id");                   
                  wavesurfer.load(id);
                  var img = $('.imgMusic').find('img');
                  var namesong = $('.song-info').find('.name_song');
                  var author_song =  $('.song-info').find('.name_author');
                  name_song = $(event.currentTarget).find("h3").text();
                  author = $(event.currentTarget).find("p").text();
                  namesong.text($(event.currentTarget).find("h3").text());
                  author_song.text($(event.currentTarget).find("p").text());
                  image = $(event.currentTarget).find('img').attr('src');
                  console.log(image);
                  img.attr('src', $(event.currentTarget).find('img').attr('src')); 
                })
              }
            });
          });     
        } 
      });       
    });        

    $('.m_favorites').click(function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
          url: url,
          success: function(data) {
            $('main').html(data);

            $(".songInfo").click(function(e) {
              const id = $(e.currentTarget).attr("data-id");
              wavesurfer.load(id);
              var img = $('.imgMusic').find('img');
              var namesong = $('.song-info').find('.name_song');
              var author_song =  $('.song-info').find('.name_author');
              var songTitle = $(e.currentTarget).find('h5');
              var songTitleText = songTitle.contents().filter(function() {
                return this.nodeType === 3; // Select only text nodes
              }).text().trim(); // Concatenate and trim the text content
              name_song = songTitleText;
              namesong.html(songTitleText);
              author = $(e.currentTarget).find('.sub').text();
              author_song.html($(e.currentTarget).find('.sub').text());
              image = $(e.currentTarget).find('img').attr('src');
              img.attr('src', $(e.currentTarget).find('img').attr('src')); 
            })
          }
        });
      });
  
    var username = document.getElementById("username").innerText;
        
    // Use the current playback time to get the corresponding URL

    $('.song-action').click(function(e) {
      if(name_song != "" && author != "" && image != "") {
        var heartIcon = $(this);
        var link;
        if (wavesurfer.backend.media.src) {
          var parts = wavesurfer.backend.media.src.split('/');
          var filename = parts.slice(-1)[0];
          var path = parts.slice(-2, -1)[0] + '/' + filename;
          link = path;
         }  
         console.log(username);
         console.log(name_song);
         console.log(author);
         console.log(image);
        console.log(link);
        $.ajax({
          url: "apis/checkFavSong.php",
          method: "POST", 
          data: {
            user: username,
            namesong: name_song,
            author: author,
            link: link,
            image: image
          },
          success: function(response) {
            console.log(response);
            console.log("true");           
            if (response == 'true') {
              heartIcon.addClass('active');
            } else {
              heartIcon.removeClass('active');
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log("AJAX Error:", textStatus, errorThrown);
          }
        });
      }    
    });

    //Load chart
    $('.m_charts').click(function(event) { 
      event.preventDefault();
      var url = $(this).attr('href');
      $.ajax({
        url: url,
        success: function(data) {
          $('main').html(data);
          $(".song").click(function(event) {
            const id = $(event.currentTarget).attr("data-id");                   
            wavesurfer.load(id);
            var img = $('.imgMusic').find('img');
            var namesong = $('.song-info').find('.name_song');
            var author_song =  $('.song-info').find('.name_author');
            name_song = $(event.currentTarget).find("h3").text();
            author = $(event.currentTarget).find("p").text();
            namesong.text($(event.currentTarget).find("h3").text());
            author_song.text($(event.currentTarget).find("p").text());
            image = $(event.currentTarget).find('img').attr('src');
            console.log(image);
            img.attr('src', $(event.currentTarget).find('img').attr('src')); 
          })
        }
      });
    });

    //load html from categories.php
    $('.m_categories').click(function(event) { 
      event.preventDefault();
      var url = $(this).attr('href');
      $.ajax({
        url: url,
        success: function(data) {
          $('main').html(data);
          $('.category').click(function(event) { 
            event.preventDefault();
            console.log("OK");
            var category = $(this).find("h2").text();
            var image_category = $(this).find("img").attr("src");
            $.ajax({
              url: "category-detail.php",
              type: "POST",
              data: {
                name_category:  category,
                image: image_category
              },
              success: function(data) {
                $('main').html(data);
                $(".song").click(function(event) {
                  const id = $(event.currentTarget).attr("data-id");                   
                  wavesurfer.load(id);
                  var img = $('.imgMusic').find('img');
                  var namesong = $('.song-info').find('.name_song');
                  var author_song =  $('.song-info').find('.name_author');
                  name_song = $(event.currentTarget).find("h3").text();
                  author = $(event.currentTarget).find("p").text();
                  namesong.text($(event.currentTarget).find("h3").text());
                  author_song.text($(event.currentTarget).find("p").text());
                  image = $(event.currentTarget).find('img').attr('src');
                  console.log(image);
                  img.attr('src', $(event.currentTarget).find('img').attr('src')); 
                })         
              }
            });
          });
        }
      });
    });

    //create download link
    $('.download-link').click(function(e) {
      var parts = wavesurfer.backend.media.src.split('/');
      var filename = parts.slice(-1)[0];
      var path = parts.slice(-2, -1)[0] + '/' + filename;
      link = path;
      $(this).attr("href", link);
      $(this).attr("download", filename);      
    })


    $('#log_out').click(function(e) {
      e.preventDefault();
       //Show dialog confirm when log out
       var customDialog = document.getElementById("custom-dialog");
       var confirmYes = document.getElementById("confirm-yes");
       var confirmNo = document.getElementById("confirm-no");
        var body = document.getElementsByTagName('body')[0];
        body.classList.add("enableBlur");
        customDialog.classList.add("disableBlur");
       
       confirmYes.addEventListener("click", function() {
         // Code to delete the item goes here
         customDialog.style.display = "none";
         window.location.href = "Logout.php";
       });
       
       confirmNo.addEventListener("click", function() {
         // Code to cancel the deletion goes here
         customDialog.style.display = "none";
         body.classList.remove("enableBlur");
       });
       
       customDialog.style.display = "block";
    })



    //search

    var typingTimer;
    var doneTypingInterval = 500; // 500ms delay before sending AJAX request
    $("#search-songs").keyup(function() {
      clearTimeout(typingTimer);
      var query = $(this).val();
      if(query != "") {
        typingTimer = setTimeout(function() {
          $.ajax({
            url: "apis/search_songs.php",
            type: "POST",
            data: {
              query: query
            },
            success: function(data) {
              $(".search-box").fadeIn();
              $(".search-box").html(data);
              $(".search-card").click(function(event) {
                event.preventDefault();
                const id = $(event.currentTarget).attr("data-id");                   
                wavesurfer.load(id);
                var img = $('.imgMusic').find('img');
                  var namesong = $('.song-info').find('.name_song');
                  var author_song =  $('.song-info').find('.name_author');
                  var songTitle = $(event.currentTarget).find(".content");
                  var songTitleText = songTitle.contents().filter(function() {
                    return this.nodeType === 3; // Select only text nodes
                  }).text().trim();
                  name_song = songTitleText;
                  author = $(event.currentTarget).find(".subtitle").text();
                  namesong.text(songTitleText);
                  author_song.text($(event.currentTarget).find(".subtitle").text());
                  image = $(event.currentTarget).find('img').attr('src');
                  img.attr('src', $(event.currentTarget).find('img').attr('src')); 
              })
            }
  
          })
        }, doneTypingInterval);     
      } else {
        $(".search-box").html("");
        $(".search-box").css.display = "none";
      }
    })
    
    
                
    startAuto();


  });









