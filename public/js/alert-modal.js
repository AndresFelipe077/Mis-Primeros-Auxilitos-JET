Livewire.on('alert', function(message) {
    Swal.fire({
        title: message,
        width: 600,
        padding: '3em',
        color: '#008000',
        background: 'fff# url(/images/trees.png)',
        backdrop: `rgba(0,0,123,0.4) url("img/astro.jpg") left top no-repeat`
    })
})