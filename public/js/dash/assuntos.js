function assuntos() {
    var token = getCookie('token');
    axios.get(`/api/assunto`, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(function (resp) {

            var assuntoRow = '';
            $.each(resp.data, function (index, assunto) {


                assuntoRow += `
                <option value="${assunto.CodAs}">${assunto.Descricao}</option>`;
            });


            $('#assunto option').remove()
            $(assuntoRow).appendTo('#assunto')
            $('#add-assunto option').remove()
            $(assuntoRow).appendTo('#add-assunto')
        })
        .catch(function (error) {
            runWaitMeClose(selectorLoad)
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3540', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

assuntos()
