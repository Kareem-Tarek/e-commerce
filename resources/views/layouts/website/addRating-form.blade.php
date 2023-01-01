<form action="{{ url('addRating' , $product->id) }}" method="POST" id="addRating-form" style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    <div class="input-group">
        {{-- <!-- declaration for first field -->
        <input class="form-control input-sm" type="number" value="1" min="1" name="rating_level">
  
        <!-- reducong the gap between them to zero -->
        <span class="input-group-btn" style="width: 5px;"></span>
  
        <!-- declaration for second field -->
        <input class="btn btn-primary" type="submit" value="Rating" name="" style="width: 35%;"> --}}

        <!------------------------------------------------------------------------------------------------------------>

        {{-- <select name="rating_level" class="form-control" onchange="this.form.submit()"> <!-- onchange="this.form.submit()" submits the form without the use of input/button type submit -->
            <option value="" disabled selected>--- Select Your Rating ---</option>
            <option value="1">Poor</option>      <!----- Poor ----->
            <option value="2">Average</option>   <!----- Average ----->
            <option value="3">Good</option>      <!----- Good ----->
            <option value="4">Very Good</option> <!----- Very Good ----->
            <option value="5">Excellent</option> <!----- Excellent ----->
        </select> --}}

        <div class="star-wrapper">
            {{-- <a href="#" name="rating_level" value="1" class="fas fa-star star_1"></a>
            <a href="#" name="rating_level" value="2" class="fas fa-star star_2"></a>
            <a href="#" name="rating_level" value="3" class="fas fa-star star_3"></a>
            <a href="#" name="rating_level" value="4" class="fas fa-star star_4"></a>
            <a href="#" name="rating_level" value="5" class="fas fa-star star_5"></a> --}}

            {{-- <input class="fas fa-star star_5" value="5" type="radio" name="rating_level" onchange="this.form.submit()"/>
            <label class="fas fa-star star_5" class="star_5" for="star_5"></label>

            <input class="fas fa-star star_4" value="4" type="radio" name="rating_level" onchange="this.form.submit()"/>
            <label class="fas fa-star star_4" class="star_4" for="star_4"></label>

            <input class="fas fa-star star_3" value="3" type="radio" name="rating_level" onchange="this.form.submit()"/>
            <label class="fas fa-star star_3" class="star_3" for="star_3"></label>

            <input class="fas fa-star star_2" value="2" type="radio" name="rating_level" onchange="this.form.submit()"/>
            <label class="fas fa-star star_2" class="star_2" for="star_2"></label>

            <input class="fas fa-star star_1" value="1" type="radio" name="rating_level" onchange="this.form.submit()"/>
            <label class="fas fa-star star_1" class="star_1" for="star_1"></label> --}}



            {{-- @for($i = 5 ; $i >= 1 ; $i--)
                <input class="fas fa-star star_{{ $i }}" value="{{ $i }}" type="radio" name="rating_level" onchange="this.form.submit()"/>
                <label class="fas fa-star star_{{ $i }}" class="star_{{ $i }}" for="star_{{ $i }}"></label>
            @endfor --}}

            @foreach(range(5,1) as $i)
                <input class="fas fa-star star_{{ $i }}" value="{{ $i }}" type="radio" name="rating_level" onchange="this.form.submit()"/>
                <label class="fas fa-star star_{{ $i }}" class="star_{{ $i }}" for="star_{{ $i }}"></label>
            @endforeach

        </div>

        <style>
            .star-wrapper {
                margin-left: auto;
                margin-right: auto;
                position: relative;
                direction: rtl;
            }
            .star-wrapper label {
                font-size: 0.9em;
                color: rgba(179, 172, 172, 0.61);
                text-decoration: none;
                transition: all 0.5s;
                margin: 4px;
            }
            .star-wrapper label:hover {
                color: gold;
                transform: scale(1.35);
            }
            .star_1:hover ~ label {
                color: gold;
            }
            .star_2:hover ~ label {
                color: gold;
            }
            .star_3:hover ~ label {
                color: gold;
            }
            .star_4:hover ~ label {
                color: gold;
            }
            .star_5:hover ~ label {
                color: gold;
            }
            .wraper {
                position: absolute;
                bottom: 30px;
                right: 50px;
            }
        </style>

    </div>
</form>
