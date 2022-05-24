<<<<<<< HEAD
<<<<<<< HEAD
// Liken van projecten
document.querySelector("a.like-project").addEventListener("click", (e) => {
=======
// Liken van projecten op de project pagina zelf
document.querySelector(".like-project").addEventListener("click", (e) => {
    let likeBtn = document.querySelector('#like');
    let likeCount = document.querySelector('#likeBtnSpan');

    if(likeBtn.classList.contains('btn-pink-outline')) {
        console.log("click");
>>>>>>> dc8fa2b3fa5084b12e3db57d5a024f1ea38361b7

        let projectId = e.target.dataset.project;
        let userId = e.target.dataset.user;
        // console.log(userId);
        // console.log(projectId);

        let data = new FormData();
        data.append("projectId", projectId);
        data.append("userId", userId);
        // console.log(data);

        fetch("ajax/save_like.php", {
            method: "POST",
            body: data
            })
            .then(response => response.json())
            .then(result => {
                console.log("success: " + result);
                if(result.status == "success") {
                    likeBtn.classList.remove("btn-pink-outline");
                    likeBtn.classList.add("btn-pink");
                    likeCount.textContent = result.amount;
                }
            })
            .catch((err) => {
                console.log(err);
            });
    }
    else {
        console.log("delete like");

        let projectId = e.target.dataset.project;
        let userId = e.target.dataset.user;

        let data = new FormData();
        data.append("projectId", projectId);
        data.append("userId", userId);

        fetch("ajax/delete_like.php", {
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(result => {
            console.log("success: " + result);
            if(result.status == "success") {
                console.log("like deleted");
                likeBtn.classList.add("btn-pink-outline");
                likeBtn.classList.remove("btn-pink");
                likeCount.textContent = result.amount;
            }
        })
        .catch((err) => {
            console.log(err);
        });
    }
    
    // no refresh 
    e.preventDefault();
});

if(document.querySelector("#register__form")) {
    // register form validation
    document.querySelector("#register__form").addEventListener("submit", (e) => {
        // data uitlezen
        let username = document.querySelector("#username").value;
        let email = document.querySelector("#email").value;
        let password = document.querySelector("#password").value;

        // via AJAX naar server sturen/posten
    });
}

<<<<<<< HEAD
// Comments
document.querySelector("#addComment").addEventListener("click", (e) => {
    let comment = document.querySelector("#comment").value;
=======
// // Comments
// document.querySelector("#addComment").addEventListener("click", (e) => {
//     let comment = document.querySelector("#comment").value;
//     let userId = e.target.dataset.user;
//     let projectId = e.target.dataset.project;

//     console.log("clicked");
>>>>>>> liena
    
//     let data = new FormData();
//     data.append("comment", comment);

//     fetch('./ajax/save_comment.php', {
//         method: 'post', // or 'PUT'
//         body: data,
//     })
//         .then(response => response.json())
//         .then(data => {
//             // console.log('Success:', data);
//             if (data.status === "success") {
//                 //Add new comment to page
//                 console.log('Success:', data);
//             }
//         })
//         .catch((error) => {
//             console.error('Error:', error);
//         });
// });
=======
if(document.querySelector("#addComment")) {
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
}
>>>>>>> dc8fa2b3fa5084b12e3db57d5a024f1ea38361b7
