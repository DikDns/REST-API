const KEY = `2459718a`;

let movie_list = document.querySelector("#movie-list");
let search_button = document.querySelector("#search-button");
let search_input = document.querySelector("#search-input");
let modal_body = document.querySelector(".modal-body");

search_input.addEventListener("keyup", function (e) {
  // Click Enter then go fetch it
  if (e.keyCode == 13) {
    e.preventDefault();
    search_button.click();
  }
});

search_button.addEventListener("click", function (e) {
  e.preventDefault();

  let search = search_input.value;

  search_button.innerHTML = showLoading();

  fetch(`http://www.omdbapi.com/?apikey=${KEY}&s=${search}`)
    .finally((loading) => (search_button.innerHTML = "Search"))
    .then((response) => response.json())
    .then((result) => {
      // Remove Last Data
      movie_list.innerHTML = "";
      //! Check the Movie Found Response from the API
      if (result.Response === "True") {
        // Put the Search Result in the Movie Variabel
        let movies = result.Search;
        // Itearate through them!
        movies.forEach((movie) => {
          movie_list.append(
            stringToHTML(`
              <div class="col-md-4">
                <div class="card mb-3">
                  <img src="${movie.Poster}" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">${movie.Title}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${movie.Year}</h6>
                    <a href="#" class="see-detail card-link" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${movie.imdbID}">See Detail</a>
                  </div>
                </div>
              </div>
            `)
          );
        });

        search_input.value = "";
      } else {
        movie_list.innerHTML = `<h1 class="text-center">${result.Error}</h1>`;
      }
    });
});

movie_list.addEventListener("click", function (e) {
  let element = e.target;

  //! See Detail Fetch
  if (element.classList.contains("see-detail")) {
    let id = element.dataset.id;
    modal_body.innerHTML = showLoading();
    fetch(`http://www.omdbapi.com/?apikey=${KEY}&i=${id}`)
      .finally((loading) => (modal_body.innerHTML = ""))
      .then((response) => response.json())
      .then((result) => {
        if (result.Response === "True") {
          modal_body.innerHTML = `
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <img src="${result.Poster}" class="img-fluid mx-auto d-block">
                </div>
                <div class="col-md-8 mb-3">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <h3>${result.Title}</h3>
                    </li>
                    <li class="list-group-item">
                      Released : ${result.Released}
                    </li>
                    <li class="list-group-item">
                      Genre : ${result.Genre}
                    </li>
                    <li class="list-group-item">
                      Director : ${result.Director}
                    </li>
                    <li class="list-group-item">
                      Actors : ${result.Actors}
                    </li>
                    <li class="list-group-item">
                      Plot : ${result.Plot}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          `;
        } else {
        }
      });
  }
});

function showLoading() {
  return `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`;
}
