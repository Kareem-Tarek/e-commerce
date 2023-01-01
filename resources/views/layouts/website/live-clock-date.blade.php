<div class="sticky-clock-container">
   <label style="color: rgb(20, 41, 136); font-size: 110%;">{{Carbon\Carbon::now()->translatedFormat('D, F d Y')}}</label>
   &nbsp;<span style="border-right: 2px solid black;"></span>&nbsp;
   <span id="time" style="color: rgb(20, 41, 136); font-weight: bold; font-size: 110%;"></span>
</div>

    <script>
        function showTime() {
            var date = new Date(),
             utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours() - 2,  //modified on the Egyptian (Cairo UTC) time
                date.getMinutes(),
                date.getSeconds()
             ));

                document.querySelector('#time').innerHTML = utc.toLocaleTimeString();
            }

            setInterval(showTime, 1000);
    </script>

<style>
   .sticky-clock-container{
                position: fixed;
                left: 3px;
                bottom: 3px;
                width: 25%;
                background-color: rgba(250, 250, 250, 0.65);
                border: 2px solid black;
                padding-top: 0.5%;
                text-align: center;
                z-index: 99;
            }

    @media only screen and (min-width:320px) and (max-width:480px) {
        .sticky-clock-container{display: none;}
    }

    /* @media only screen and (min-width:350px) and (max-width:505px) {
        .sticky-clock-container{display: none;}
    }
    
    @media only screen and (min-width:505px) and (max-width:768px) {
        .sticky-clock-container{display: none;}
    } */
</style>