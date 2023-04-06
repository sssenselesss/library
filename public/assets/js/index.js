const AttachFile = () =>{
    const parent = document.querySelector('.admin-menu__addBook');
    if(!parent) return false

    const AttachFile = parent.querySelector('.attach-file');
    const AttachFileInput = parent.querySelector('.input-file');

    AttachFile.addEventListener('click',()=>{
        AttachFileInput.click();
    })

    const AttachFile2 = parent.querySelector('.file-path');
    const AttachFileInput2 = parent.querySelector('.file-path__input');

    AttachFile2.addEventListener('click',()=>{
        AttachFileInput2.click();
    })
}

const init = () =>{
    AttachFile();
}

document.addEventListener('DOMContentLoaded',init)
