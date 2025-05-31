import './bootstrap';
import 'bootstrap';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
import { Italian } from "flatpickr/dist/l10n/it.js";
import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

flatpickr.localize(Italian);

let checkInCalendar, checkOutCalendar;
let disabledDates = [];

function determinareStagione(date) {
    const data = date.toISOString().slice(5, 10);
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

const prezzi = {
    'Green Room': { bassa: 125, media: 160, alta: 185 },
    'Gray Room': { bassa: 125, media: 160, alta: 185 },
    'Pink Room': { bassa: 115, media: 150, alta: 175 }
};

function calculatePrice() {
    const checkIn = document.getElementById("check_in").value;
    const checkOut = document.getElementById("check_out").value;
    const room = document.getElementById("room_name").value;
    const guests = parseInt(document.getElementById("guests").value);
    const priceDisplay = document.getElementById("price_display");

    if (checkIn && checkOut && room && guests) {
        const date1 = flatpickr.parseDate(checkIn, "d-m-Y");
        const date2 = flatpickr.parseDate(checkOut, "d-m-Y");
        const nights = (date2 - date1) / (1000 * 60 * 60 * 24);

        if (nights > 0) {
            let totale = 0;
            for (let i = 0; i < nights; i++) {
                const currentDate = new Date(date1);
                currentDate.setDate(currentDate.getDate() + i);
                const stagione = determinareStagione(currentDate);
                let base = prezzi[room][stagione];
                if (room === 'Pink Room') {
                    if (guests === 1) base *= 0.90;
                } else {
                    if (guests === 1) base *= 0.90;
                    if (guests === 3) base += 50;
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

function loadFlatpickr(disabled = []) {
    if (checkInCalendar) checkInCalendar.destroy();
    if (checkOutCalendar) checkOutCalendar.destroy();

    const guests = parseInt(document.getElementById("guests").value) || 2;
    const room = document.getElementById("room_name").value;

    checkInCalendar = flatpickr("#check_in", {
        dateFormat: "d-m-Y",
        minDate: "today",
        disable: disabled,
        onChange: function (selectedDates) {
            calculatePrice();

            const checkInDate = selectedDates[0];

            checkOutCalendar.set("disable", [
                function (date) {
                    // Disabilita tutte le date prima del giorno successivo al check-in
                    const nextDay = new Date(checkInDate);
                    nextDay.setDate(nextDay.getDate() + 1);
                    return date < nextDay;
                },
                ...disabled.map(d => new Date(d))
            ]);

            checkOutCalendar.jumpToDate(checkInDate);
            checkOutCalendar.redraw();
        },
        onDayCreate: function (dObj, dStr, fp, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");
            const isDisabled = disabled.some(d => flatpickr.formatDate(new Date(d), "Y-m-d") === formatted);

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

    checkOutCalendar = flatpickr("#check_out", {
        dateFormat: "d-m-Y",
        minDate: "today", // Iniziale, poi modificata da sopra
        disable: disabled, // Iniziale, poi modificata da sopra
        onChange: calculatePrice,
        onDayCreate: function (dObj, dStr, fp, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");

            const isDisabled = disabled.some(d => flatpickr.formatDate(new Date(d), "Y-m-d") === formatted);

            const price = getDayPrice(room, date, guests);
            const priceElem = document.createElement("span");
            priceElem.classList.add("d-block", "small", "text-muted");
            priceElem.style.fontSize = "0.7em";
            priceElem.innerText = `${price.toFixed(0)}€`;
            dayElem.appendChild(priceElem);

            // evidenzia giorno di check-in (solo visivamente)
            const checkInInput = document.getElementById("check_in");
            const checkInDate = checkInInput._flatpickr?.selectedDates?.[0];
            if (checkInDate) {
                const checkInFormatted = flatpickr.formatDate(checkInDate, "Y-m-d");
                if (formatted === checkInFormatted) {
                    dayElem.classList.add("checkin-selected");
                    dayElem.style.pointerEvents = "none"; // visibile ma non cliccabile
                }
            }

            if (isDisabled) {
                dayElem.classList.add("flatpickr-disabled", "bg-dark", "text-white-50");
            }
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    const roomSelect = document.getElementById("room_name");
    const checkInInput = document.getElementById("check_in");
    const checkOutInput = document.getElementById("check_out");
    const guestsSelect = document.getElementById("guests");
    const priceDisplay = document.getElementById("price_display");

    checkInInput.disabled = true;
    checkOutInput.disabled = true;

    new Choices(roomSelect, {
        searchEnabled: false,
        itemSelectText: '',
        shouldSort: false
    });

    roomSelect.addEventListener("change", function () {
        const room = this.value;
        if (!room) return;

        checkInInput.disabled = false;
        checkOutInput.disabled = false;

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
    guestsSelect.addEventListener("change", calculatePrice);

    if (roomSelect.value) {
        roomSelect.dispatchEvent(new Event('change'));
    }
});
