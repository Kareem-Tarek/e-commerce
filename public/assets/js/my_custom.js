/********************************* START show/hide password dot-eye-icon (for Login Form) *********************************/
function show_hide_password_function_login(){
    const password_input = document.querySelector("#password");
    const dot_eye        = document.querySelector("#dot-eye-icon");

    if(password_input.getAttribute('type') === "password"){
        password_input.setAttribute('type', 'text'); //also => password_input.type = "text"; (but not preferred!)
        if(dot_eye.classList.contains("fa-eye")){
            dot_eye.classList.remove("fa-eye");
        }
        dot_eye.classList.add("fa-eye-slash");
        dot_eye.style.color = "grey";
    } 
    else{
        password_input.setAttribute('type', 'password'); //also => password_input.type = "password"; (but not preferred!)
        if(dot_eye.classList.contains("fa-eye-slash")){
            dot_eye.classList.remove("fa-eye-slash");
        }
        dot_eye.classList.add("fa-eye");
        dot_eye.style.color = "inherit";
    }
}
 /********************************* END show/hide password dot-eye-icon (for Login Form) *********************************/
 
 
 /********************************* START show/hide password dot-eye-icon (for Register Form) *********************************/
 function show_hide_password_function_register(){
    const password_input = document.querySelector("#password");
    const dot_eye        = document.querySelector("#dot-eye-icon-password");

    if(password_input.getAttribute('type') === "password"){
        password_input.setAttribute('type', 'text'); //also => password_input.type = "text"; (but not preferred!)
        if(dot_eye.classList.contains("fa-eye")){
            dot_eye.classList.remove("fa-eye");
        }
        dot_eye.classList.add("fa-eye-slash");
        dot_eye.style.color = "grey";
    } 
    else{
        password_input.setAttribute('type', 'password'); //also => password_input.type = "password"; (but not preferred!)
        if(dot_eye.classList.contains("fa-eye-slash")){
            dot_eye.classList.remove("fa-eye-slash");
        }
        dot_eye.classList.add("fa-eye");
        dot_eye.style.color = "inherit";
    }
}

function show_hide_confirm_password_function_register(){
    const confirm_password_input = document.querySelector("#password-confirm");
    const dot_eye                = document.querySelector("#dot-eye-icon-confirm-password");

    if(confirm_password_input.getAttribute('type') === "password"){
        confirm_password_input.setAttribute('type', 'text'); //also => password_input.type = "text"; (but not preferred!)
        if(dot_eye.classList.contains("fa-eye")){
            dot_eye.classList.remove("fa-eye");
        }
        dot_eye.classList.add("fa-eye-slash");
        dot_eye.style.color = "grey";
    } 
    else{
        confirm_password_input.setAttribute('type', 'password'); //also => password_input.type = "password"; (but not preferred!)
        if(dot_eye.classList.contains("fa-eye-slash")){
            dot_eye.classList.remove("fa-eye-slash");
        }
        dot_eye.classList.add("fa-eye");
        dot_eye.style.color = "inherit";
    }
}
 /********************************* END show/hide password dot-eye-icon (for Register Form) *********************************/  