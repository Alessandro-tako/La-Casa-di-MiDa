import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
import { Italian } from "flatpickr/dist/l10n/it.js";
import Choices from "choices.js";
import "choices.js/public/assets/styles/choices.min.css";

flatpickr.localize(Italian);

let checkInCalendar, checkOutCalendar;
let disabledDates = [];

const prezzi = {
    'Green Room': { bassa: 120, media: 145, alta: 170 },
    'Grey Room': { bassa: 120, media: 145, alta: 170 },
    'Pink Room': { bassa: 110, media: 135, alta: 160 }
};

function determinareStagione(date) {
    const data = date.toISOString().slice(5, 10);
    const alta = [
        ["01-01", "01-06"], ["04-01", "04-10"], ["04-11", "04-30"],
        ["05-01", "05-31"], ["06-01", "06-30"], ["07-01", "07-31"],
        ["08-01", "08-25"], ["09-01", "09-30"], ["10-01", "10-20"],
        ["11-01", "11-03"], ["12-21", "12-31"]
    ];
    const media = [["03-01", "03-31"], ["08-26", "08-31"], ["10-21", "10-31"]];
    for (let [start, end] of alta) {
        if (data >= start && data <= end) return 'alta';
    }
    for (let [start, end] of media) {
        if (data >= start && data <= end) return 'media';
    }
    return 'bassa';
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
                totale += getDayPrice(room, currentDate, guests);
            }
            priceDisplay.innerHTML = `<span class="text-gold fw-semibold">${totale.toFixed(2)} €</span> <small class="text-muted">(${nights} notti)</small>`;
        } else {
            priceDisplay.innerHTML = `<span class="text-gold">—</span>`;
        }
    } else {
        priceDisplay.innerHTML = `<span class="text-gold">—</span>`;
    }
}

function loadFlatpickr(disabled = []) {
    console.log("Date disabilitate:", disabled);
    if (checkInCalendar) checkInCalendar.destroy();
    if (checkOutCalendar) checkOutCalendar.destroy();

    const room = document.getElementById("room_name").value;
    const guests = parseInt(document.getElementById("guests").value) || 2;

    checkInCalendar = flatpickr("#check_in", {
        dateFormat: "d-m-Y",
        disable: disabled,
        minDate: "today",
        onChange: function (selectedDates) {
            const checkInDate = selectedDates[0];
            checkOutCalendar.set("disable", [
                date => date <= checkInDate,
                ...disabled.map(d => new Date(d))
            ]);
            calculatePrice();
        },
        onDayCreate: function (_, __, ___, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");
            const isDisabled = disabled.includes(formatted);

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
        disable: disabled,
        minDate: "today",
        onChange: calculatePrice,
        onDayCreate: function (_, __, ___, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");
            const isDisabled = disabled.includes(formatted);

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

document.addEventListener("DOMContentLoaded", function () {
    const room = document.getElementById("room_name").value;
    const guests = document.getElementById("guests").value;

    fetch(`/api/booked-dates/${room}`)
        .then(res => res.json())
        .then(data => {
            disabledDates = data;
            loadFlatpickr(disabledDates);
            calculatePrice();
        });

    document.getElementById("room_name").addEventListener("change", function () {
        const newRoom = this.value;
        fetch(`/api/booked-dates/${newRoom}`)
            .then(res => res.json())
            .then(data => {
                disabledDates = data;
                loadFlatpickr(disabledDates);
                calculatePrice();
            });
    });

    document.getElementById("room_name").dispatchEvent(new Event("change"));
    document.getElementById("guests").addEventListener("change", calculatePrice);
    document.getElementById("check_in").addEventListener("change", calculatePrice);
    document.getElementById("check_out").addEventListener("change", calculatePrice);
});
