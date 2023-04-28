function sortSongs() {
    let container = document.querySelector('.container');
    let songs = Array.from(container.children);
    
    songs.sort(function(a, b) {
      let aWeeks = parseInt(a.querySelector('p:last-of-type').textContent.split(' ')[4]);
      let bWeeks = parseInt(b.querySelector('p:last-of-type').textContent.split(' ')[4]);
      
      return bWeeks - aWeeks;
    });
    
    songs.forEach(function(song) {
      container.removeChild(song);
    });
    
    songs.forEach(function(song) {
      container.appendChild(song);
    });
  }