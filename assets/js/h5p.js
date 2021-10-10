/**
 * File h5p.js.
 *
 * Handles styles within H5P games.
 */
(() => {
    window.addEventListener("load", () => {
        document.querySelectorAll("iframe.h5p-iframe").forEach(iframe => {
            const innerDocument = iframe.contentWindow.document
            innerDocument.querySelectorAll(".h5p-content, .h5p-dragquestion").forEach(element => {
                element.style.backgroundColor = "transparent"
                element.style.border = "0"
            })
            innerDocument.querySelectorAll(".h5p-joubelui-button").forEach(element => {
                element.style.backgroundColor = "#529d32"
                element.style.borderRadius = "8px"
                element.style.transition = "background 0.1s ease"
                element.onmouseover = () => {
                    element.style.backgroundColor = "#00adef";
                }
                element.onmouseout = () => {
                    element.style.backgroundColor = "#529d32";
                }
            })
            innerDocument.querySelectorAll(".h5p-question-content > .h5p-inner").forEach(element => {
                element.style.position = "relative"
                element.style.borderRadius = "16px"
                element.style.boxShadow = "inset 8px 8px 8px 0 rgba(255, 255, 255, 0.25), inset -8px -8px 8px 0 rgba(3, 27, 47, 0.2)"
            })
        })
    })
})()
