<script type="text/javascript">
    let selectValue = $('.provasItem').select2({
        placeholder: 'Selecione uma prova',
        ajax: {
            url: '/provas-select2',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.tipo_prova + 'km' + ' - ' + item.data,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
    })
</script>