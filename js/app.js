// register form validation
document.querySelector("#register__form").addEventListener("submit", (e) => {
    // data uitlezen
    let username = document.querySelector("#username").value;
    let email = document.querySelector("#email").value;
    let password = document.querySelector("#password").value;

    // via AJAX naar server sturen/posten
    let data = new FormData();
    data.append("username", username);
    data.append("email", email);
    data.append("password", password);

    fetch('./ajax/save_user.php', {
        method: 'POST', // or 'PUT'
        body: data,
    })
        .then(response => response.json())
        .then(data => {
            // console.log('Success:', data);
            if (data.status === "success") {
                console.log('Success:', data);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });

    //Refresh vermijden
    e.preventDefault();

});