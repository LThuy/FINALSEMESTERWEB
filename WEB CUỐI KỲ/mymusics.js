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



let left_scrolls = document.getElementById("left-scrolls");
let right_scrolls = document.getElementById("right-scrolls");
let pop_artist = document.getElementsByClassName("item")[0];


if(left_scrolls != null && right_scrolls != null && pop_artist != null) {
    left_scrolls.addEventListener("click", () => {
        pop_artist.scrollLeft -= 330;
    })
    
    right_scrolls.addEventListener("click", () => {
        pop_artist.scrollLeft += 330;
    })
}
