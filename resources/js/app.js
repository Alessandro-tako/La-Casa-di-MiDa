// Import Bootstrap, Flatpickr, Choices
import './bootstrap';
import 'bootstrap';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
import { Italian } from "flatpickr/dist/l10n/it.js";
import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

// 🇮🇹 Imposta la lingua italiana per Flatpickr
flatpickr.localize(Italian);

// Variabili globali per i calendari
let checkInCalendar, checkOutCalendar;
let disabledDates = [];

// 🗓️ Determina la stagione (alta, media, bassa) in base alla data
function determinareStagione(date) {
    const data = date.toISOString().slice(5, 10); // formato mm-dd

    const alta = [
        ["01-01", "01-06"], ["04-01", "04-10"], ["04-11", "04-30"],
        ["05-01", "05-31"], ["06-01", "06-30"], ["07-01", "07-31"],
        ["08-01", "08-25"], ["09-01", "09-30"], ["10-01", "10-20"],
        ["11-01", "11-03"], ["12-21", "12-31"]
    ];

    const media = [
        ["03-01", "03-31"], ["08-26", "08-31"], ["10-21", "10-31"]
    ];

    for (let [start, end] of alta) {
        if (data >= start && data <= end) return 'alta';
    }
    for (let [start, end] of media) {
        if (data >= start && data <= end) return 'media';
    }

    return 'bassa';
}

// 💰 Prezzi delle camere per stagione
const prezzi = {
    'Green Room': { bassa: 125, media: 160, alta: 185 },
    'Gray Room': { bassa: 125, media: 160, alta: 185 },
    'Pink Room': { bassa: 115, media: 150, alta: 175 }
};

// 🔄 Calcola il prezzo totale in base a date, stagione, camera, ospiti
function calculatePrice() {
    const checkIn = document.getElementById("check_in").value;
    const checkOut = document.getElementById("check_out").value;
    const room = document.getElementById("room_name").value;
    const guests = parseInt(document.getElementById("guests").value);
    const priceDisplay = document.getElementById("price_display");

    if (checkIn && checkOut && room && guests) {
        const date1 = new Date(checkIn);
        const date2 = new Date(checkOut);
        const nights = (date2 - date1) / (1000 * 60 * 60 * 24);

        if (nights > 0) {
            let totale = 0;

            for (let i = 0; i < nights; i++) {
                const currentDate = new Date(date1);
                currentDate.setDate(currentDate.getDate() + i);

                const stagione = determinareStagione(currentDate);
                let base = prezzi[room][stagione];

                // 👤 Aggiustamenti per numero ospiti
                if (room === 'Pink Room') {
                    if (guests === 1) base *= 0.90; // 10% sconto per singolo
                } else {
                    if (guests === 1) base *= 0.90;
                    if (guests === 3) base += 50; // supplemento 3° ospite
                }

                totale += base;
            }

            priceDisplay.innerHTML = `<span class="text-gold fw-semibold">${totale.toFixed(2)} €</span> <small class="text-muted">(${nights} notti)</small>`;
        } else {
            priceDisplay.innerHTML = `<span class="text-gold">—</span>`;
        }
    } else {
        priceDisplay.innerHTML = `<span class="text-gold">—</span>`;
    }
}

