document.getElementById('btnabrir').addEventListener(
    'click', function(){
        document.getElementsByClassName
        ('fondo_transparente')[0].style.display="block"
        return false;
})

document.getElementsByClassName('modal_cerrar')[0].
    addEventListener('click', function(){
        document.getElementsByClassName
        ('fondo_transparente')[0].style.display="none";
    })