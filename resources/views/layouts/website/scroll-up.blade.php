<div>
  <p>
    <button onclick="topFunction()" id="myScrollUpBtn" title="Go To Top"><i class="fa-solid fa-arrow-up"></i></button>
  </p>
</div>


<style>
  #myScrollUpBtn {
    display: none; /* Hidden by default (Hidden at the very top of the page. When scrolling 
                      down the page this scroll up will appear with JavaScript fuction) */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    background-color: #0083FF; /* Set a background color */
    background-image: linear-gradient(black, #0083FF);
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 50px; /* Rounded corners */
    font-size: 25px; /* Increase font size */
}

#myScrollUpBtn:hover {
  /* background-color: #555; Add a dark-grey background on hover */
  background-image: linear-gradient(#0083FF, black);
  transition: 0.40s all ease-in-out;
  color: rgb(166, 196, 240);
}

#myScrollUpBtn:not(:hover) {
  transition: all 0.25s ease-in-out;
}
</style>

<script>
    //Get the button:
myButton = document.querySelector("#myScrollUpBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    myButton.style.display = "block";
  } else {
    myButton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
</script>