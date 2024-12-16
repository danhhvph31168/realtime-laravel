import "./bootstrap";

Echo.private('notification').listen('UserSessionChanged', (e) => {
    const notElement = document.getElementById('notification');

    notElement.innerText = e.message;

    notElement.classList.remove('invisible');
    notElement.classList.remove('alert-success');
    notElement.classList.remove('alert-danger');
    notElement.classList.add('alert-'+e.type);
});
