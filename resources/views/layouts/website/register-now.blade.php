3<!--------- for guests ONLY! (which are unknown users that are not registered to the DB) ---------->
@if(!auth()->user() || Auth::guest()) <!---- both conditions means the same thing which is if user is a guest ----->
    <div class="badge">
        <a href="{{ route('register') }}">
            <span class="badge badge-primary register-now-text">
                Register Now! <i class="fa-solid fa-computer-mouse click-here-to-register-now-icon"></i>
            </span>
        </a>
    </div>
<style>
    .badge{
        position: fixed;
        left: 0px;
        top: 9.5%;
        width: 100%;
        border: 0px solid black;
        font-size: 110%;
        z-index: 4000;
    }

    .badge:hover{
        background-color: rgba(240, 246, 251, 0.65);
        color: rgb(19, 27, 186);
        border: 0px solid black;
    }

    .click-here-to-register-now-icon{
        /* padding-top: 6%; */
    }
    @media (max-width: 768px) {
        .badge{
            display: none
        }
    }
</style>
@endif
