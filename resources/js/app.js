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
    'Grey Room': { bassa: 125, media: 160, alta: 185 },
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

function loadFlatpickr(disabledCheckin = [], disabledCheckout = []) {
    if (checkInCalendar) checkInCalendar.destroy();
    if (checkOutCalendar) checkOutCalendar.destroy();

    const guests = parseInt(document.getElementById("guests").value) || 2;
    const room = document.getElementById("room_name").value;

    checkInCalendar = flatpickr("#check_in", {
        dateFormat: "d-m-Y",
        minDate: "today",
        disable: disabledCheckin,
        onChange: function (selectedDates) {
            calculatePrice();

            const checkInDate = selectedDates[0];

            checkOutCalendar.set("disable", [
                function (date) {
                    const nextDay = new Date(checkInDate);
                    nextDay.setDate(nextDay.getDate() + 1);
                    return date < nextDay;
                },
                function (date) {
                    const formatted = flatpickr.formatDate(date, "Y-m-d");
                    return disabledCheckout.includes(formatted);
                }
            ]);

            checkOutCalendar.jumpToDate(checkInDate);
            checkOutCalendar.redraw();
        },
        onDayCreate: function (_, __, ___, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");
            if (disabledCheckin.includes(formatted)) {
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
        minDate: "today",
        disable: disabledCheckout,
        onChange: calculatePrice,
        onDayCreate: function (_, __, ___, dayElem) {
            const date = dayElem.dateObj;
            const formatted = flatpickr.formatDate(date, "Y-m-d");

            if (disabledCheckout.includes(formatted)) {
                dayElem.classList.add("flatpickr-disabled", "bg-dark", "text-white-50");
            }

            const price = getDayPrice(room, date, guests);
            const priceElem = document.createElement("span");
            priceElem.classList.add("d-block", "small", "text-muted");
            priceElem.style.fontSize = "0.7em";
            priceElem.innerText = `${price.toFixed(0)}€`;
            dayElem.appendChild(priceElem);

            // Evidenzia il giorno del check-in
            const checkInDate = document.getElementById("check_in")._flatpickr?.selectedDates?.[0];
            if (checkInDate && formatted === flatpickr.formatDate(checkInDate, "Y-m-d")) {
                dayElem.classList.add("checkin-selected");
                dayElem.style.pointerEvents = "none";
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

        Promise.all([
            fetch(`/api/booked-dates/${room}`).then(res => res.json()),
            fetch(`/api/external-booked-dates/${room}`).then(res => res.json())
        ])
            .then(([internalDates, externalDates]) => {
                const checkin = [...new Set([
                    ...(internalDates?.checkin ?? []),
                    ...(externalDates?.checkin ?? [])
                ])];

                const checkout = [...new Set([
                    ...(internalDates?.checkout ?? []),
                    ...(externalDates?.checkout ?? [])
                ])];

                disabledDates = { checkin, checkout };
                loadFlatpickr(checkin, checkout);
                calculatePrice();
            })
            .catch((e) => {
                console.error("Errore nel caricamento:", e);
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


// cookie banner
document.addEventListener('DOMContentLoaded', function () {
    const cookieTranslations = {
        it: {
            message: "Questo sito usa cookie per migliorare l’esperienza.",
            accept: "Accetta",
            reject: "Rifiuta",
            policy: "Leggi la Cookie Policy",
            modify: "Modifica preferenze cookie"
        },
        en: {
            message: "This website uses cookies to improve your experience.",
            accept: "Accept",
            reject: "Reject",
            policy: "Read the Cookie Policy",
            modify: "Change cookie preferences"
        },
        fr: {
            message: "Ce site utilise des cookies pour améliorer votre expérience.",
            accept: "Accepter",
            reject: "Refuser",
            policy: "Lire la politique de cookies",
            modify: "Modifier les préférences de cookies"
        },
        es: {
            message: "Este sitio utiliza cookies para mejorar la experiencia.",
            accept: "Aceptar",
            reject: "Rechazar",
            policy: "Leer la política de cookies",
            modify: "Cambiar preferencias de cookies"
        },
        de: {
            message: "Diese Website verwendet Cookies, um Ihr Erlebnis zu verbessern.",
            accept: "Akzeptieren",
            reject: "Ablehnen",
            policy: "Cookie-Richtlinie lesen",
            modify: "Cookie-Einstellungen ändern"
        }
    };

    const userLang = document.documentElement.lang.slice(0, 2);
    const t = cookieTranslations[userLang] || cookieTranslations.it;

    const banner = document.getElementById('cookie-banner');
    const text = document.getElementById('cookie-text');
    const acceptBtn = document.getElementById('accept-cookies');
    const rejectBtn = document.getElementById('reject-cookies');
    const policyLink = document.getElementById('cookie-policy-link');
    const modifyLink = document.getElementById('open-cookie-settings');

    if (text) text.innerHTML = `${t.message} <a href="/cookie-policy" id="cookie-policy-link" class="link-warning text-decoration-underline ms-1" target="_blank" rel="noopener noreferrer">${t.policy}</a>`;
    if (policyLink) policyLink.innerText = t.policy;
    if (acceptBtn) acceptBtn.innerText = t.accept;
    if (rejectBtn) rejectBtn.innerText = t.reject;
    if (modifyLink) modifyLink.innerText = t.modify;

    if (!localStorage.getItem('cookies_choice')) {
        banner?.classList.remove('d-none');
    } else if (localStorage.getItem('cookies_choice') === 'accepted') {
        activateGoogleAnalytics();
    }

    acceptBtn?.addEventListener('click', function () {
        localStorage.setItem('cookies_choice', 'accepted');
        banner?.classList.add('d-none');
        activateGoogleAnalytics();
    });

    rejectBtn?.addEventListener('click', function () {
        localStorage.setItem('cookies_choice', 'rejected');
        banner?.classList.add('d-none');
    });

    modifyLink?.addEventListener('click', function (e) {
        e.preventDefault();
        localStorage.removeItem('cookies_choice');
        location.reload();
    });

    function activateGoogleAnalytics() {
        const scriptGA = document.createElement('script');
        scriptGA.async = true;
        scriptGA.src = "https://www.googletagmanager.com/gtag/js?id=G-FDENTY89BW";
        document.head.appendChild(scriptGA);

        scriptGA.onload = function () {
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', 'G-FDENTY89BW');
        }
    }
});
