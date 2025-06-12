<?php

return [
    'privacy_text' => <<<'HTML'
        <p><strong>Dernière mise à jour :</strong> 12 juin 2025</p>

        <h2>1. Responsable du traitement</h2>
        <p>Le responsable du traitement est <strong>La Casa di MiDa de Damiano et Michela Bisceglie</strong>, situé à Via Carlo Cattaneo 10, Rome, Italie. Pour toute demande relative à la vie privée, vous pouvez nous contacter à l’adresse <a href="mailto:info@lacasadimida.it" class="link-gold">info@lacasadimida.it</a>.</p>

        <h2>2. Types de données collectées</h2>
        <p>Nous collectons les catégories de données personnelles suivantes :</p>
        <ul>
            <li>Données personnelles (nom, prénom)</li>
            <li>Coordonnées (email, adresse, numéro de téléphone)</li>
            <li>Détails de la réservation (chambre, dates d’arrivée/départ, nombre de personnes)</li>
            <li>Données de paiement (identifiant client Stripe, méthode de paiement – <em>jamais les données de la carte</em>)</li>
            <li>Données techniques (adresse IP, user agent, langue préférée)</li>
            <li>Données de navigation et de comportement via les cookies</li>
        </ul>

        <h2>3. Finalités du traitement</h2>
        <p>Les données sont traitées pour les finalités suivantes :</p>
        <ul>
            <li>Gestion des réservations et des séjours</li>
            <li>Respect des obligations fiscales et comptables</li>
            <li>Envoi de communications avant/après le séjour (ex. : confirmations, rappels, remerciements)</li>
            <li>Sécurité des paiements via Stripe</li>
            <li>Analyse statistique du trafic (ex. : Google Analytics)</li>
            <li>Communications promotionnelles, uniquement avec consentement explicite</li>
        </ul>

        <h2>4. Base légale du traitement</h2>
        <p>Les données sont traitées sur la base de :</p>
        <ul>
            <li>Contrat (gestion des réservations)</li>
            <li>Obligations légales (facturation)</li>
            <li>Intérêt légitime (amélioration du service)</li>
            <li>Consentement (pour des finalités facultatives comme le marketing ou les cookies non techniques)</li>
        </ul>

        <h2>5. Durée de conservation</h2>
        <p>Les données personnelles sont conservées aussi longtemps que nécessaire pour atteindre les objectifs pour lesquels elles ont été collectées :</p>
        <ul>
            <li>Données liées aux réservations et à la facturation : jusqu’à <strong>10 ans</strong> pour raisons fiscales</li>
            <li>Les données non nécessaires sont <strong>anonymisées</strong> ou supprimées de manière sécurisée entre 12 et 24 mois après la fin du séjour</li>
        </ul>

        <h2>6. Droits de la personne concernée</h2>
        <p>Vous pouvez exercer à tout moment les droits suivants :</p>
        <ul>
            <li>Accès à vos données</li>
            <li>Rectification ou mise à jour</li>
            <li>Suppression (droit à l’oubli)</li>
            <li>Limitation ou opposition au traitement</li>
            <li>Portabilité des données</li>
            <li>Réclamation auprès de l’autorité de protection des données</li>
        </ul>
        <p>Pour exercer vos droits, contactez-nous à <a href="mailto:info@lacasadimida.it" class="link-gold">info@lacasadimida.it</a>.</p>

        <h2>7. Sécurité</h2>
        <p>Vos données sont protégées par des mesures techniques et organisationnelles adéquates contre tout accès non autorisé, perte, altération ou divulgation.</p>

        <h2>8. Cookies et services tiers</h2>
        <p>Nous utilisons des cookies techniques et des cookies tiers (ex. : Stripe, Google Analytics). Pour plus d’informations, consultez notre <a href="/cookie-policy" class="link-gold">Politique de cookies</a>.</p>
    HTML,

    'cookie_text' => <<<'HTML'
        <p><strong>Dernière mise à jour :</strong> 12 juin 2025</p>

        <h2>1. Que sont les cookies ?</h2>
        <p>Les cookies sont de petits fichiers texte enregistrés sur votre appareil lorsque vous visitez un site web. Ils permettent au site de fonctionner correctement ou de collecter des informations sur votre expérience.</p>

        <h2>2. Types de cookies utilisés</h2>
        <ul>
            <li><strong>Cookies techniques :</strong> essentiels au bon fonctionnement du site. Ne nécessitent pas de consentement.</li>
            <li><strong>Cookies analytiques :</strong> nous aident à comprendre comment les utilisateurs interagissent avec le site (ex. : Google Analytics). Les données sont collectées de manière anonymisée.</li>
            <li><strong>Cookies de profilage tiers :</strong> utilisés par des services tels que Stripe, Google Maps, etc., pour fournir des fonctionnalités avancées. Nécessitent votre consentement.</li>
        </ul>

        <h2>3. Gestion du consentement</h2>
        <p>Lors de votre première visite sur le site, une bannière s’affiche pour vous permettre de gérer le consentement aux cookies non essentiels. Vous pouvez accepter ou refuser ces cookies librement.</p>

        <h2>4. Modifier vos préférences</h2>
        <p>Vous pouvez modifier vos préférences à tout moment en cliquant sur <strong>« Modifier les préférences de cookies »</strong> dans le pied de page du site ou en supprimant les cookies via les paramètres de votre navigateur.</p>

        <h2>5. Détails sur les cookies tiers</h2>
        <ul>
            <li><strong>Stripe :</strong> pour le traitement des paiements. <a href="https://stripe.com/fr/privacy" target="_blank" class="link-gold">Lire la politique de confidentialité</a></li>
            <li><strong>Google Analytics :</strong> pour des statistiques anonymes. <a href="https://policies.google.com/privacy?hl=fr" target="_blank" class="link-gold">Lire la politique de confidentialité</a></li>
            <li><strong>Google Maps :</strong> pour afficher la carte de l’établissement. <a href="https://policies.google.com/privacy?hl=fr" target="_blank" class="link-gold">Lire la politique de confidentialité</a></li>
        </ul>
    HTML,
];
