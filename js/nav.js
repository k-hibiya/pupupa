document.addEventListener("DOMContentLoaded",  () => {
    const url = location.href;
    let checker = "";
    if(location.href.includes('?')){
        const urlSplit = url.split('?');
        const x = urlSplit.length - 1;
        const moreSplit = urlSplit[x].split('=');
        const word = moreSplit[0];
        if(word == 'mypage'){
            checker = 'mypage';
        }else{
        const urlSplit = url.split('/');
        const x = urlSplit.length - 1;
        const moreSplit = urlSplit[x].split('.');
        checker = moreSplit[0];
        }
    }else{
        const urlSplit = url.split('/');
        const x = urlSplit.length - 1;
        const moreSplit = urlSplit[x].split('.');
        checker = moreSplit[0];
    }
    
    const li = document.querySelectorAll("ul > li");
    for(let value of li) {
        const id = value.id;
        const targetElement = document.getElementById(id);
        if(id == checker) {
            targetElement.style.borderBottom = "calc(var(--logX) * 5) solid rgb(220, 220, 30)"
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