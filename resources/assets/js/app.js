popSelect = function(elm, data) {
    $(elm).empty()

    if (data.length == 0) {
        $(elm).append($('<option>').text('--- Nenhum item encontrado ---').attr('value', '0'));
    };

    $.each(data, function(i, value) {
        $(elm).append($('<option>').text(value.name).attr('value', value.id));
    });
}

createHiddenInput = function(elm, name, value, id) {
    var input = $('<input>').attr('type', 'hidden').attr('name', name).attr('value', value);

    if (id != undefined) {
        input.attr('id', id);
    };

    elm.append(input)
}

$("a[rel='searchable']").on('click', function (e) {
    e.preventDefault()
    var searchBy = $(this).data('search');
    var elm = $('#' + searchBy);
    var addSearch = $('#add_' + searchBy)

    $('#' + searchBy + '_form').show()
    addSearch.addClass('btn-primary').removeClass('btn-danger').prop('disabled', true).text('Carregando...')

    $.getJSON('/searchable', {item: searchBy, search: elm.val()}).done(function(json) {
        popSelect('#apresentacao_' + searchBy, json.apresentacao)
        popSelect('#frequencia_' + searchBy, json.frequencia)
        popSelect('#via_' + searchBy, json.via)

        $('#medicamento_id').remove()
        createHiddenInput(elm.parent(), 'medicamento_id', json.medicamento_id, 'medicamento_id')

        addSearch.prop('disabled', false).text('Adicionar')
    })
    .fail(function(elm) {
        addSearch.removeClass('btn-primary').addClass('btn-danger').text('Tente novamente')
    })

});

$("#medicamento_form,#aplicacao_form").on('submit', function (e) {
    e.preventDefault();
    var medicamentoId = $("#medicamento_id").val()
    var medicamentoName =  $("#medicamento").val()
    var inputUsingKey = ["elemento", "apresentacao", "frequencia", "via", "quantidade", "condicao"]

    $.each($(this).serializeArray(), function(i, data) {
        var dataName = data.name

        if (inputUsingKey.indexOf(dataName) >= 0) {
            dataName += "[" + medicamentoId + "]"
        }

        createHiddenInput(
            $('.form-prescricao'),
            dataName,
            data.value
        );
    });

    var selectedList = $("#selectedList")
    selectedList.show()

    selectedList.append(
        $('<p>').html(
            '<a href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> ' +
            '<strong>' + medicamentoName + '</strong>: ' +
            'apresentação ' + $("#apresentacao_medicamento :selected").text() + ', ' +
            'frequência ' + $("#frequencia_medicamento :selected").text() + ', ' +
            'via ' + $("#via_medicamento :selected").text() + ', ' +
            'quantidade ' + $("#quantidade_medicamento").val()
        )
    )
});

$("#selectedList").on('click', 'p > a', function(e) {
    e.preventDefault()
    $(this).parent().remove()

    var selectedList = $("#selectedList")
    var isEmpty = !$.trim(selectedList.html())

    if (isEmpty) {
        selectedList.hide()
    }
});

