<script type="text/javascript">


    $('.corredoresItem').select2({
        placeholder: 'Selecione um corredor',
        ajax: {
            url: '/corredores-select2',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.nome,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
    });
</script>

