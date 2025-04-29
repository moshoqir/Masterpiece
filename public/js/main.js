/*  ---------------------------------------------------
  Template Name: Gym
  Description:  Gym Fitness HTML Template
  Author: Colorlib
  Author URI: https://colorlib.com
  Version: 1.0
  Created: Colorlib
---------------------------------------------------------  */

"use strict";

(function ($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    //Canvas Menu
    $(document).ready(function () {
        $(".canvas-open").on("click", function () {
            $(".offcanvas-menu-wrapper").addClass(
                "show-offcanvas-menu-wrapper"
            );
            $(".offcanvas-menu-overlay").addClass("active");
        });

        $(".canvas-close, .offcanvas-menu-overlay").on("click", function () {
            $(".offcanvas-menu-wrapper").removeClass(
                "show-offcanvas-menu-wrapper"
            );
            $(".offcanvas-menu-overlay").removeClass("active");
        });
    });

    // Search model
    $(".search-switch").on("click", function () {
        $(".search-model").fadeIn(400);
    });

    $(".search-close-switch").on("click", function () {
        $(".search-model").fadeOut(400, function () {
            $("#search-input").val("");
        });
    });

    //Masonary
    $(".gallery").masonry({
        itemSelector: ".gs-item",
        columnWidth: ".grid-sizer",
        gutter: 10,
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*------------------
        Carousel Slider
    --------------------*/
    var hero_s = $(".hs-slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
    });

    /*------------------
        Team Slider
    --------------------*/
    $(".ts-slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        dotsEach: 2,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            320: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });

    /*------------------
        Testimonial Slider
    --------------------*/
    $(".ts_slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Image Popup
    --------------------*/
    $(".image-popup").magnificPopup({
        type: "image",
    });

    /*------------------
        Video Popup
    --------------------*/
    $(".video-popup").magnificPopup({
        type: "iframe",
    });

    /*------------------
        Barfiller
    --------------------*/
    $("#bar1").barfiller({
        barColor: "#ffffff",
        duration: 2000,
    });
    $("#bar2").barfiller({
        barColor: "#ffffff",
        duration: 2000,
    });
    $("#bar3").barfiller({
        barColor: "#ffffff",
        duration: 2000,
    });

    $(".table-controls ul li").on("click", function () {
        var tsfilter = $(this).data("tsfilter");
        $(".table-controls ul li").removeClass("active");
        $(this).addClass("active");

        if (tsfilter == "all") {
            $(".class-timetable").removeClass("filtering");
            $(".ts-meta").removeClass("show");
        } else {
            $(".class-timetable").addClass("filtering");
        }
        $(".ts-meta").each(function () {
            $(this).removeClass("show");
            if ($(this).data("tsmeta") == tsfilter) {
                $(this).addClass("show");
            }
        });
    });

    /* Fixing the hover on nav lists  */
    document.addEventListener("DOMContentLoaded", function () {
        let currentUrl = window.location.href;
        document.querySelectorAll(".nav-menu ul li a").forEach((link) => {
            if (link.href === currentUrl) {
                link.parentElement.classList.add("active");
            } else {
                link.parentElement.classList.remove("active");
            }
        });
    });
})(jQuery);

//Fixing add to cart funcutionality

document.addEventListener("DOMContentLoaded", function () {
    // Get all "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll(".add-card");

    // Add click event listeners to all "Add to Cart" buttons
    addToCartButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Get product ID from data attribute
            const productId = this.getAttribute("data-product-id");

            // Call the addToCart function
            addToCart(productId, 1); // Assuming quantity of 1
        });
    });
});

// Function to send AJAX request to the Laravel controller
function addToCart(productId, quantity) {
    // Get CSRF token from meta tag
    const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token,
            Accept: "application/json",
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity,
        }),
    })
        .then((response) => {
            if (response.status === 401) {
                // User is not logged in
                showNotification("Login to shop!", "warning");
                throw new Error("User not authenticated");
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                // Update the cart counter in the header
                updateCartCounter(data.cartCount);

                // Show success notification
                showNotification("Item added to cart!", "success");
            } else {
                showNotification("Failed to add item to cart", "error");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            if (error.message !== "User not authenticated") {
                showNotification("An error occurred", "error");
            }
        });
}

// Function to update the cart counter display
function updateCartCounter(count) {
    const cartCounter = document.querySelector(".cart-counter");
    if (cartCounter) {
        cartCounter.textContent = count;
    }
}

// Function to show notifications
function showNotification(message, type) {
    const notification = document.createElement("div");
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    // Add some basic styling
    notification.style.position = "fixed";
    notification.style.top = "20px";
    notification.style.right = "20px";
    notification.style.padding = "10px 20px";
    notification.style.borderRadius = "4px";
    notification.style.zIndex = "1000";

    if (type === "success") {
        notification.style.backgroundColor = "#4CAF50";
        notification.style.color = "white";
    } else {
        notification.style.backgroundColor = "#F44336";
        notification.style.color = "white";
    }

    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
