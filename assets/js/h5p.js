/**
 * File h5p.js.
 *
 * Handles styles within H5P games.
 */
(() => {
    window.addEventListener("load", () => {
        document.querySelectorAll("iframe.h5p-iframe").forEach(iframe => {
            const innerDocument = iframe.contentWindow.document

            const link = document.createElement("link")
            link.href = "/wp-content/themes/klasse-wir-singen/style-h5p.css";
            link.rel = "stylesheet";
            link.type = "text/css";

            innerDocument.body.appendChild(link);
        })
    })
})()
