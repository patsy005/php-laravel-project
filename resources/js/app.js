import "./bootstrap";
import "../scss/app.scss";
// import $ from 'jquery';
// import 'slick-carousel';

import { generateIgloosCarousel } from "./components/slick";

const deleteIglooModal = document.getElementById("deleteIglooModal");

generateIgloosCarousel();

deleteIglooModal.addEventListener("show.bs.modal", (e) => {
    const button = e.relatedTarget;
    const iglooId = button.getAttribute("data-id");
    const iglooName = button.getAttribute("data-name");

    document.getElementById("iglooNameInModal").textContent = iglooName;
    document.getElementById("iglooIdInModal").textContent = iglooId;

    const form = document.getElementById("deleteIglooForm");
    form.action = `/igloos/${iglooId}`;
});
