<nav aria-label="breadcrumb">

    <ol class="breadcrumb breadcrumb-rtl">

        <li class="breadcrumb-item"><a href="{{ URL::to('admin/dashboard') }}">{{ trans('labels.dashboard')}}</a></li>

        @if(request()->is('admin/transaction*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.transaction') }}</li>

        @endif

        @if(request()->is('admin/report*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.report') }}</li>

        @endif

        @if(request()->is('admin/orders'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.orders') }}</li>

        @endif

        @if(request()->is('admin/orders/invoice*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page"><a href="{{ URL::to('admin/orders') }}">{{ trans('labels.orders')}}</a></li>

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">Order details</li>

        @endif



        @if(request()->is('admin/plan'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.pricing_plan') }}</li>

        @endif



        @if(request()->is('admin/plan/add*') || request()->is('admin/plan/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page"><a href="{{ URL::to('admin/plan') }}">{{ trans('labels.pricing_plan')}}</a></li>

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

                @if(request()->is('admin/plan/edit-*'))

                    {{ trans('labels.edit') }}

                @else

                    {{ trans('labels.add_new') }}

                @endif

            

            </li>

        @endif





        @if(request()->is('admin/tableqr'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.tableqr') }}</li>

        @endif



        @if(request()->is('admin/tableqr/add*') || request()->is('admin/tableqr/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page"><a href="{{ URL::to('admin/tableqr') }}">{{ trans('labels.tableqr')}}</a></li>

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

                @if(request()->is('admin/tableqr/edit-*'))

                    {{ trans('labels.edit') }}

                @else

                    {{ trans('labels.add_new') }}

                @endif

            

            </li>

        @endif



        @if(request()->is('admin/booking'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.booking') }}</li>

        @endif



        @if(request()->is('admin/area'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.area') }}</li>

        @endif



        @if(request()->is('admin/area/add*') || request()->is('admin/area/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page"><a href="{{ URL::to('admin/area') }}">{{ trans('labels.area')}}</a></li>

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

                @if(request()->is('admin/area/edit-*'))

                    {{ trans('labels.edit') }}

                @else

                    {{ trans('labels.add_new') }}

                @endif

            

            </li>

        @endif



        @if(request()->is('admin/plan/selectplan-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/plan') }}">{{ trans('labels.plan')}}</a></li>

            

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.selected_plan') }}</li>

           

        @endif





        @if(request()->is('admin/customers'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.customers') }}</li>

        @endif

        @if(request()->is('admin/payment'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.payment_settings') }}</li>

        @endif

        @if(request()->is('admin/shipping-area'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.shipping_area') }}</li>

        @endif

        @if(request()->is('admin/shipping-area/add*') || request()->is('admin/shipping-area/show*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page"><a href="{{ URL::to('admin/shipping-area') }}">{{ trans('labels.shipping_area')}}</a></li>

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            @if(request()->is('admin/shipping-area/show*'))

            {{ trans('labels.edit') }}

            @else

            {{ trans('labels.add') }}

            @endif

        </li>



        @endif

        @if(request()->is('admin/time'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.working_hours') }}</li>

        @endif

        @if(request()->is('admin/google_analytics'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.analytics') }}</li>

        @endif

        @if(request()->is('admin/categories'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.categories') }}</li>

        @endif

        @if(request()->is('admin/categories/add') || request()->is('admin/categories/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/categories') }}">{{ trans('labels.categories')}}</a></li>

            @if(request()->is('admin/categories/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif





        @if(request()->is('admin/products'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.products') }}</li>

        @endif

        @if(request()->is('admin/products/add') || request()->is('admin/products/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/products') }}">{{ trans('labels.products')}}</a></li>

            @if(request()->is('admin/products/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/banner'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.banner') }}</li>

        @endif

        @if(request()->is('admin/banner/add') || request()->is('admin/banner/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/banner') }}">{{ trans('labels.banner')}}</a></li>

            @if(request()->is('admin/banner/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/coupons'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.coupons') }}</li>

        @endif

        @if(request()->is('admin/coupons/add') || request()->is('admin/coupons/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/coupons') }}">{{ trans('labels.coupons')}}</a></li>

            @if(request()->is('admin/coupons/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/blogs'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.blogs') }}</li>

        @endif

        @if(request()->is('admin/blogs/add') || request()->is('admin/blogs/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/blogs') }}">{{ trans('labels.blogs')}}</a></li>

            @if(request()->is('admin/blogs/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif

        @if(request()->is('admin/subscribers'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.subscribers') }}</li>

        @endif

        @if(request()->is('admin/inquiries'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.inquiries') }}</li>

        @endif

        @if(request()->is('admin/privacy-policy'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.privacy_policy') }}</li>

        @endif

        @if(request()->is('admin/refund-policy'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.refund_policy') }}</li>

        @endif

        @if(request()->is('admin/terms-conditions'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.terms') }}</li>

        @endif

        @if(request()->is('admin/aboutus'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.about_us') }}</li>

        @endif

        @if(request()->is('admin/share'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.share') }}</li>

        @endif

        @if(request()->is('admin/settings'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.settings') }}</li>

        @endif

        @if(request()->is('admin/users'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.users') }}</li>

        @endif

        @if(request()->is('admin/users/add') || request()->is('admin/users/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/users') }}">{{ trans('labels.users')}}</a></li>

            @if(request()->is('admin/users/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif

        @if(request()->is('admin/areas'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.areas') }}</li>

        @endif

        @if(request()->is('admin/areas/add') || request()->is('admin/areas/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/areas') }}">{{ trans('labels.areas')}}</a></li>

            @if(request()->is('admin/areas/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif

        @if(request()->is('admin/cities'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.cities') }}</li>

        @endif

        @if(request()->is('admin/cities/add') || request()->is('admin/cities/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/cities') }}">{{ trans('labels.cities')}}</a></li>

            @if(request()->is('admin/cities/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/custom_domain'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.custom_domain') }}</li>

        @endif

        @if(request()->is('admin/custom_domain/add') || request()->is('admin/custom_domain/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/custom_domain') }}">{{ trans('labels.custom_domain')}}</a></li>

            @if(request()->is('admin/custom_domain/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/features'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.features') }}</li>

        @endif

        @if(request()->is('admin/features/add') || request()->is('admin/features/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/features') }}">{{ trans('labels.features')}}</a></li>

            @if(request()->is('admin/features/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/promotionalbanners'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.promotional_banners') }}</li>

        @endif

        @if(request()->is('admin/promotionalbanners/add') || request()->is('admin/promotionalbanners/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/promotionalbanners') }}">{{ trans('labels.promotional_banners')}}</a></li>

            @if(request()->is('admin/promotionalbanners/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/faqs'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.faqs') }}</li>

        @endif

        @if(request()->is('admin/faqs/add') || request()->is('admin/faqs/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/faqs') }}">{{ trans('labels.faqs')}}</a></li>

            @if(request()->is('admin/faqs/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif



        @if(request()->is('admin/testimonials'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.testimonials') }}</li>

        @endif

        @if(request()->is('admin/testimonials/add') || request()->is('admin/testimonials/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/testimonials') }}">{{ trans('labels.testimonials')}}</a></li>

            @if(request()->is('admin/testimonials/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif

        

        @if(request()->is('admin/language-settings')  || request()->is('admin/language-settings/en*')|| request()->is('admin/language-settings/ar*') || request()->is('admin/language-settings/de*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.language-settings') }}</li>

        @endif
      

        @if(request()->is('admin/language-settings/add'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/language-settings') }}">{{ trans('labels.language-settings')}}</a></li>

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

        @endif

        @if(request()->is('admin/apps'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.apps') }}</li>

        @endif

        @if(request()->is('admin/createsystem-addons') || request()->is('admin/createsystem-addons/edit-*'))

        <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">

            <a href="{{ URL::to('admin/apps') }}">{{ trans('labels.addons_manager')}}</a></li>

            @if(request()->is('admin/features/edit-*'))

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>

            @else

            <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.add') }}</li>

            @endif

        @endif









    </ol>

</nav>