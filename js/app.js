// // Comments
// document.querySelector("#addComment").addEventListener("click", (e) => {
//     let comment = document.querySelector("#comment").value;
//     let userId = e.target.dataset.user;
//     let projectId = e.target.dataset.project;

//     console.log("clicked");
    
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
