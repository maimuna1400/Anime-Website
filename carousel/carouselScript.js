// script.js
const animeSlider = document.getElementById('anime-slider');

window.onload = () => {
  fetchAnimeSlider();
};

function fetchAnimeSlider() {
  const apiUrl = 'https://api.jikan.moe/v4/top/anime?sfw&limit=10';

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      let html = '';

      if (data.data) {
        data.data.forEach(anime => {
          html += `
              <div class="anime-card">
                <div class="anime-image">
                <a href = "${anime.url}" class = "get-anime" target="_blank"><img src="${anime.images.jpg.large_image_url}" alt="Anime Poster"></a>
                </div>
              </div>
          `;
        });

        animeSlider.classList.remove('notFound');
      } else {
        html = 'We didn\'t find any anime.';
        animeSlider.classList.add('notFound');
      }

      animeSlider.innerHTML = html;

      // Initialize Slick Carousel
      $('.slick-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        // prevArrow: '<button type="button" class="slick-prev"><</button>',
        // nextArrow: '<button type="button" class="slick-next">></button>',
      });
    })
    .catch(error => {
      console.error('Error:', error);
      animeSlider.innerHTML = 'An error occurred while fetching the anime list.';
      animeSlider.classList.add('notFound');
    });
}
