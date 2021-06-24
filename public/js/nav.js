let page = document.querySelector(".head-title")

if (page.textContent === "NAILS -     Записаться\n") {
    let link = document.querySelector(".nav-create")
    link.classList.add("active")
    link.classList.add("bg-dark")
}
if (page.textContent === "NAILS -     Мои записи\n") {
    let link = document.querySelector(".nav-orders")
    link.classList.add("active")
    link.classList.add("bg-dark")
}
if (page.textContent === "NAILS -     Главная\n") {
    let link = document.querySelector(".nav-main")
    link.classList.add("active")
    link.classList.add("bg-dark")
}
