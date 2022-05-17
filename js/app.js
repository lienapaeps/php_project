// Liken van projecten
document.querySelector("a.like-project").addEventListener("click", (e) => {

        let projectId = e.target.dataset.project;
        let userId = e.target.dataset.user;
    
        console.log(projectId, " + " ,userId);
        
        let data = new FormData();
        data.append("projectId" = projectId);
        data.append("userId" = userId);
    
        fetch("/ajax/save_like.php", {
            method: "POST",
            body: data
        });

    console.log("Like ✅");

    console.log(e.target);

    
    // no refresh 
    e.preventDefault();
});

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
            console.log('Success:', data);
        })
        .catch((error) => {
            // console.error('Error:', error);
            let message = document.querySelector(".check-username");
            message.innerHTML = "Username already exists";
        });

    //Refresh vermijden
    e.preventDefault();

});