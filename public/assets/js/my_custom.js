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

/********************************* START road_map/satellite_map from "contact.blade.php" *********************************/
const road_map = document.querySelector("#mapouter_roadmap"),
        satellite_map = document.querySelector("#mapouter_satellite_with_street_names");

	document.querySelector("#switch").addEventListener("click", function() {
		// hide element: element.hidden = true;
		// show element: element.hidden = false;
		road_map.hidden = !road_map.hidden;
		satellite_map.hidden = !satellite_map.hidden;
	});
/********************************* END road_map/satellite_map from "contact.blade.php" *********************************/
 
/********************************* START count down from "contact-success.blade.php" *********************************/
 var count = 21; // intialization

setInterval(function(){
    count--; //decrementation by 1
    document.querySelector('.countDown').innerHTML = count;

    if (count <= 0) { //(the wrong condition) ending condition to handle any kind of decrementation errors (zero & counting in negatives)
        count += 1;
        window.location = 'http://localhost:8000/home';
    }
    else if(count == 4 || count == 2){
        document.querySelector('.countDown').style.backgroundColor = '#D3D3D3';
        document.querySelector('.countDown').style.color = 'black';
    }
    else if(count == 5 || count == 3 || count == 1){
        document.querySelector('.countDown').style.backgroundColor = '#D3D3D3';
        document.querySelector('.countDown').style.color = 'red';
    }
},1000);

/* the 1000 represents the incrementation/decrementation (and 1000 is equals to each 1 second so in this case will 
   decrement 1 second by each count from variable "count" to 1 which is the timing from when the count begun and the 
   timing between each count decrement) */
/********************************* END count down from "contact-success.blade.php" *********************************/