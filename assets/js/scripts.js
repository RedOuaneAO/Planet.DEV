var goToSgin = document.getElementById("goToSgin");
var goToLogin = document.getElementById("goTologin");
var loginForm = document.getElementById("loginId");
var registerForm = document.getElementById("signId");

goToSgin.addEventListener("click",()=>{
    loginForm.style.display="none";
    registerForm.style.display="block";
})
goToLogin.addEventListener("click",()=>{
    loginForm.style.display="block";
    registerForm.style.display="none";
})


var newArticle = document.getElementById("nABtn");
var formInputs = document.getElementById("formInputs");

// newArticle.addEventListener("click",()=>{

//     formInputs.innerHTML='<input type="text" >'    // [<input>]
// })

function fillModal(id){
    let imageInput =document.getElementById("imageId");
    let cover = document.getElementById(id).querySelector(".article-cover").getElementById("coverId").getAttribute("src");
    imageInput.value=cover;
    let titleInput =document.getElementById("titleId");
    let title = document.getElementById(id).querySelector(".article-title").innerHTML;
    titleInput.value =title;
    let authorInput =document.getElementById("authorId");
    let author = document.getElementById(id).querySelector(".article-author").innerHTML;
    authorInput.value=author
    let contentInput =document.getElementById("contentId");
    let content = document.getElementById(id).querySelector(".article-content").innerHTML;
    contentInput.value=content;
    let categoriesInput =document.getElementById("categoriesId");
    let categories = document.getElementById(id).querySelector(".article-content").innerHTML;
    categoriesInput.value=categories;

    document.getElementById('addBtn').style.display = "none";
    document.getElementById('updateId').style.display = "inline";
}

// function resetForm(){
//     document.getElementById('formId').reset();
// }
function btnReset(){
    document.getElementById('addBtn').style.display = "inline";
    document.getElementById('updateId').style.display = "none";
}


