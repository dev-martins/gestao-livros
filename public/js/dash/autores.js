function autores() {
    var token = getCookie('token');
    axios.get(`/api/autor`, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(function (resp) {

            var autorRow = '';
            $.each(resp.data, function (index, autor) {


                autorRow += `
                <option value="${autor.CodAu}">${autor.Nome}</option>`;
            });


            $('#autor option').remove()
            $(autorRow).appendTo('#autor')
        })
        .catch(function (error) {
            runWaitMeClose(selectorLoad)
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

autores()
