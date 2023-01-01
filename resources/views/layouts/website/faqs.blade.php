@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
   FAQ's
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- start FAQ -->

        <div class="card-header" style="text-align: center; width: 79%; padding:0.25%; background-color:rgb(33, 33, 33); color:snow; border-radius:10px; margin-top:0.5%; margin-left:auto; margin-right:auto;">
            <h1>FAQ's</h1>
        </div>
  
        <div class="faq-container" style="margin-bottom: 3%;">

            <div class="faq" style="border-radius: 25px;">
                <h5 class="faq-title">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.</h5>
                <p class="faq-text">
                    <ul class="faq-text" style="list-style-type: upper-roman; padding-left: 2%;">
                        <li>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa, vel? Maiores, ipsam autem beatae corrupti nobis, veritatis quia mollitia dolore dolores nisi dicta excepturi quisquam dignissimos, voluptas porro modi praesentium.
                        </li>
                        <hr>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae accusantium aperiam eaque perferendis enim est suscipit eligendi vel recusandae placeat, facilis amet laboriosam delectus earum quod? Consectetur est voluptatum placeat.
                        </li>
                        <hr>
                        <li>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus cum nulla, corporis amet assumenda quisquam nesciunt voluptatum praesentium, repellat rem hic possimus ea quaerat modi doloribus, tenetur accusamus sit temporibus!
                        </li>
                    </ul>
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-chevron-down dropdown_faq"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="faq" style="border-radius: 25px;">
                <h5 class="faq-title">xxxxxxxxxxxxxxxxxxxxxxxx?</h5>
                <p class="faq-text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque beatae sequi aut fugit voluptate dolor debitis reiciendis quas magni, enim maxime aliquam vel delectus quae asperiores distinctio, necessitatibus quidem totam.
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-chevron-down dropdown_faq"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="faq" style="border-radius: 25px;">
                <h5 class="faq-title">
                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx?
                </h5>
                <p class="faq-text">
                    <span style="font-weight: bold;"><u>You can try any of the following methods below:</u></span>
                    <ul class="faq-text" style="list-style-type: square; padding-left: 2%;">
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. At, ipsum! Dolor voluptatum doloribus omnis illum ipsa provident in deleniti minima quaerat aliquid! Expedita maxime ab error ipsum laborum fugit aliquid.
                        </li>
                        <li>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum qui ducimus minima tenetur soluta amet iusto accusantium ex omnis aut. At nihil expedita deleniti sapiente id pariatur, minus ab ipsa.
                        </li>
                        <li>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio odio amet, deleniti rem sint soluta adipisci aliquam quas necessitatibus nemo suscipit dignissimos nam inventore, perferendis placeat ipsam porro vel nobis?
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex sequi, amet totam asperiores rem dicta beatae tempore molestiae id minima adipisci impedit magnam. Quo dolore blanditiis voluptates, reiciendis officia aspernatur!
                        </li>
                    </ul>
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-chevron-down dropdown_faq"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>
    
            <div class="faq" style="border-radius: 25px;">
                <h5 class="faq-title">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx?</h5>
                <p class="faq-text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda, quibusdam optio! Dignissimos possimus minus, iure recusandae quasi beatae, nam architecto sunt magni cumque reprehenderit dolore atque maxime esse eius nesciunt?
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-chevron-down dropdown_faq"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

        </div>
        <!-- end FAQ -->

        <style>
            @import url('https://fonts.googleapis.com//css?family=Muli&display=swap');

* {
    box-sizing: border-box;
}

h1 {
    margin: 50px 0 30px;
    text-align: center;
}

.faq-container {
    max-width: 70%;
    margin: 0 auto;
}

.faq {
    background-color: rgb(202, 202, 203);
    /* border: 1px solid #c1c4c7; */
    border: 2px solid #000000;
    margin: 20px 0;
    padding: 25px;
    position: relative;
    overflow: hidden;
    transition: 0.3s ease;
}

.faq.active {
    background-color: rgb(232, 230, 234);
    box-shadow: 0 3px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
}

.faq.active::before,
.faq.active::after {
  content: '\f075';
  font-family: 'Font Awesome 5 Free';
  color: #2ecc71;
  font-size: 7rem;
  position: absolute;
  opacity: 0.2;
  top: 20px;
  left: 20px;
  z-index: 0;
}

.faq.active::before {
    color: #3498db;
    top: -10px;
    left: -30px;
    transform: rotateY(180deg);
}

.faq-title {
    margin: 0 35px 0 0;
}

.faq-text {
    display: none;
    margin: 30px 0 0 ;
}

.faq.active .faq-text {
    display: block;
}

.faq-toggle {
    background-color: transparent;
    border: 0;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    padding: 0;
    position: absolute;
    top: 30px;
    right: 30px;
    height: 30px;
    width: 30px;
}

.faq-toggle:focus {
    outline: 0;
}

.faq-toggle .fa-times {
    display: none;
}

.faq.active .faq-toggle .fa-times {
    font-size: 20px;
    color: rgb(217, 7, 7);
    display: block;
}

.dropdown_faq{
    color: rgb(20, 41, 136);
    font-size: 20px;
}

.faq.active .faq-toggle .fa-chevron-down {
    display: none;
}
        </style>

<script>
const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        toggle.parentNode.classList.toggle('active');
    });
});
</script>

    </div>
@endsection

@section('scripts')
@endsection
