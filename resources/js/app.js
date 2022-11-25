import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const login = document.getElementById("login");
const password = document.getElementById("password");
const email = document.getElementById("email");
const username = document.getElementById("username");
const passwordConfirmation = document.getElementById("password_confirmation");

const inputs = [login, password, username];

const validateInput = (e) => {
    if (e.target.value.length > 3) {
        e.target.classList.remove("border-neutral-250");
        e.target.classList.remove("border-error");
        e.target.classList.add("border-green-650");
        e.target.nextSibling.nextSibling.classList.remove("hidden");
    } else {
        e.target.classList.add("border-neutral-250");
        e.target.classList.remove("border-green-650");
        e.target.nextSibling.nextSibling.classList.add("hidden");
    }
};

inputs.forEach(
    (el) => el !== null && el.addEventListener("keyup", (e) => validateInput(e))
);

if (email !== null) {
    email.addEventListener("keyup", (e) => {
        if (
            e.target.value.length > 5 &&
            e.target.value.includes("@") &&
            e.target.value.includes(".")
        ) {
            e.target.classList.remove("border-neutral-250");
            e.target.classList.add("border-green-650");
            e.target.classList.remove("border-error");
            e.target.nextSibling.nextSibling.classList.remove("hidden");
        } else {
            e.target.classList.add("border-neutral-250");
            e.target.classList.remove("border-green-650");
            e.target.nextSibling.nextSibling.classList.add("hidden");
        }
    });
}

if (passwordConfirmation !== null) {
    passwordConfirmation.addEventListener("keyup", (e) => {
        if (e.target.value === password.value) {
            e.target.classList.remove("border-neutral-250");
            e.target.classList.add("border-green-650");
            e.target.classList.remove("border-error");
            e.target.nextSibling.nextSibling.classList.remove("hidden");
        } else {
            e.target.classList.add("border-neutral-250");
            e.target.classList.remove("border-green-650");
            e.target.nextSibling.nextSibling.classList.add("hidden");
        }
    });
}
