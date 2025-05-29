import './bootstrap';
import 'bootstrap';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
import { Italian } from "flatpickr/dist/l10n/it.js";

import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

// Imposta localizzazione italiana
flatpickr.localize(Italian);

let checkInCalendar, checkOutCalendar;
let disabledDates = [];

function calculatePrice() {
    const checkIn = document.getElementById("check_in").value;
    const checkOut = document.getElementById("check_out").value;
    const room = document.getElementById("room_name").value;
    const priceDisplay = document.getElementById("price_display");

    if (checkIn && checkOut && room) {
        const date1 = new Date(checkIn);
        const date2 = new Date(checkOut);
        const nights = (date2 - date1) / (1000 * 60 * 60 * 24);

        if (nights > 0) {
            let pricePerNight = {
                'Green Room': 120,
                'Pink Room': 110,
                'Gray Room': 115
            }[room] || 100;

            const total = (pricePerNight * nights).toFixed(2);
            priceDisplay.innerHTML = `<span class="text-gold fw-semibold">${total} €</span> <small class="text-muted">(${nights} notti x ${pricePerNight}€)</small>`;
        } else {
            priceDisplay.innerHTML = `<span class="text-gold">—</span>`;
        }
    } else {
        priceDisplay.innerHTML = `<span class="text-gold">—</span>`;
    }
}

function loadFlatpickr(disabled = []) {
    if (checkInCalendar) checkInCalendar.destroy();
    if (checkOutCalendar) checkOutCalendar.destroy();

    checkInCalendar = flatpickr("#check_in", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: disabled,
        onChange: function (selectedDates, dateStr) {
            checkOutCalendar.set("minDate", dateStr);
            calculatePrice();
        }
    });

    checkOutCalendar = flatpickr("#check_out", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: disabled,
        onChange: calculatePrice
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const roomSelect = document.getElementById("room_name");
    const checkInInput = document.getElementById("check_in");
    const checkOutInput = document.getElementById("check_out");
    const priceDisplay = document.getElementById("price_display");

    checkInInput.disabled = true;
    checkOutInput.disabled = true;

    new Choices(roomSelect, {
        searchEnabled: false,
        itemSelectText: '',
        placeholderValue: 'Seleziona una camera',
    });

    roomSelect.addEventListener("change", function () {
        const room = this.value;
        if (!room) return;

        checkInInput.disabled = false;
        checkOutInput.disabled = false;

        // Indicatore caricamento
        priceDisplay.innerHTML = `<span class="text-muted">Caricamento disponibilità...</span>`;

        fetch(`/api/booked-dates/${room}`)
            .then(res => res.json())
            .then(data => {
                disabledDates = data;
                loadFlatpickr(disabledDates);
                calculatePrice();
            })
            .catch(() => {
                priceDisplay.innerHTML = `<span class="text-danger">Errore nel caricamento delle date</span>`;
            });
    });

    checkInInput.addEventListener("change", calculatePrice);
    checkOutInput.addEventListener("change", calculatePrice);
});
