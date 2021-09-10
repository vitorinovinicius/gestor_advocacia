$('.add_cliente').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: 'Verifique os dados antes de confirmar!',
        text: 'Confirme se todos os dados estão corretos.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#50CB93',
        cancelButtonColor: '#BD4B4B',
        confirmButtonText: 'Sim, cadastrar!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.value) {
            Swal.fire(
            'Cadastrado!',
            'O cliente foi cadastrado!',
            'success'
        )
            this.submit();
        }
    })
});
