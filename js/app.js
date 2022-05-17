<<<<<<< HEAD
// Liken van projecten
document.querySelector(".like-project").addEventListener("click", (e) => {
    console.log("Like ✅");

    e.preventDefault();
});

// register form validation
document.querySelector("#register__form").addEventListener("submit", (e) => {
    // data uitlezen
    let username = document.querySelector("#username").value;
    let email = document.querySelector("#email").value;
    let password = document.querySelector("#password").value;

    // via AJAX naar server sturen/posten
=======
// Comments
document.querySelector("#addComment").addEventListener("click", (e) => {
    let comment = document.querySelector("#comment").value;
    
>>>>>>> 34cb7f1f0c7f94bc8914c3da63f3db3c2821d667
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
