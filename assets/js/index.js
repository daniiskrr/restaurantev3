function playVideo() {
    var video = document.querySelector('video');
    var previewImage = document.querySelector('.preview-image');
    video.play();
    previewImage.style.display = 'none';
  }  

window.addEventListener('load', function() {
    var video2 = document.querySelector('.video video');
    var boton = document.querySelector('.botoncito');
    var imagen = document.querySelector('.logo');
  
    video2.addEventListener('timeupdate', function() {
      //botoncito
      if (video2.currentTime >= 36 && video2.currentTime <= 40) {
        boton.style.display = 'block';
      }else{
        boton.style.display = 'none';
      }
      //icono
      if (video2.currentTime >= 17 && video2.currentTime < 24) {
        imagen.style.display = 'block';
      }else{
        imagen.style.display = 'none';
      }
    });
  });