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
});

// Comments
document.querySelector("#addComment").addEventListener("click", (e) => {
    let comment = document.querySelector("#comment").value;
    
    let data = new FormData();
    data.append("comment", comment);

    fetch('./ajax/save_comment.php', {
        method: 'post', // or 'PUT'
        body: data,
    })
        .then(response => response.json())
        .then(data => {
            // console.log('Success:', data);
            if (data.status === "success") {
                //Add new comment to page
                console.log('Success:', data);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
});
