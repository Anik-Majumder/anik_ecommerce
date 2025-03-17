<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        @foreach($banners->take(2) as $banner)
            <div class="col-md-6 pb-4">
                <div
                    class="position-relative bg-secondary text-center {{ $loop->iteration === 2 ? 'text-md-left' : 'text-md-right' }} text-white mb-2 py-5 px-5">
                    <img src="{{ asset($banner->banner_img) }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{$banner->banner_title_1}}</h5>
                        <h1 class="mb-4 font-weight-semi-bold">{{$banner->banner_title_2}}</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">{{$banner->banner_btn_text}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Offer End -->
