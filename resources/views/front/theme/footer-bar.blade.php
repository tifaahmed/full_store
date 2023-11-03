<style>
    .footer-main {
    overflow: hidden;
    position: fixed;
    bottom: 0;
    z-index: 9;
    height: 65px;
    width: 100%;
    text-align: center;
    border-radius: 45% 45% 0% 0%;
    }
    .footer-icons{
        font-size: 31px !important;
        color: #fff;
        position: relative;
        bottom: -16px;
    }
    .cart-counting{
        position: relative;
        bottom: 32px;
        left: 39%;
    }
    .mobile-only {
      display: block;
    }

    @media (min-width: 768px) {
      .mobile-only {
        display: none;
      }
    }

</style>
<div class=" footer-main mobile-only">
    <div class="ddd row footer-icons">


        <div class="col-2">
            <a href="#" >
                <i style="color:#fff;"  class="far fa-user-circle"></i>
            </a>
        </div>
        <div class="col-2">
            <a class="nav-link d-lg-none text-white" href="javascript:void(0)" data-bs-toggle="modal"
            data-bs-target="#searchModal">
                <span>
                    <i class="fa-solid fa-magnifying-glass fs-5" style="font-size: 31px !important;" ></i>
                </span>
            </a>
        </div>


        <div class="col-4">
            <a class="
                    nav-link position-relative 
                    {{ request()->is(@$storeinfo->slug.'/cart') ? 'active' : '' }} 
                    {{ request()->is('cart') ? 'active' : '' }}
                " 
                href="{{ URL::to(@$storeinfo->slug . '/cart') }}">
                <i class="fa fa-shopping-bag" style="font-size: 38px;" aria-hidden="true">
                    <span id="cartcount" class="cart-counting mx-2" >
                        {{ helper::getcartcount($storeinfo->id, @Auth::user()->id) }}
                    </span>
                </i>
            </a>
        </div>

        <div class="col-2">
            <div class="whatsapp_icon ">
                <label class=" " for="check">
                    <i class="fab fa-whatsapp" style=" "></i> 
                </label>
            </div>
        </div>
        <div class="col-2">
            <div class="togl-btn toggle_button">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
</div>
