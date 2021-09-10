$('.atualizar_cliente').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: 'Tem certeza que deseja atualizar os dados?',
        text: 'Os dados do cliente será atualizado!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#50CB93',
        cancelButtonColor: '#BD4B4B',
        confirmButtonText: 'Sim, atualizar!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.value) {
            Swal.fire(
            'Atualizado!',
            'O processo foi atualizado!',
            'success'
        )
            this.submit();
        }
    })
});
