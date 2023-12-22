function login() {
    // let token = localStorage.getItem('token');
    let email = $('#email').val();
    let password = $('#password').val();
    runWaitMe('card')
    axios.post(`/api/auth/login`, {
            "email": email,
            "password": password
        }, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        .then(function (resp) {
            runWaitMeClose('card')
            toast('Aguarde um momento!', '#198754', '#fff')
            // localStorage.setItem('token', resp.data.token);
            setCookie(resp.data.token)
            window.location.href = '/dash';
        })
        .catch(function (error) {
            runWaitMeClose('card')
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
        });
}

function logout() {
    var token = getCookie('token');
    runWaitMe('card')
    axios.get(`/api/auth/logout`, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(function (resp) {
            runWaitMeClose('card')
            toast('Aguarde um momento!', '#198754', '#fff')
            removeCookie('token')
            window.location.href = '/login';
        })
        .catch(function (error) {
            runWaitMeClose('card')
            if (error.response.data.message)
                toast(error.response.data.message, '#dc3545', '#fff')
            if (error.response.status == 401)
                window.location.href = '/login';
        });
}

function setCookie(token, timeHour = 1) {
    let expirationDate = new Date();
    expirationDate.setHours(expirationDate.getHours() + timeHour);
    document.cookie = 'token=' + token + '; path=/; expires=' + expirationDate.toUTCString();
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2)
        return parts.pop().split(';').shift();
}

function removeCookie(name) {
    document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}

$(document).on('click', '#login', function () {
    login()
})

$(document).on('click', '#logout', function () {
    logout()
})
