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
function fillModal(id){
    document.getElementById('bookId').value = id;
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
function btnReset(){
    document.getElementById('formId').reset();
    document.getElementById('addBtn').style.display = "inline";
    document.getElementById('updateId').style.display = "none";
}
function addNewForm(){
    var modal=`<div>
    <!-- for update -->
    <input type="text" name="id" id="articleId" hidden><br>
    <!-- for update -->
    <label for="">Title</label><br>
    <input type="text" name="title[]" class="form-control" id="titleId" data-parsley-minlength="25" required><br>
    <label for="">Author</label><br>
    <input type="text" name="author[]" class="form-control" id="authorId" value=""><br>
    <label for="">Categories</label><br>
    <select name="categories[]" id="categoriesId" class="form-control">
        <option value="1">cloud</option>
        <option value="2">web development</option>
        <option value="3">applications</option>
    </select>  <br>  
    <label>image</label><br>
    <input type="file" name="image[]" id="imageId" accept=".jpg , .png , .jpeg"><br>
    <label>Content</label><br>
    <textarea name="content[]" class="form-control" id ="contentId"  cols="30" rows="10"></textarea>
</div><hr>`
$("#newArt").append(modal);
}
