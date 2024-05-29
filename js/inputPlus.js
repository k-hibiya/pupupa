"use strict";
function inputPlus(){
    const create = document.getElementById('create');
    const inputBox = document.getElementById('inputBox');
    if(create !== null){   
        create.addEventListener('click', () => {
            const span1 = document.querySelector('span.required');
            const span2 = document.querySelector('span.required');
            const required1 = span1.cloneNode(true);
            const required2 = span2.cloneNode(true);
            
            const newInput1 = document.createElement('input');
            newInput1.type = 'text';
            newInput1.name = 'kodomo_name[]';
            newInput1.setAttribute('required','');
            newInput1.id = 'kName';
        
            const newLabel1 = document.createElement('label');
            newLabel1.textContent = 'こどもの名前';
            newLabel1.id = 'kodomo_name';
            newLabel1.appendChild(required1);
            
        
            const newInput2 = document.createElement('input');
            newInput2.type = 'date';
            newInput2.name = 'birthday[]';
            newInput2.setAttribute('required','');
            newInput2.id = 'bDay';
        
            const newLabel2 = document.createElement('label');
            newLabel2.textContent = 'こどもの誕生日';
            newLabel2.appendChild(required2);
            
            const br1 = document.createElement('br');
            const br2 = document.createElement('br');
            /* const br3 = document.createElement('br');
            const br4 = document.createElement('br'); */

            const createBox = document.createElement('div');

            createBox.appendChild(newLabel1);
            // createBox.appendChild(br1);
            createBox.appendChild(newInput1);
            createBox.appendChild(br1);
            createBox.appendChild(newLabel2);
            // createBox.appendChild(br3);
            createBox.appendChild(newInput2);
            createBox.appendChild(br2);

            inputBox.appendChild(createBox);

        });
    }
}
function inputDel() {
    const inputBox = document.getElementById('inputBox');
    const del = document.getElementById("del");
    if(del !== null){
        del.addEventListener('click', () =>{
                inputBox.removeChild(inputBox.lastChild);
        });
    }
}
document.addEventListener("DOMContentLoaded", () =>{
        inputPlus();
        inputDel();
});
