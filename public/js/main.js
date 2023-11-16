const hambuger = document.getElementById("hambuger");
const mobileNav = document.getElementById("mobile-nav");
const closeNav = document.getElementById("close-nav");
hambuger.addEventListener("click", () => {
    mobileNav.style.left = "0";
});
closeNav.addEventListener("click", () => {
    mobileNav.style.left = "-100%";
});
$(document).ready(function () {
    $("#filter").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                $("#list-products").html(response);
            },
        });
    });
});
const showPassword = document.getElementById("showPassword");
const passwordInput = document.querySelectorAll(".input-password");
showPassword.addEventListener("change", () => {
    passwordInput.forEach((input) => {
        input.type = input.type == "password" ? "text" : "password";
    });
});
