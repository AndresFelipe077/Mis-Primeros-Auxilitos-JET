// var switchCheck = document.getElementById('check');
// //var switchCheck = $('#check');

$($('#check')).on('change', function () {
    if ($(this).is(':checked')) {

        $('#music').prop('muted', false)

        console.log($(this).is(':checked'));
    } else {
        if ($('#music'.muted == false)) {
            $('#music').prop('muted', true)
        }
        console.log($(this).is(':checked'));
    }
});
    // if($('#check'.checked)){
        // $('#check').on('click', () =>
        //     $('#music').prop('muted', (_, muted) => !muted)
        // );
    //     console.log("True")
    // }
    // else
    // {
    //     if($('#music'.muted == false))
    //     {
    //         $('#music'.muted == true)
    //     }
    //     console.log("False")
    // }
// function mute() {
//     var aud = document.getElementById("music");
//     var check = switchCheck.checked;
    // if (check) {
    //     aud.muted = false;//Se escucha
    //     console.log(check)
    //     ajax();
    // }
    // else {
    //     if (aud.muted == false) {
    //         aud.muted = true;//No se escucha
    //     }
    //     console.log(check)
    // }
// }

// function ajax() {
//     const http = new XMLHttpRequest();
//     const url = 'http://localhost:8000/dashboard/ajustes';

//     http.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);

//         }
//     }

//     http.open("GET", url);
//     http.send();

// }