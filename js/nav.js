document.addEventListener("DOMContentLoaded",  () => {
    const url = location.href;
    const urlSplit = url.split('/');
    const x = urlSplit.length - 1;
    const moreSplit = urlSplit[x].split('.');
    const checker = moreSplit[0];
    const li = document.querySelectorAll("ul > li");
    for(let value of li) {
        const id = value.id;
        const li2 = document.getElementById(id);
        if(id == checker) {
            li2.style.borderBottom = "calc(var(--logX) * 5) solid rgb(220, 220, 30)"
        }
    }

    goBack();
});

function goBack() {
    const goBack = document.getElementById('goBack');
    goBack.addEventListener("click", () => {
        window.history.back();
    });
}
/* document.addEventListener("DOMContentLoaded", () => {
}); */