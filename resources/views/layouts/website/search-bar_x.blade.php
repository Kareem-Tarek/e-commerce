<div class="search-container">
  <div style="text-align: center;">
    <form action="{{ url('/search') }}" method="GET">
      <input class="search-box" type="text" placeholder="Search for a certain product?" name="search_query">
      <button class="search-box-btn px-2" type="submit"><i class="fa fa-search search-box-btn-icon"></i></button>
    </form>
  </div>

  <ul class="nav justify-content-center">
    {{-- <li>
      <input class="search-box" type="text" placeholder="Search for a certain product?" name="search_query">
      <button class="search-box-btn px-2" type="submit"><i class="fa fa-search search-box-btn-icon"></i></button>
    </li> --}}

    <li class="dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clothes <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ route('clothes_all_filter') }}">All Clothes</a></li>
          <li><a href="{{ route('clothes_men_filter') }}">Men's Wear</a></li>
          <li><a href="{{ route('clothes_women_filter') }}">Women's Wear</a></li>
          <li><a href="{{ route('clothes_kids_filter') }}">Kids' Wear</a></li>
        </ul>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clothing Type <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ route('formal_clothes_all_filter') }}">Formal</a></li>
          <li><a href="{{ route('casual_clothes_all_filter') }}">Casual</a></li>
          <li><a href="{{ route('sports_wear_clothes_all_filter') }}">Sports Wear</a></li>
        </ul>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accessories <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ route('accessories_all_filter') }}">All Accessories</a></li>
          <li><a href="{{ route('accessories_men_filter') }}">Men</a></li>
          <li><a href="{{ route('accessories_women_filter') }}">Women</a></li>
          <li><a href="{{ route('accessories_kids_filter') }}">Kids</a></li>
        </ul>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0);" style="color:#ffa200; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: bold; transition:all 0.30s ease-in-out" onMouseOver="this.style.color='#B4B6BB'" onMouseOut="this.style.color='#ffa200'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Check Discounts!
        <span class="caret"></span>
        {{-- <img src="/assets/images/subscription_discount.gif" alt="subscription_discount.gif" style="width: 9%; color: black;"> --}}
        <i class="fa-solid fa-percent"></i>
      </a>
        <ul class="dropdown-menu" role="menu">
        {{-- <li><a href="javascript:void(0);">0%</a></li> --}}
          <li><a href="{{ route('1per-to-10per') }}">1% ~ 10%</a></li>
          <li><a href="{{ route('11per-to-20per') }}">11% ~ 20%</a></li>
          <li><a href="{{ route('21per-to-30per') }}">21% ~ 30%</a></li>
          <li><a href="{{ route('31per-to-40per') }}">31% ~ 40%</a></li>
          <li><a href="{{ route('41per-to-50per') }}">41% ~ 50%</a></li>
          <li><a href="{{ route('51per-to-60per') }}">51% ~ 60%</a></li>
          <li><a href="{{ route('61per-to-70per') }}">61% ~ 70%</a></li>
          <li><a href="{{ route('71per-to-80per') }}">71% ~ 80%</a></li>
          <li><a href="{{ route('81per-to-90per') }}">81% ~ 90%</a></li>
          <li><a href="{{ route('91per-to-100per') }}">91% ~ 100%</a></li>
        </ul>
    </li>
  </ul>
</div>

<style>
/*

"root" in CSS is where you declare and initialize global variables that you can reuse. 
It helps the developers to create 'variables' (that acts as CSS properties) which holds 'values' 

Example: ... 

:root{
  --all_center_aligns: center;
}

Selector_X {text-align: var(--all_center_aligns);}
Selector_Y {text-align: var(--all_center_aligns);}
Selector_Z {text-align: var(--all_center_aligns);}

*/

:root{
  --black_color: rgb(0, 0, 0);
  --transition-35s: all 0.35s ease-in-out;
}

@media only screen and (min-width:350px) and (max-width:505px) {
  .search-container{margin-top: 20%;}
  .search-box{width: 75%;}
}

@media only screen and (min-width:505px) and (max-width:768px) {
  .search-container{margin-top: 10%;}
  .search-box{width: 75%;}
}

@media only screen and (min-width:768px) and (max-width:1005px) {
  .search-container{margin-top: 5%;}
}

.search-box-btn{background-color: var(--black_color); border-radius: 5px;}

.search-box-btn:hover{background-color: rgb(255, 255, 255); transition: var(--transition-35s);}

.search-box-btn-icon{color: snow;}

.search-box-btn:hover .search-box-btn-icon{color: var(--black_color); transition: var(--transition-35s);}

.ancord-item{color: var(--black_color);}

.dropdown{padding-right: 50px; margin-top: 3%;}

.dropdown-menu{border: 1px solid var(--black_color);}

.dropdown .dropdown-menu li{padding-left: 5%;}

.dropdown a, .dropdown .dropdown-menu li a {color: var(--black_color);}

.dropdown .dropdown-menu li a:hover {color: #0083FF;}

.dropdown .dropdown-menu{padding-left: 2%;}
</style>


