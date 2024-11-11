   
   
   //#region REGISTRATION PAGE
   let firstName = document.getElementById("firstName");
    let lastName = document.getElementById("lastName");
    let mail = document.getElementById("email");
    let password = document.getElementById("pass");
    let passwordCheck = document.getElementById("passCheck");


    const nameRegEx = /^[A-Z][a-z]*(([,.] |[ '-])[A-Za-z][a-z]*)*(\.?)$/;
    const mailRegEx = /^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const passRegEx = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    let emailError = document.getElementById("emailError");
    let passError = document.getElementById("passError");
    let passCheckError = document.getElementById("passCheckError");


    let firstNameErrorMessage = "Please enter Your name.";
    let firstNameErrorFormat = "Name should start with a capital letter and only contain letters.";
    let lastNameErrorMessage = "Please enter Your last name.";
    let lastNameErrorFormat = "Last name should start with a capital letter and only contain letters.";
    let emailErrorMessage = "Please enter an email.";
    let emailFormatErrorMessage = "Email must be in the following format: 'example@anymail.com'.";
    let passErrorMessage = "Please enter a password.";
    let passErrorFormat = "Password must contain at least 8 characters including at least one letter and one number.";
    let passCheckErrorMessage = "Please re-enter Your password.";
    let passCheckErrorFormat = "Passwords do not match.";




    $("#firstName").focus(function () {
        firstName.classList.remove("error");
        firstNameError.textContent = '';

    });
    $("#firstName").blur(function () {
        if (firstName.value == ""){
            firstName.classList.add("error");
            firstNameError.textContent = firstNameErrorMessage;
        }
        else if(!(nameRegEx.test(firstName.value))){
            firstName.classList.add("error");
            firstNameError.textContent = firstNameErrorFormat;
        }
        else {
            firstName.classList.remove("error");
            firstNameError.textContent = '';
        }
    });

    $("#lastName").focus(function () {
        lastName.classList.remove("error");
        lastNameError.textContent = '';
    });
    $("#lastName").blur(function () {
        if (lastName.value == ""){
            lastName.classList.add("error");
            lastNameError.textContent = lastNameErrorMessage;
        }
        else if(!(nameRegEx.test(lastName.value))){
            lastName.classList.add("error");
            lastNameError.textContent = lastNameErrorFormat;
        }
        else {
            lastName.classList.remove("error");
            lastNameError.textContent = '';
        }
    });

    $("#email").focus(function () {
        mail.classList.remove("error");
        emailError.textContent = '';
    });
    $("#email").blur(function () {
        var mailCheck = document.getElementById("email").value;
        if(mailCheck == ""){
            mail.classList.add("error");
            emailError.textContent = emailErrorMessage;
        }
        else if(!(mailRegEx.test(mailCheck))) {
            mail.classList.add("error");
            emailError.textContent = emailFormatErrorMessage;
        }
        else {
            $("#emailError").text('');
            mail.classList.remove("error");
            emailError.textContent = '';
        }
    });

    $("#pass").focus(function () {
        passwordCheck.classList.remove("error");
        passCheckError.textContent = '';
        password.classList.remove("error");
        passError.textContent = '';
    });
    $("#pass").blur(function () {
        if (password.value == ""){
            password.classList.add("error");
            passError.textContent = passErrorMessage;
        }
        else if(!(passRegEx.test(password.value))){
            password.classList.add("error");
            passError.textContent = passErrorFormat;
        }
        else {
            password.classList.remove("error");
            passError.textContent = '';
        }
    });

    $("#passCheck").focus(function () {
        passwordCheck.classList.remove("error");
        passCheckError.textContent = '';
    });
    $("#passCheck").blur(function () {
        if (passwordCheck.value == ""){
            passwordCheck.classList.add("error");
            passCheckError.textContent = passCheckErrorMessage;
        }
        else if(passwordCheck.value != password.value){
            passwordCheck.classList.add("error");
            passCheckError.textContent = passCheckErrorFormat;
        }
        else {
            passwordCheck.classList.remove("error");
            passCheckError.textContent = '';
        }
    });

    function resetForms() {
        document.forms['regForm'].reset();
    }

$("#regSubmit").click(function(){
    event.preventDefault();
    if(firstName.value == ""){
        firstName.classList.add("error");
        firstNameError.textContent = firstNameErrorMessage;
    }
    else if(!(nameRegEx.test(firstName.value))){
        firstName.classList.add("error");
        firstNameError.textContent = firstNameErrorFormat;
    }
    if(lastName.value == ""){
        lastName.classList.add("error");
        lastNameError.textContent = lastNameErrorMessage;
    }
    else if(!(nameRegEx.test(lastName.value))){
        lastName.classList.add("error");
        lastNameError.textContent = lastNameErrorFormat;
    }
    if(mail.value == ""){
        mail.classList.add("error");
        emailError.textContent = emailErrorMessage;
    }
    else if(!mailRegEx.test(mail.value)){
        mail.classList.add("error");
        emailError.textContent = emailFormatErrorMessage;
    }
    else {
        mail.classList.remove("error");
        emailError.textContent = '';
    }
    if (password.value == ""){
        password.classList.add("error");
        passError.textContent = passErrorMessage;
    }
    else if(!(passRegEx.test(password.value))){
        password.classList.add("error");
        passError.textContent = passErrorFormat;
    }
    else {
        password.classList.remove("error");
        passError.textContent = '';
    }
    if (passwordCheck.value == ""){
        passwordCheck.classList.add("error");
        passCheckError.textContent = passCheckErrorMessage;
    }
    else if(passwordCheck.value != password.value){
        passwordCheck.classList.add("error");
        passCheckError.textContent = passCheckErrorFormat;
    }
    else {
        passwordCheck.classList.remove("error");
        passCheckError.textContent = '';
    }


    if(mailRegEx.test(mail.value) && firstName.value != "" && lastName.value != "" && nameRegEx.test(firstName.value) && nameRegEx.test(lastName.value) && passRegEx.test(password.value) && (passwordCheck.value == password.value)){
        let draftData = {
            firstName: firstName.value,
            lastName: lastName.value,
            email: mail.value,
            password: password.value,
            passwordCheck: passwordCheck.value
        }

        $.ajax({
            url: "obrada/obradaRegistracije.php",
            method: "POST",
            data: draftData,
            dataType: "json",
            success: function(result){
                $("#response").show();
                $("#response").html(`<p class='alert alert-success my-3'>${result.reply}</p>`);
                resetForms();
            },
            error: function(xhr){
                if(xhr.status == 500){
                    $("#response").html(`<p class='alert alert-info my-3'>${xhr.responseJSON.reply}</p>`);
                    $("#response").show();
                    setTimeout(function() { $("#response"). fadeOut(); }, 4000);
                }
                if(xhr.status == 404){
                    $("#response").html(`<p class='alert alert-danger my-3'>${xhr.responseJSON.reply}</p>`);
                    $("#response").show();
                    setTimeout(function() { $("#response"). fadeOut(); }, 4000);
                }
                if(xhr.status == 503){
                    $("#response").html(`<p class='alert alert-danger my-3'>${xhr.responseJSON.reply}</p>`);
                    $("#response").show();
                    setTimeout(function() { $("#response"). fadeOut(); }, 4000);
                }
            }
        })
    }
});

//#endregion

    let loginEmail = document.getElementById("loginEmail");
    let loginPassword = document.getElementById("loginPass");
    let loginEmailError = document.getElementById("loginEmailError");
    let loginPassError = document.getElementById("loginPassError");

    $("#loginEmail").focus(function () {
        loginEmail.classList.remove("error");
        loginEmailError.textContent = '';
    });
    $("#loginEmail").blur(function () {
        if(loginEmail.value == ""){
            loginEmail.classList.add("error");
            loginEmailError.textContent = emailErrorMessage;
        }
        else if(!(mailRegEx.test(loginEmail.value))) {
            loginEmail.classList.add("error");
            loginEmailError.textContent = emailFormatErrorMessage;
        }
        else{
            loginEmail.classList.remove("error");
            loginEmailError.textContent = '';
        }
    });

    $("#loginPass").focus(function () {
        loginPassword.classList.remove("error");
        loginPassError.textContent = '';
    });
    $("#loginPass").blur(function () {
        if (loginPassword.value == ""){
            loginPassword.classList.add("error");
            loginPassError.textContent = passErrorMessage;
        }
        else if(!(passRegEx.test(loginPassword.value))){
            loginPassword.classList.add("error");
            loginPassError.textContent = passErrorFormat;
        }
        else {
            loginPassword.classList.remove("error");
            loginPassError.textContent = '';
        }
    });

    $("#btnLogin").click(function(){    


        if(loginEmail.value == ""){
            loginEmail.classList.add("error");
            loginEmailError.textContent = emailErrorMessage;
        }
        else if(!mailRegEx.test(loginEmail.value)){
            loginEmail.classList.add("error");
            loginEmailError.textContent = emailFormatErrorMessage;
        }
        else {
            loginEmail.classList.remove("error");
            loginEmailError.textContent = '';
        }
        if (loginPassword.value == ""){
            loginPassword.classList.add("error");
            loginPassError.textContent = passErrorMessage;
        }
        else if(!(passRegEx.test(loginPassword.value))){
            loginPassword.classList.add("error");
            loginPassError.textContent = passErrorFormat;
        }
        else {
            loginPassword.classList.remove("error");
            loginPassError.textContent = '';
        }
        
        if(loginEmail.value !="" && mailRegEx.test(loginEmail.value) && loginPassword.value != "" && passRegEx.test(loginPassword.value)){
            let draftData = {
                username: loginEmail.value,
                password: loginPassword.value
            }
     
            $.ajax({
                url: "obrada/obradaLogovanja.php",
                method: "POST",
                data: draftData,
                dataType: "json",
                success: function(result){
                    window.location.replace(result.reply);
                    console.log(result.reply);
                },
                error: function(xhr){
                    console.log(xhr);
                    if(xhr.status == 500){
                        console.log("Error je ovde");
                        $("#response").html(`<p class='alert alert-info my-3'>${xhr.responseText.reply}</p>`);
                        $("#response").show();
                        setTimeout(function() { $("#response"). fadeOut(); }, 4000);
                    }
                    if(xhr.status == 404){
                        $("#response").html(`<p class='alert alert-danger my-3'>${xhr.responseText.reply}</p>`);
                        $("#response").show();
                        setTimeout(function() { $("#response"). fadeOut(); }, 4000);
                    }
                    if(xhr.status == 503){
                        $("#response").html(`<p class='alert alert-danger my-3'>${xhr.responseText.reply}</p>`);
                        $("#response").show();
                        setTimeout(function() { $("#response"). fadeOut(); }, 4000);
                    }
                }
            })
        }
    })

//#region ADMIN PANEL


let productNameError = "Please enter a name for the product.";
let productNameErrorFormat = "Product name has to start with a capital letter and only contain letters.";
let productCategoryError = "Please select a category.";
let productPriceError = "Please enter a price.";
let productPriceFormatError = "Price has to be a number. Accepted formats include (i.e 2, 4.15, 0.5)";


//#region Products
$("#addProdDiv").hide();
$("#alterProdDiv").hide();

$("#addProdBtn").click(function(){
    $("#addProdDiv").show();
    $("#alterProdDiv").hide();
})
$("#alterProdBtn").click(function(){
    $("#addProdDiv").hide();
    $("#alterProdDiv").show();
})

$("#value0").attr("hidden","hidden");


const priceRegEx = /([0-9]*[.])?[0-9]+/;

$("#productName").focus(function(){
    this.classList.remove("error");
    $("#productNameError").text("");
})
$("#productName").blur(function(){
    if(productName.value == ""){
        $("#productNameError").text(productNameError);
        productName.classList.add("error")
    }
    else if(!nameRegEx.test(productName.value)){
        $("#productNameError").text(productNameFormatError);
        productName.classList.add("error");
    }
    else{
        $("#productNameError").text("");
        productName.classList.remove("error");
    }
})



$("#catSel").focus(function(){
    this.classList.remove("error");
    $("#productCategoryError").text("");
})
$("#catSel").blur(function(){
    if(this.value != 0){
        this.classList.remove("error");
        $("#productCategoryError").text("");
    }
    else{
        this.classList.add("error");
        $("#productCategoryError").text("Please select a category.");
    }
})


$("#productPrice").focus(function(){
    this.classList.remove("error");
})
$("#productPrice").blur(function(){
    if(productPrice.value == ""){
        $("#productPriceError").text(productPriceError);
        productPrice.classList.add("error");
    }
    else if(!priceRegEx.test(productPrice.value)){
        $("#productPriceError").text(productPriceFormatError);
        productPrice.classList.add("error");
    }
    else{
        $("#productPriceError").text("");
        productPrice.classList.remove("error");
    }
})

$("#btnAddProduct").click(function(){
    let productName = document.getElementById("productName");
    let productCategory = document.getElementById("catSel");
    let productPrice = document.getElementById("productPrice");

    if(productName.value == ""){
        $("#productNameError").text(productNameError);
        productName.classList.add("error")
    }
    else if(!nameRegEx.test(productName.value)){
        $("#productNameError").text(productNameErrorFormat);
        productName.classList.add("error");
    }
    else{
        $("#productNameError").text("");
        productName.classList.remove("error");
    }

    if(productCategory.value == 0){
        $("#productCategoryError").text(productCategoryError);
        productCategory.classList.add("error");
    }
    else{
        $("#productCategoryError").text("");
        productCategory.classList.remove("error");
    }

    if(productPrice.value == ""){
        $("#productPriceError").text(productPriceError);
        productPrice.classList.add("error");
    }
    else if(!priceRegEx.test(productPrice.value)){
        $("#productPriceError").text(productPriceFormatError);
        productPrice.classList.add("error");
    }
    else{
        $("#productPriceError").text("");
        productPrice.classList.remove("error");
    }

    if(productName.value != "" && nameRegEx.test(productName.value) && productCategory.value != 0 && priceRegEx.test(productPrice.value)){
        let draftData = {
            productName: productName.value,
            productCategory: productCategory.value,
            productPrice: productPrice.value,
            btnAddProduct: true
        }

        $.ajax({
                url: "obrada/obradaUnosaProizvoda.php",
                method: "POST",
                data: draftData,
                dataType: "json",
                success: function(result){
                    $("#response").show();
                    $("#response").html(`<p class='alert alert-success my-3'>${result.reply}</p>`);
                },
                error: function(xhr){
                    console.log(xhr);
                }
        })
    }
})

//#endregion
$(document).click(function(){
    $("#response").hide();
})

function getData(array){
    let dataTable = "";

    if(array.length == 0){
        dataTable = "<p class=alert alert-danger my-3>No data.</p>";
    }
    else{
        dataTable += "<table class='table'><tr><th>#</th><th>Product Name</th><th>Category</th><th>Price</th><th>Edit</th><th>Delete</th></tr>";
        let productNum = 1;
        let editIcon = '<i class="fa-solid fa-pen-to-square"></i>';
        let deleteIcon = '<i class="fa-solid fa-trash"></i>';
    for(let element of array){
        dataTable += `<tr>
        <td>${productNum}</td>
        <td>${element.product_name}</td>
        <td>${element.category_name}</td>
        <td>${element.price}</td>
        <td>${editIcon}</td>
        <td><a href='#' class='deleteProduct' data-productId='${element.product_id}'>${deleteIcon}</td>
    </tr>`;
    productNum++;
    }
    dataTable+=`</table>`
    }
    $("#alterProdDiv").html(dataTable);
}

$(document).on("click",".deleteProduct",function(){
    event.preventDefault();
    let productId = $(this).data('productid');
    $.ajax({
        url: "obrada/deleteProduct.php",
        method: "POST",
        data: {
            id: productId
        },
        dataType: "json",
        success: function(result){
            getData(result);
            $("#response").show();
            $("#response").html(`<p class='alert alert-success my-3'>Product deleted successfully.</p>`);
        },
        error: function(xhr){
            $("#response").show();
            $("#response").html(`<p class='alert alert-danger my-3'>${xhr.responseJSON.reply}</p>`);
        }
    })
})
//#endregion


//#region EDIT DATA CHECK

    let EfirstName = document.getElementById("e-firstName");
    let ElastName = document.getElementById("e-lastName");
    let Editmail = document.getElementById("e-email");
    let address = document.getElementById("address");
    let phoneNumber = document.getElementById("phoneNumber");
    let Epassword = document.getElementById("e-pass");
    let EpasswordCheck = document.getElementById("e-passCheck");
    let userID = document.getElementById("userID");
    let profilePicture = document.getElementById("file");

    const noValueRegEx = /^$/;
    const addressRegEx = /^[#.0-9a-zA-Z\s,-]+$/;
    const phoneRegEx = /^(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;

    $("#e-firstName").focus(function () {
        EfirstName.classList.remove("error");
        firstNameError.textContent = '';

    });

    $("#e-lastName").focus(function () {
        ElastName.classList.remove("error");
        lastNameError.textContent = '';
    });

    $("#e-email").focus(function () {
        Editmail.classList.remove("error");
        emailError.textContent = '';
    });

    $("#e-pass").focus(function () {
        EpasswordCheck.classList.remove("error");
        passCheckError.textContent = '';
        Epassword.classList.remove("error");
        passError.textContent = '';
    });

    $("#e-passCheck").focus(function () {
        EpasswordCheck.classList.remove("error");
        passCheckError.textContent = '';
    });

    $("#removePfp").click(function(){
        let draftData = {
            btnRemovePfp: true
        }
        $.ajax({
                url: "obrada/deletePfp.php",
                method: "POST",
                data: draftData,
                dataType: "json",
                success: function(result){
                    $("#response").show();
                    $("#response").html(`<p class='alert alert-success my-3'>${result.reply}</p>`);
                },
                error: function(xhr){
                    $("#response").html(`<p class='alert alert-success my-3'>${xhr.reply}</p>`);
                }
        })
    })


    $("#editProfileSubmit").click(function(){
        event.preventDefault();
        if(EfirstName.value == ""){
            EfirstName.classList.add("error");
            firstNameError.textContent = firstNameErrorMessage;
        }
        else if(!(nameRegEx.test(EfirstName.value))){
            EfirstName.classList.add("error");
            firstNameError.textContent = firstNameErrorFormat;
        }
        if(ElastName.value == ""){
            ElastName.classList.add("error");
            lastNameError.textContent = lastNameErrorMessage;
        }
        else if(!(nameRegEx.test(ElastName.value))){
            ElastName.classList.add("error");
            lastNameError.textContent = lastNameErrorFormat;
        }
        if(Editmail.value == ""){
            Editmail.classList.add("error");
            emailError.textContent = emailErrorMessage;
        }
        else if(!mailRegEx.test(Editmail.value)){
            Editmail.classList.add("error");
            emailError.textContent = emailFormatErrorMessage;
        }
        else {
            Editmail.classList.remove("error");
            emailError.textContent = '';
        }
        if(Epassword.value != ""){
            if(!(passRegEx.test(Epassword.value))){
            Epassword.classList.add("error");
            passError.textContent = passErrorFormat;
        }}
        else {
            Epassword.classList.remove("error");
            passError.textContent = '';
        }
        if(EpasswordCheck.value != Epassword.value){
            EpasswordCheck.classList.add("error");
            passCheckError.textContent = passCheckErrorFormat;
        }
        else {
            EpasswordCheck.classList.remove("error");
            passCheckError.textContent = '';
        }
        if(phoneNumber.value != ""){
            if(!phoneRegEx.test(phoneNumber.value)){
                $("#phoneNumberError").text("Phone number can only include numbers and symbols: +,-,(,),.");
                phoneNumber.classList.add("error");
            }
            else{
                $("#phoneNumberError").text("");
                phoneNumber.classList.remove("error");
            }
        }
        if(address.value != ""){
            if(!addressRegEx.test(address.value)){
                $("#addressError").text("Address not valid.");
                address.classList.add("error");
            }
            else{
                $("#addressError").text("");
                address.classList.remove("error");
            }
        }
        
    
        if(mailRegEx.test(Editmail.value) && EfirstName.value != "" && ElastName.value != "" && nameRegEx.test(EfirstName.value) && nameRegEx.test(ElastName.value) && (passRegEx.test(Epassword.value) || noValueRegEx.test(Epassword.value)) && (EpasswordCheck.value == Epassword.value) && (noValueRegEx.test(address.value) || addressRegEx.test(address.value))){
             let draftData = {
                firstName: EfirstName.value,
                lastName: ElastName.value,
                address: address.value,
                email: Editmail.value,
                password: Epassword.value,
                phoneNumber: phoneNumber.value,
                user: userID.value,
                btnEditProfile: true
            }

            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);
    
            $.ajax({
                url: "obrada/obradaEditovanjaPodataka.php",
                method: "POST",
                data: draftData,
                dataType: "json",
                success: function(result){
                    $("#response").show();
                    $("#response").html(`<p class='alert alert-success my-3'>${result.reply}</p>`);
                },
                error: function(xhr){
                    console.log(xhr);
                }
            })

            if(profilePicture.value)
                var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file',files);

                $.ajax({
                url: 'obrada/imageUpload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                }
            });
        }
    });

//#endregion


//#region FILTRIRANJE PROIZVODA PO KATEGORIJI

function getProducts(array){
    let products = "";

    if(array.length == 0){
        products = "<p class=alert alert-danger my-3>No data.</p>";
    }
    else{
        array.forEach(product => {
            products += `<div class='card' style='width: 18rem; margin: 10px'>
        <img class='card-img-top' src='${product.image}' alt='Card image cap'>
        <div class='card-body'>
          <h3 class='card-title'>${product.product_name}</h3>
          <p class='card-text'>Price: $${product.price}</p>
          <a href='#' class='btn btn-warning'>Add to cart</a>
        </div></div>`;
        });
        
    }
    $("#menuItems").html(products);
}


$(document).on('click', '.categoryItem', function() {
    let catId = this.id;
    $.ajax({
        url: "obrada/showProductsById.php",
        method: "POST",
        data: {
            category: catId
        },
        dataType: "json",
        success: function(result){
            getProducts(result);
        },
        error: function(xhr){
            console.log(xhr);
        }
    })
});

//#endregion