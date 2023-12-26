function livrosComAutoresAssuntos() {
    var token = getCookie('token');
    let selectorLoad = 'table';
    runWaitMe(selectorLoad)
    axios.get(`/api/livro`, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(function (resp) {
            runWaitMeClose(selectorLoad)

            var livroRow = '';
            $.each(resp.data, function (index, livro) {
                var autores = livro.autores;
                var assuntos = livro.assuntos;

                var nomesAutores = Array.isArray(autores) ? autores.map(function (autor) {
                    return autor.Nome;
                }).join(', ') : '';

                var descricaoAs = Array.isArray(assuntos) ? assuntos.map(function (assunto) {
                    return assunto.Descricao;
                }).join(', ') : '';

                livroRow += `
        <tr>
            <td id="t-titulo">${livro.Titulo}</td>
            <td id="t-editora">${livro.Editora}</td>
            <td id="t-edicao">${livro.Edicao}</td>
            <td id="t-ano-publicacao">${livro.AnoPublicacao}</td>
            <td id="t-nome-autores">${nomesAutores}</td>
            <td id="t-descricao">${descricaoAs}</td>
            <td class="td-buttons">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-codladd="${livro.CodL}" data-toggle="modal" data-target="#modal-adicionar">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-warning" data-codledit="${livro.CodL}" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-codlremove="${livro.CodL}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
            });


            $('table tbody tr').remove()
            $(livroRow).appendTo('table tbody')
        })
        .catch(function (error) {
            runWaitMeClose(selectorLoad)
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

function addLivrosComAutoresAssuntos(data) {
    let token = getCookie('token');
    let selectorLoad = 'table';

    runWaitMe(selectorLoad)
    axios.post(`/api/livro`,
            data, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token
                }
            })
        .then(function (resp) {
            runWaitMeClose(selectorLoad)
            livrosComAutoresAssuntos()
        })
        .catch(function (error) {
            runWaitMeClose(selectorLoad)
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

function editLivrosComAutoresAssuntos(data, id) {
    let token = getCookie('token');
    let selectorLoad = 'table';
    console.log(data)
    runWaitMe(selectorLoad)
    axios.put(`/api/livro/${id}`,
            data, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token
                }
            })
        .then(function (resp) {
            runWaitMeClose(selectorLoad)
            livrosComAutoresAssuntos()
        })
        .catch(function (error) {
            runWaitMeClose(selectorLoad)
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

function removerLivros(id) {
    let token = getCookie('token');
    let selectorLoad = 'table';

    runWaitMe(selectorLoad)

    axios.delete(`/api/livro/${id}`, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(function (resp) {
            runWaitMeClose(selectorLoad)
            livrosComAutoresAssuntos()
        })
        .catch(function (error) {
            runWaitMeClose(selectorLoad)
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

function selecionarOpcoes(selectId, valores) {
    var valoresArray = valores.split(',').map(function (item) {
        return item.trim();
    });

    $('#' + selectId + ' option').each(function () {
        var optionValue = $(this).val();

        if (valoresArray.includes(optionValue)) {
            $(this).prop('selected', true);
        } else {
            $(this).prop('selected', false);
        }
    });
}

function capitalizeWords(input) {
    return input.replace(/(?:^|\s|-)(\S)/g, function (match, group) {
        return group.toUpperCase();
    });
}

$(document).on('click', '.btn-warning', function () {
    var tr = $(this).closest('tr');
    var tds = tr.find('td');
    var id = $(this).data('codledit')

    $('#salvar').attr('data-codleditsalvar', id);

    $('#titulo').val(tds[0].textContent);
    $('#editora').val(tds[1].textContent);
    $('#ano-publicacao').val(tds[3].textContent);
    $('#edicao').val(tds[2].textContent);
    selecionarOpcoes('autores', tds[4].textContent);

    selecionarOpcoes('assuntos', tds[5].textContent);
})

// selecionar todos os dados do formulário
$(document).on('click', '#salvar', function () {
    var formulario = $('#form-edit');

    var valores = {};

    formulario.find(':input').each(function () {
        var input = $(this);
        var nome = capitalizeWords(input.attr('name'));
        var tipo = input.attr('type');

        if (tipo === 'select-multiple') {
            var valoresSelecionados = input.val() || [];

            valores[nome] = valoresSelecionados;
        } else {
            valores[nome] = input.val();
        }
    });
    var id = $('#salvar').data('codleditsalvar');
    editLivrosComAutoresAssuntos(valores, id)
});

$(document).on('click', '#add-salvar', function () {
    var formulario = $('#form-add');

    var valores = {};

    formulario.find(':input').each(function () {
        var input = $(this);
        var nome = capitalizeWords(input.attr('name'));
        var tipo = input.attr('type');

        if (tipo === 'select-multiple') {
            var valoresSelecionados = input.val() || [];

            valores[nome] = valoresSelecionados;
        } else {
            valores[nome] = input.val();
        }
    });
    addLivrosComAutoresAssuntos(valores)
});

$(document).on('click', '[data-codlremove]', function () {
    var id = $(this).data('codlremove')
    removerLivros(id)
})

livrosComAutoresAssuntos()
