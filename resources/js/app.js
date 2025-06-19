import "./bootstrap";
import "../scss/app.scss";
// import $ from 'jquery';
// import 'slick-carousel';

import { generateIgloosCarousel } from "./components/slick";

const deleteIglooModal = document.getElementById("deleteIglooModal");

generateIgloosCarousel();

document.addEventListener("DOMContentLoaded", function () {
    const deleteModal = document.getElementById("deleteModal");

    if (deleteModal) {
        deleteModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute("data-id");
            const name = button.getAttribute("data-name");
            const url = button.getAttribute("data-url");

            document.getElementById("itemIdInModal").textContent = id;
            document.getElementById("itemNameInModal").textContent = name;

            const form = document.getElementById("deleteForm");
            form.action = url;
        });
    }
});
