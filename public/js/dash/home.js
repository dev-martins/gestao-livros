// function destroyCompany(target) {
//     let companyId = $(target).data('companyid');
//     let token = $('#token').val();
//     $(target).text('Aguarde...')
//     $(target).addClass('disabled')

//     runWaitMe('table')
//     axios.post(`/api/livro`, {}, {
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json',
//                 'Authorization': 'Bearer ' + token
//             }
//         })
//         .then(function (resp) {
//             runWaitMeClose('table')
//             $(target).text('Desativar')
//             $(target).css('display', 'none')
//             $(target).removeClass('disabled')
//             $(target).siblings('.restoreCompany').css('display', 'inline-block')
//             allCompanies()
//             toast(resp.data.message, '#198754', '#fff')
//         })
//         .catch(function (error) {
//             $(target).text('Desativar')
//             $(target).removeClass('disabled')
//             runWaitMeClose('table')
//             toast(error.response.data.message, '#dc3545', '#fff')
//             if (error.response.status == 401 ||
//                 error.response.data.message == 'Expired token' ||
//                 error.response.data.message == 'Token Inválido')
//                 $('#logout').trigger('click');
//         });
// }
