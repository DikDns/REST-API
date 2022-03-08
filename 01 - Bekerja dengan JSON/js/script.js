let daftar_menu = document.querySelector("#daftar-menu");
let navbar_nav = document.querySelector(".navbar-nav");

let stringToHTML = function(str){
	let parser = new DOMParser();
	let doc = parser.parseFromString(str, 'text/html');
	return doc.body.childNodes[0];
};

let priceFormat = function(price){
    price = price.toString();
    if(price.length <= 6){
        let dot_index_1 = price.length - 3;
        price = price.slice(0, dot_index_1) + "." + price.slice(dot_index_1);
    } else if (price.length <= 12){
        let dot_index_1 = price.length - 3;
        let dot_index_2 = price.length - 6;
        price = price.slice(0, dot_index_2) + "." + price.slice(dot_index_2, dot_index_1) + "." + price.slice(dot_index_1);
    }

    price += ",00-";
    return price;
}

//! NAV-LINK ON CLICK
navbar_nav.addEventListener("click", function(e){
    // Remove Class Active from every nav-link
    for(let i = 0; i < (navbar_nav.children.length); i++){
        navbar_nav.children[i].classList.remove("active");
    }
    // Add Class Active to the clicked element
    e.target.classList.add("active")
    // Kategori Variabel
    let kategori =  e.target.innerText;
    // Ubah Tampilan Judul sesuai Kategori
    document.querySelector("h1").innerHTML = kategori;

    // IF KATEGORI == All Menu
    if(kategori  == "All Menu"){
        daftar_menu.innerHTML = '';
        showAllMenu();
        return;
    }

    // Fetch LAGI
    fetch("data/pizza.json")
    .then(response => response.json())
    .then(response => {
        let menu = response.menu;
        let content = ``;
        // Looping Menu
        menu.forEach(value => {
            if(value.kategori == kategori.toLowerCase()){
                content += `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="img/menu/${value.gambar}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">${value.nama}</h5>
                                <p class="card-text">${value.deskripsi}</p>
                                <h5 class="card-title mb-2">Rp. ${priceFormat(value.harga)}</h5>
                                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                `
            }
        });

        // Insert the Contents
        daftar_menu.innerHTML = content;
    });
});

//! Show All Menu
function showAllMenu(){
    fetch("data/pizza.json")
    .then(response => response.json())
    .then(response => {
        let menu = response.menu;
        menu.forEach((value) => {
            daftar_menu.append(stringToHTML(
                `
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="img/menu/${value.gambar}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">${value.nama}</h5>
                            <p class="card-text">${value.deskripsi}</p>
                            <h5 class="card-title mb-2">Rp. ${priceFormat(value.harga)}</h5>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                `
            ));
        });
    });
}

showAllMenu();