// 📅 Inizializza i calendari Check-in e Check-out con date disabilitate
function loadFlatpickr(disabled = []) {
    if (checkInCalendar) checkInCalendar.destroy();
    if (checkOutCalendar) checkOutCalendar.destroy();

    const guests = parseInt(document.getElementById("guests").value) || 2;
    const room = document.getElementById("room_name").value;

    checkInCalendar = flatpickr("#check_in", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: disabled,
        onChange: function (selectedDates, dateStr) {
            const checkInDate = new Date(dateStr);
            const minCheckoutDate = new Date(checkInDate);
            minCheckoutDate.setDate(minCheckoutDate.getDate() + 1);
            checkOutCalendar.set("minDate", minCheckoutDate);
            calculatePrice();
        },
        onDayCreate: function (dObj, dStr, fp, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");

            const isDisabled = disabled.some(d => {
                if (typeof d === 'string') return formatted === d;
                if (d instanceof Date) return flatpickr.formatDate(d, "Y-m-d") === formatted;
                return false;
            });

            if (isDisabled) {
                dayElem.classList.add("flatpickr-disabled", "bg-dark", "text-white-50");
                return;
            }

            const price = getDayPrice(room, date, guests);
            const priceElem = document.createElement("span");
            priceElem.classList.add("day-price");
            priceElem.innerText = `${price.toFixed(0)}€`;
            dayElem.appendChild(priceElem);

        }
    });

    checkOutCalendar = flatpickr("#check_out", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: disabled,
        onChange: calculatePrice,
        onDayCreate: function (dObj, dStr, fp, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");

            const isDisabled = disabled.some(d => {
                if (typeof d === 'string') return formatted === d;
                if (d instanceof Date) return flatpickr.formatDate(d, "Y-m-d") === formatted;
                return false;
            });

            if (isDisabled) {
                dayElem.classList.add("flatpickr-disabled", "bg-dark", "text-white-50");
                return;
            }

            const price = getDayPrice(room, date, guests);
            const priceElem = document.createElement("span");
            priceElem.classList.add("d-block", "small", "text-muted");
            priceElem.style.fontSize = "0.7em";
            priceElem.innerText = `${price.toFixed(0)}€`;
            dayElem.appendChild(priceElem);
        }
    });
}


// 🚀 Quando il DOM è pronto
document.addEventListener("DOMContentLoaded", function () {
    const roomSelect = document.getElementById("room_name");
    const checkInInput = document.getElementById("check_in");
    const checkOutInput = document.getElementById("check_out");
    const guestsSelect = document.getElementById("guests");
    const priceDisplay = document.getElementById("price_display");

    // ⛔ Disabilita campi finché non viene selezionata la camera
    checkInInput.disabled = true;
    checkOutInput.disabled = true;

    // 🎨 Inizializza la select delle camere con Choices.js
    new Choices(roomSelect, {
        searchEnabled: false,
        itemSelectText: '',
        shouldSort: false
    });

    // 🔁 Quando cambia la camera
    roomSelect.addEventListener("change", function () {
        const room = this.value;
        if (!room) return;

        // Abilita i campi
        checkInInput.disabled = false;
        checkOutInput.disabled = false;

        // 🔒 Blocca opzione "3 ospiti" se Pink Room
        [...guestsSelect.options].forEach(option => option.disabled = false);
        if (room === "Pink Room") {
            const option3 = [...guestsSelect.options].find(opt => opt.value === "3");
            if (option3) {
                option3.disabled = true;
                if (guestsSelect.value === "3") {
                    guestsSelect.value = "";
                }
            }
        }

        // Mostra caricamento
        priceDisplay.innerHTML = `<span class="text-muted">Caricamento disponibilità...</span>`;

        // 📡 Chiamata API per date già prenotate
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

    // 📆 Ricalcola prezzo al cambio date o ospiti
    checkInInput.addEventListener("change", calculatePrice);
    checkOutInput.addEventListener("change", calculatePrice);
    guestsSelect.addEventListener("change", calculatePrice);

    // 🟡 Se è già selezionata una camera all’avvio, triggera il caricamento
    if (roomSelect.value) {
        roomSelect.dispatchEvent(new Event('change'));
    }
});

function getDayPrice(room, date, guests = 2) {
    const stagione = determinareStagione(date);
    let base = prezzi[room][stagione];

    if (room === 'Pink Room') {
        if (guests === 1) base *= 0.90;
    } else {
        if (guests === 1) base *= 0.90;
        if (guests === 3) base += 50;
    }

    return base;
}
