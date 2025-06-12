<?php

return [
    'privacy_text' => <<<'HTML'
        <p><strong>Última actualización:</strong> 12 de junio de 2025</p>

        <h2>1. Responsable del tratamiento</h2>
        <p>El responsable del tratamiento es <strong>La Casa di MiDa de Damiano y Michela Bisceglie</strong>, con sede en Via Carlo Cattaneo 10, Roma. Para cualquier consulta relacionada con la privacidad, puede escribirnos a <a href="mailto:info@lacasadimida.it" class="link-gold">info@lacasadimida.it</a>.</p>

        <h2>2. Tipos de datos recopilados</h2>
        <p>Recopilamos las siguientes categorías de datos personales:</p>
        <ul>
            <li>Datos de identidad (nombre, apellidos)</li>
            <li>Datos de contacto (correo electrónico, dirección, teléfono)</li>
            <li>Datos de la reserva (habitación, fechas de check-in/check-out, número de huéspedes)</li>
            <li>Datos de pago (ID de cliente de Stripe, método de pago – <em>nunca los datos de la tarjeta</em>)</li>
            <li>Datos técnicos (dirección IP, user agent, idioma preferido)</li>
            <li>Datos de navegación y comportamiento a través de cookies</li>
        </ul>

        <h2>3. Finalidad del tratamiento</h2>
        <p>Los datos se tratan para los siguientes fines:</p>
        <ul>
            <li>Gestión de reservas y estancias</li>
            <li>Cumplimiento de obligaciones fiscales y contables</li>
            <li>Envío de comunicaciones antes o después de la estancia (confirmaciones, recordatorios, agradecimientos)</li>
            <li>Seguridad en los pagos mediante Stripe</li>
            <li>Análisis estadístico del tráfico (por ejemplo, Google Analytics)</li>
            <li>Comunicaciones promocionales, solo con consentimiento explícito</li>
        </ul>

        <h2>4. Base jurídica del tratamiento</h2>
        <p>Los datos se tratan en base a:</p>
        <ul>
            <li>Contrato (gestión de reservas)</li>
            <li>Obligación legal (facturación)</li>
            <li>Interés legítimo (mejora del servicio)</li>
            <li>Consentimiento (para finalidades opcionales como marketing o cookies no esenciales)</li>
        </ul>

        <h2>5. Conservación de los datos</h2>
        <p>Los datos personales se conservan durante el tiempo necesario para cumplir con las finalidades para las que fueron recopilados:</p>
        <ul>
            <li>Datos de reservas y facturación: hasta <strong>10 años</strong> por razones fiscales</li>
            <li>Los datos innecesarios se <strong>anonimizan</strong> o eliminan de forma segura entre 12 y 24 meses después del fin de la estancia</li>
        </ul>

        <h2>6. Derechos del interesado</h2>
        <p>En cualquier momento puedes ejercer los siguientes derechos:</p>
        <ul>
            <li>Acceso a tus datos</li>
            <li>Rectificación o actualización</li>
            <li>Supresión (derecho al olvido)</li>
            <li>Limitación u oposición al tratamiento</li>
            <li>Portabilidad de los datos</li>
            <li>Reclamar ante la autoridad de protección de datos</li>
        </ul>
        <p>Para ejercer tus derechos, escribe a <a href="mailto:info@lacasadimida.it" class="link-gold">info@lacasadimida.it</a>.</p>

        <h2>7. Seguridad</h2>
        <p>Tus datos están protegidos mediante medidas técnicas y organizativas adecuadas contra accesos no autorizados, pérdida, alteración o divulgación.</p>

        <h2>8. Cookies y servicios de terceros</h2>
        <p>Utilizamos cookies técnicas y de terceros (por ejemplo, Stripe, Google Analytics). Para más información, consulta nuestra <a href="/cookie-policy" class="link-gold">Política de Cookies</a>.</p>
    HTML,

    'cookie_text' => <<<'HTML'
        <p><strong>Última actualización:</strong> 12 de junio de 2025</p>

        <h2>1. ¿Qué son las cookies?</h2>
        <p>Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio web. Permiten que el sitio funcione correctamente o recopilan información sobre tu experiencia.</p>

        <h2>2. Tipos de cookies utilizadas</h2>
        <ul>
            <li><strong>Cookies técnicas:</strong> esenciales para el funcionamiento del sitio. No requieren consentimiento.</li>
            <li><strong>Cookies analíticas:</strong> nos ayudan a entender cómo interactúan los usuarios con el sitio (por ejemplo, Google Analytics). Se recopilan de forma anonimizada.</li>
            <li><strong>Cookies de terceros para perfilado:</strong> utilizadas por servicios como Stripe, Google Maps, etc., para funciones avanzadas. Requieren tu consentimiento.</li>
        </ul>

        <h2>3. Gestión del consentimiento</h2>
        <p>Al entrar en el sitio, se muestra un banner para gestionar el consentimiento de las cookies no esenciales. Puedes aceptar o rechazar libremente dichas cookies.</p>

        <h2>4. Modificar las preferencias</h2>
        <p>Puedes cambiar tu consentimiento en cualquier momento haciendo clic en <strong>"Modificar preferencias de cookies"</strong> en el pie de página o eliminando las cookies desde la configuración de tu navegador.</p>

        <h2>5. Detalles de cookies de terceros</h2>
        <ul>
            <li><strong>Stripe:</strong> para la gestión de pagos. <a href="https://stripe.com/es/privacy" target="_blank" class="link-gold">Leer la política de privacidad</a></li>
            <li><strong>Google Analytics:</strong> para estadísticas anónimas. <a href="https://policies.google.com/privacy?hl=es" target="_blank" class="link-gold">Leer la política de privacidad</a></li>
            <li><strong>Google Maps:</strong> para mostrar el mapa de la ubicación. <a href="https://policies.google.com/privacy?hl=es" target="_blank" class="link-gold">Leer la política de privacidad</a></li>
        </ul>
    HTML,
];
