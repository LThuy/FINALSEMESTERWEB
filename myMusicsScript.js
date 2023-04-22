const songs = [
    {
        id: '1',
        songName:'Hãy Trao Cho Anh <br> <div class="subtitle">Sơn Tùng MT-P</div>',
        poster: "poster/1.jpg",
    },
    {
        id: '2',
        songName:'Đúng Cũng Thành Sai <br> <div class="subtitle">Mỹ Tâm</div>',
        poster: "poster/2.jpg",
    },
    {
        id: '3',
        songName:'Quên <br> <div class="subtitle">Trịnh Công Sơn</div>',
        poster: "poster/3.jpg",
    },
    {
        id: '4',
        songName:'Lối Nhỏ <br> <div class="subtitle">Đen Vâu</div>',
        poster: "poster/4.jpg",
    },
    {
        id: '5',
        songName:'Khỏi Phải Make Up <br> <div class="subtitle">Bùi Công Nam x RickyStar xTDK</div>',
        poster: "poster/5.jpg",
    },
]

Array.from(document.getElementsByClassName('songItem')).forEach((element, i) => {
    if(songs[i] != null) {
        element.getElementsByTagName('img')[0].src = songs[i].poster;
        element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
    }  
})


let left_scroll = document.getElementById("left-scroll");
let right_scroll = document.getElementById("right-scroll");
let pop_song = document.getElementsByClassName("pop-song")[0];

left_scroll.addEventListener("click", () => {
    pop_song.scrollLeft -= 330;
})

right_scroll.addEventListener("click", () => {
    pop_song.scrollLeft += 330;
})


let left_scrolls = document.getElementById("left-scrolls");
let right_scrolls = document.getElementById("right-scrolls");
let pop_artist = document.getElementsByClassName("item")[0];

left_scrolls.addEventListener("click", () => {
    pop_artist.scrollLeft -= 330;
})

right_scrolls.addEventListener("click", () => {
    pop_artist.scrollLeft += 330;
})