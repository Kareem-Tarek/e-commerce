<div class="container search-container mt-4">
  <div class="row justify-content-center">
      <form action="{{ route('search-website') }}" method="GET">
          <input class="search-box" type="text" placeholder="Search for any product..." name="search_query">
          <button class="search-box-btn px-2" type="submit"><i class="fa fa-search search-box-btn-icon"></i></button>
      </form>
  </div>

  <div class="row justify-content-center">
      <ul class="nav">

          <li class="dropdown">
              <a href="{{ route('all_product_items') }}">All Products <span class="caret"></span></a>
          </li>

          <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clothing Category <span class="caret"></span></a>
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
            <a href="{{ route('latest_items') }}">Latest Items <span class="caret"></span></a>
        </li>

          <li class="dropdown">
            <div class="check-discounts">
              <a class="dropdown-toggle check-discount" href="javascript:void(0);" onMouseOver="this.style.color='#B4B6BB'" onMouseOut="this.style.color='#383e36'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  Check Discounts!
                  <span class="caret"></span>
                  <i class="fa-solid fa-percent percent-icon"></i>
              </a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('1per-to-10per') }}">1% ~ 10%</a></li>
                  <li><a href="{{ route('11per-to-20per') }}">11% ~ 20%</a></li>
                  <li><a href="{{ route('21per-to-30per') }}">21% ~ 30%</a></li>
                  <li><a href="{{ route('31per-to-40per') }}">31% ~ 40%</a></li>
                  <li>
                    <a href="{{ route('41per-to-50per') }}">41% ~ 50%</a>
                      &nbsp;&nbsp;<span class="badge badge-pill badge-danger">NEW</span>
                  </li>
                  <li><a href="{{ route('51per-to-60per') }}">51% ~ 60%</a></li>
                  <li><a href="{{ route('61per-to-70per') }}">61% ~ 70%</a></li>
                  <li><a href="{{ route('71per-to-80per') }}">71% ~ 80%</a></li>
                  <li><a href="{{ route('81per-to-90per') }}">81% ~ 90%</a></li>
                  <li><a href="{{ route('91per-to-100per') }}">91% ~ 100%</a></li>
              </ul>
            </div>
          </li>
      </ul>
  </div>
</div>

