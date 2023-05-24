const animeList = document.getElementById('anime-list');

window.onload = () => {
  fetchAnimeList();
};

function fetchAnimeList() {
  const apiUrl = 'https://api.jikan.moe/v4/characters?sfw&order_by="favorites"&limit=20';
  
  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      let html = "";
      
      if (data.data) {
        data.data.forEach(data => {
          html += `
          <div  data-id = "${data.mal_id}">
          <div class="card">
          <div class="card__inner">
            <div class="card__face">
                      <div class = "anime_img">
                      <a href = "${data.url}" class = "get-anime" target="_blank"><img src = "${data.images.jpg.image_url}" alt = "anime"></a>
                      </div>
                      <div class = "anime_name">
                      <a href = "${data.url}" class = "get-anime" target="_blank"><h3>${data.name}</h3></a>
                      </div>
            </div>
          </div>
        </div>
      </div>
          `;
        });
        
        animeList.classList.remove('notFound');
      } else {
        html = "We didn't find any anime.";
        animeList.classList.add('notFound');
      }
      
      animeList.innerHTML = html;
    })
    .catch(error => {
      console.error('Error:', error);
      animeList.innerHTML = "An error occurred while fetching the anime list.";
      animeList.classList.add('notFound');
    });
}