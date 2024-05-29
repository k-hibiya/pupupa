"use-strict"
{
let closeButton;
let thisAnimation;
function preSet() {
    const serchButton = document.getElementById("serchButton");
    const serchImg = serchButton.firstElementChild.firstElementChild;
    const serchP = serchButton.firstElementChild.nextSibling;
    serchButton.addEventListener("click", e => {
        serchButton.classList.toggle('active');
        if(serchButton.classList.contains('active')){
            serchImg.src = 'images/serchoff.svg';
            serchP.innerHTML = '閉じる';
            formBox.style.display = "block";
            formBox.style.zIndex = "2";
            popupForm(e);
        }else{
            serchImg.src = 'images/serch.svg';
            serchP.innerHTML = '検索する';
            closeForm(e);
            setTimeout(displayNone, 300);
        }
    });
}
function popupForm(e) {
    //formList.style.setProperty("display", "block");
    thisAnimation = formBox.animate(
        [
            {
                opacity:"0",
            },
            {
                opacity:"1",
            },
        ],
        {
            duration:300,
            easing:"ease-in",
            fill:"forwards",
        }
    );
}
function closeForm(e) {
    //formList.style.setProperty("display", "block");
    thisAnimation = formBox.animate(
        [
            {
                opacity:"1",
            },
            {
                opacity:"0",
            },
        ],
        {
            duration:300,
            easing:"ease-in",
            fill:"forwards",
        }
    );
}
function displayNone() {
    formBox.style.display = "none";
}
document.addEventListener("DOMContentLoaded", () =>{
    const formBox= document.getElementById("formBox");
    preSet();
});
}