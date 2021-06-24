let navs = document.querySelectorAll(".nav-main");
for (let i = 0; i < navs.length; i++){
    console.log(navs[i])
    navs[i].onclick = function (){

        if(!navs[i].classList.contains("active")){
            navs[i].classList.add("active");
            navs[i].classList.add("bg-dark");
        }
    }
}
