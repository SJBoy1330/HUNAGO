function get_kategori(property, tipe) {
    const base_tipe = document.querySelector(".base_tipe");
    const dis_notif = document.querySelectorAll("#parenting_tipe .zoom-filter");
    const vector_video = document.querySelector("#vector_video");
    base_tipe.querySelector(".active").classList.remove("active");
    property.querySelector(".tipe").classList.add("active");
    dis_notif.forEach((div) => {
        let display_value = div.getAttribute("data-tipe");
        if ((display_value == 'kategori-' + tipe) || (tipe == "all")) {
            div.classList.remove("hiding");
            div.classList.add("showing");
        } else {
            div.classList.add("hiding");
            div.classList.remove("showing");
        }
    });

    const tampil = document.querySelectorAll(".zoom-filter.showing");
    if (tampil.length == 0) {
        vector_video.classList.remove("hiding");
        vector_video.classList.add("showing");
    } else {
        vector_video.classList.add("hiding");
        vector_video.classList.remove("showing");
    }

}