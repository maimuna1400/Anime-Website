const animeList = document.getElementById('animeTitle');



    const searchFieldElement = document.getElementById("searchAnime");
    document.getElementById("get_anime").onclick = (event) => {
        searchAnime(searchFieldElement.value);
    };


function searchAnime(query) {
    const url = `https://api.jikan.moe/v4/anime?q=${query}&sfw&limit=16`;
    fetch(url)

        .then(response => response.json())
        .then(data => {

            console.log(data)

            let html = "";

            if (data.data) {

                data.data.forEach(data => {
                    html += `
                    <div  data-id = "${data.mal_id}">
                        <div class="card">
		                    <div class="card__inner">
			                    <div class="card__face">
                                    <div class = "anime_img">
                                        <img src = "${data.images.jpg.large_image_url}" alt = "anime">
                                    </div>
                                    <div class = "anime_name">
                                        <a href = "${data.url}" class = "get-anime" target="_blank"><h3>${data.title}</h3></a>
                                    </div>
			                    </div>
		                    </div>
	                    </div>
                    </div>
                `;
                });

                console.log(data);
                
                animeList.classList.remove('notFound');
            }
            else {

                html = "we didn't find any anime";

                animeList.classList.add('notFound');
            }
            animeList.innerHTML = html;
        });
}