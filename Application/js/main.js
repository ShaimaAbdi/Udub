// main.js

document.addEventListener("DOMContentLoaded", function() {
    // Check for the active link and highlight it
    const currentPage = window.location.pathname.split("/").pop();
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        const linkHref = link.getAttribute('href');
        if (linkHref === currentPage) {
            link.parentElement.classList.add('active');
        }
    });

    // Get the current page's ID
    const pageId = document.body.getAttribute("data-page-id");

    if (pageId) {
        // Construct the path to the corresponding JavaScript file
        const scriptPath = `js/${pageId}.js`;

        // Create a script element
        const scriptElement = document.createElement("script");
        scriptElement.src = scriptPath;

        // Append the script element to the document head
        document.head.appendChild(scriptElement);
    }
});
