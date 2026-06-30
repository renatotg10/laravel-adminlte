import { OverlayScrollbars } from "overlayscrollbars";
import "admin-lte/dist/js/adminlte.js";

document.addEventListener("DOMContentLoaded", () => {
    const sidebarWrapper = document.querySelector(".sidebar-wrapper");

    if (sidebarWrapper) {
        OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: "os-theme-light",
                autoHide: "leave",
                clickScroll: true,
            },
        });
    }
});