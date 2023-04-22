const songs = [
    {
        id: '1',
        songName:'Hãy Trao Cho Anh <div class="sub">Sơn Tùng MT-P</div>',
        poster: "poster/1.jpg",
    },
    {
        id: '2',
        songName:'Đúng Cũng Thành Sai <div class="sub">Mỹ Tâm</div>',
        poster: "poster/2.jpg",
    },
    {
        id: '3',
        songName:'Quên <div class="sub">Trịnh Công Sơn</div>',
        poster: "poster/3.jpg",
    },
    {
        id: '4',
        songName:'Lối Nhỏ <div class="sub">Đen Vâu</div>',
        poster: "poster/4.jpg",
    },
    {
        id: '5',
        songName:'Khỏi Phải Make Up <div class="sub">Bùi Công Nam x RickyStar xTDK</div>',
        poster: "poster/5.jpg",
    },
]

const song_info = document.getElementsByClassName('songInfo');
Array.from(song_info).forEach((element, i) => {
    if(songs[i] != null) {
        element.getElementsByTagName('img')[0].src = songs[i].poster;
        element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
    }  
})

