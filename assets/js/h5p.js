/**
 * File h5p.js.
 *
 * Handles styles within H5P games.
 */
(() => {
    window.addEventListener("load", () => {
        document.querySelectorAll("iframe.h5p-iframe").forEach(iframe => {
            const innerDocument = iframe.contentWindow.document

            const content = innerDocument.querySelector(".h5p-content")
            const title = iframe.getAttribute("title")
            content.classList.add(slugify(title))

            const link = document.createElement("link")
            link.href = "/wp-content/themes/klasse-wir-singen/style-h5p.css";
            link.rel = "stylesheet";
            link.type = "text/css";

            innerDocument.head.appendChild(link);
        })
    })
})()

function slugify(text) {
    return text.toString()
        .toLowerCase()
        .replace(/\s+/g, '-')     // Replace spaces with -
        .replace(/[^\w\-]+/g, '') // Remove all non-word chars
        .replace(/--+/g, '-')     // Replace multiple - with single -
        .replace(/^-+/, '')       // Trim - from start of text
        .replace(/-+$/, '');      // Trim - from end of text
}