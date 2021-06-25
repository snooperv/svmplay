let page = document.querySelector(".head-title")

function addClasses(className){
    let link = document.querySelector(className)
    link.classList.add("active")
    link.classList.add("bg-dark")
}

if (page.textContent === "NAILS -     Записаться\n") {
    addClasses(".nav-create")
}
if (page.textContent === "NAILS -     Мои записи\n") {
    addClasses(".nav-orders")
}
if (page.textContent === "NAILS -     Главная\n") {
    addClasses(".nav-main")
}
if (page.textContent === "NAILS -     Контакты\n") {
    addClasses(".nav-contacts")
}
