$('.desvincular_servico').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: 'Tem certeza que deseja desvincular?',
        text: 'O serviço será desvinculado do cliente!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#50CB93',
        cancelButtonColor: '#BD4B4B',
        confirmButtonText: 'Sim, desvincular!',
        cancelButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.value) {
            Swal.fire(
            'Desvinculado!',
            'O serviço foi desvinculado!',
            'success'
        )
            this.submit();
        }
    })
});
