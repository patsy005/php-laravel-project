document.addEventListener("DOMContentLoaded", () => {
    // pobranie danych json z serwera
    fetch(window.routes.igloosJson) // Adres pliku PHP
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            console.log(data);
            generateIgloosCarousel(data); // generowanie karuzeli
        })
        .catch((error) => console.error("Error fetching igloos:", error));
});

// generowanie karuzeli z igloo
 export function generateIgloosCarousel(igloos) {
    if (!Array.isArray(igloos)) {
        console.error("⛔ igloos nie jest tablicą:", igloos);
        return;
    }

    const carousel = document.querySelector(".popular-igloos");

    igloos.forEach((igloo) => {
        const iglooDiv = document.createElement("div");
        iglooDiv.className = "igloo";
        iglooDiv.setAttribute("id", igloo.id);
        iglooDiv.innerHTML = `
          <div class="igloo-img">
              <img src="images/igloos/${igloo.image}" alt="${igloo.name}" />
          </div>
          <div class="igloo-info">
              <p>${igloo.name}</p>
              <p>Capacity: <span>${igloo.capacity}</span></p>
          </div>
      `;

        iglooDiv.addEventListener("click", () => {
            window.location.href = `../igloos/iglooItem.php?id=${igloo.id}`;
        });

        carousel.appendChild(iglooDiv);
    });

    // Inicjalizacja Slick Carousel
    $(carousel).slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        centerMode: true,
        initialSlide: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    centerMode: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                },
            },
        ],
    });
}
