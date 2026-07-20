    <div class="bar-ads">
        <img class="ads-bg" src="{{ asset('assets/promo') }}/ads-bg.png" alt="ads-bg">
        <img class="gift-box-left" src="{{ asset('assets/promo') }}/gift-box.png" alt="gift-box">
        <img class="gift-box-right" src="{{ asset('assets/promo') }}/gift-box.png" alt="gift-box">
        <div class="bar-ads-content container">
            <div class="countdown">
                <div class="countdown-item">
                    <span class="countdown-value">00</span>
                    <span class="countdown-label">Day</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-value">00</span>
                    <span class="countdown-label">Hour</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-value">00</span>
                    <span class="countdown-label">Min</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-value">00</span>
                    <span class="countdown-label">Sec</span>
                </div>
            </div>
            <figure class="ads-off__img">
                <img src="{{ asset('assets/promo') }}/ads-off.png" alt="ads-off">
            </figure>
            <div class="header-ads-right">
                <div class="ads-info">
                    <p class="ads-info__desc">Sale on Our Trendiest Items</p>
                    <p class="ads-info__title">For Valentine 2026</p>
                </div>
                <a href="https://unlockthemes.com/promo/?src=topbar" target="_blank" class="grab-btn">
                    Get Deal Now
                </a>
            </div>
        </div>
    </div>






    @if (!session()->get('valentine2026'))
        <div class="modal ads-popup-modal fade" id="adsModal" tabindex="-1" aria-labelledby="adsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="ads-popup bg-img" data-background-image="{{ asset('assets/promo') }}/ads-box-bg.png">
                        <div class="ads-popup-content">
                            <div class="countdown">
                                <div class="countdown-item">
                                    <span class="countdown-value">00</span>
                                    <span class="countdown-label">Day</span>
                                </div>
                                <div class="countdown-item">
                                    <span class="countdown-value">00</span>
                                    <span class="countdown-label">Hour</span>
                                </div>
                                <div class="countdown-item">
                                    <span class="countdown-value">00</span>
                                    <span class="countdown-label">Min</span>
                                </div>
                                <div class="countdown-item">
                                    <span class="countdown-value">00</span>
                                    <span class="countdown-label">Sec</span>
                                </div>
                            </div>
                            <div class="ads-info">
                                <p class="ads-info__desc">Sale on Our Trendiest Items</p>
                                <p class="ads-info__title">For Valentine 2026</p>
                            </div>
                            <div class="text-center">
                                <a href="https://unlockthemes.com/promo/?src=modal" target="_blank" class="grab-btn">
                                    Get Discount Now
                                </a>
                            </div>
                            <figure>
                                <img src="{{ asset('assets/promo') }}/ads-box-img.png" alt="ads-box-img">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif




    @push('script')
        <script>
            const countDownDate = new Date("2026-02-14T00:00:00Z").getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = countDownDate - now;


                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);


                if (distance < 0) {
                    days = hours = minutes = seconds = "00";
                    document.querySelector(".bar-ads")?.remove();
                }


                // update ALL countdowns
                document.querySelectorAll(".countdown").forEach(countdown => {
                    const values = countdown.querySelectorAll(".countdown-value");


                    values[0].innerHTML = String(days).padStart(2, "0");
                    values[1].innerHTML = String(hours).padStart(2, "0");
                    values[2].innerHTML = String(minutes).padStart(2, "0");
                    values[3].innerHTML = String(seconds).padStart(2, "0");
                });
            }
            updateCountdown();
            setInterval(updateCountdown, 1000);

            $(".bg-img").css("background-image", function() {
                return `url(${$(this).data("background-image")})`;
            });

            @if (!session()->get('valentine2026'))
                setTimeout(() => {
                    const myModal = new bootstrap.Modal(
                        document.getElementById('adsModal'), {
                            keyboard: false
                        }
                    );
                    myModal.show();
                }, 5000); // 5 seconds
            @endif
        </script>
    @endpush

    @push('style')
        <style>
            .bar-ads {
                position: relative;
                z-index: 1;
                height: 80px;
                overflow: hidden;
                display: inline-grid;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                font-family: "Poppins", sans-serif;
                width: 100%;
            }

            @media screen and (max-width: 767px) {
                .bar-ads {
                    height: 60px;
                }
            }

            .ads-off__img {
                margin-bottom: 0;
            }

            .bar-ads .ads-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                z-index: -1;
            }

            .bar-ads .gift-box-left,
            .bar-ads .gift-box-right {
                position: absolute;
                bottom: -60px;
                width: 140px;
                height: 140px;
                -o-object-fit: cover;
                object-fit: cover;
                z-index: -1;
            }

            @media screen and (max-width: 1199px) {

                .bar-ads .gift-box-left,
                .bar-ads .gift-box-right {
                    bottom: -40px;
                    width: 100px;
                    height: 100px;
                }
            }

            @media screen and (max-width: 991px) {

                .bar-ads .gift-box-left,
                .bar-ads .gift-box-right {
                    bottom: -30px;
                    width: 60px;
                    height: 60px;
                }
            }

            .bar-ads .gift-box-left {
                left: -37px;
            }

            .bar-ads .gift-box-right {
                right: -36px;
            }

            .bar-ads .bar-ads-content {
                margin: 0 auto;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-pack: distribute;
                justify-content: space-between;
                gap: 31px;
            }

            @media screen and (max-width: 1199px) {
                .bar-ads .bar-ads-content {
                    gap: 15px;
                }
            }

            @media screen and (max-width: 991px) {
                .bar-ads .bar-ads-content {
                    gap: 10px;
                }
            }

            .bar-ads .countdown {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                gap: 12px;
                position: relative;
                z-index: 1;
            }

            @media screen and (max-width: 1199px) {
                .bar-ads .countdown {
                    gap: 8px;
                }
            }

            .bar-ads .countdown .countdown-item {
                background-color: hsl(var(--black)/0.02);
                border-right: 1px solid hsl(var(--white)/0.6);
                display: grid;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                gap: 0px;
                text-align: center;
                padding-right: 12px;
            }

            .bar-ads .countdown .countdown-item:last-child {
                border-right: none;
            }

            @media screen and (max-width: 991px) {
                .bar-ads .countdown .countdown-item {
                    padding-right: 8px;
                }
            }

            .bar-ads .countdown .countdown-item .countdown-value {
                font-size: 24px;
                font-weight: 600;
                color: #ffdee0;
                margin-bottom: 0;
                line-height: 33px;
            }

            @media screen and (max-width: 991px) {
                .bar-ads .countdown .countdown-item .countdown-value {
                    font-size: 20px;
                    line-height: 25px;
                }
            }

            @media screen and (max-width: 767px) {
                .bar-ads .countdown .countdown-item .countdown-value {
                    font-size: 16px;
                    line-height: 20px;
                }
            }

            .bar-ads .countdown .countdown-item .countdown-label {
                font-size: 15px;
                font-weight: 400;
                color: #ffdee0;
                line-height: 1;
            }

            @media screen and (max-width: 991px) {
                .bar-ads .countdown .countdown-item .countdown-label {
                    font-size: 10px;
                }
            }

            @media screen and (max-width: 991px) {
                .bar-ads .ads-off__img {
                    margin: 0 -15px;
                }
            }

            @media screen and (max-width: 767px) {
                .bar-ads .ads-off__img {
                    margin: 0 -20px;
                }
            }

            @media screen and (max-width: 424px) {
                .bar-ads .ads-off__img {
                    margin: 0 -40px;
                }
            }

            .bar-ads .ads-off__img img {
                height: 80px;
            }

            @media screen and (max-width: 767px) {
                .bar-ads .ads-off__img img {
                    height: 60px;
                }
            }

            .bar-ads .header-ads-right {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                gap: 130px;
            }

            @media screen and (max-width: 1250px) {
                .bar-ads .header-ads-right {
                    gap: 0px;
                }
            }

            @media screen and (max-width: 767px) {
                .bar-ads .header-ads-right {
                    display: grid;
                    gap: 0;
                }
            }

            .bar-ads .ads-info {
                text-align: center;
            }

            .bar-ads .ads-info__desc {
                font-size: 23px;
                font-weight: 500;
                color: #ffcfd2;
                line-height: 1;
            }

            @media screen and (max-width: 1200px) {
                .bar-ads .ads-info__desc {
                    font-size: 16px;
                }
            }

            @media screen and (max-width: 991px) {
                .bar-ads .ads-info__desc {
                    font-size: 13px;
                }
            }

            @media screen and (max-width: 767px) {
                .bar-ads .ads-info__desc {
                    font-size: 10px;
                }
            }

            @media screen and (max-width: 575px) {
                .bar-ads .ads-info__desc {
                    font-size: 9px;
                }
            }

            .bar-ads .ads-info__title {
                font-size: 32px;
                font-weight: 700;
                color: #ffcfd2;
                line-height: 1;
            }

            @media screen and (max-width: 1200px) {
                .bar-ads .ads-info__title {
                    font-size: 24px;
                }
            }

            @media screen and (max-width: 991px) {
                .bar-ads .ads-info__title {
                    font-size: 18px;
                }
            }

            @media screen and (max-width: 767px) {
                .bar-ads .ads-info__title {
                    font-size: 12px;
                    font-weight: 500;
                }
            }

            .bar-ads .grab-btn {
                font-size: 18px;
                font-weight: 500;
                color: #fff;
                line-height: 1;
                height: 45px;
                border: 2px solid #fff;
                padding: 0 20px;
                border-radius: 50px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                margin-left: 20px;
            }

            @media screen and (max-width: 991px) {
                .bar-ads .grab-btn {
                    font-size: 14px;
                    height: 35px;
                    padding: 0 15px;
                    margin-left: 10px;
                    border-width: 1px;
                }
            }

            @media screen and (max-width: 767px) {
                .bar-ads .grab-btn {
                    font-size: 11px;
                    height: 30px;
                    padding: 0 10px;
                    margin-left: 5px;
                    border-width: 1px;
                }
            }

            @media screen and (max-width: 575px) {
                .bar-ads .grab-btn {
                    font-size: 10px;
                    height: 25px;
                    padding: 0 5px;
                    margin-left: 0;
                    border-width: 1px;
                    margin-top: 5px;
                }
            }

            .bar-ads .grab-btn:hover {
                background-color: #fff;
                color: #cd0514;
            }

            .ads-popup-modal {
                --bs-modal-width: 450px;
            }

            .ads-popup-modal .btn-close {
                position: absolute;
                top: 0;
                right: -40px;
                background: #cd0514 !important;
                border-radius: 0;
                -webkit-filter: none;
                filter: none;
                color: #fff;
                padding: 10px;
                padding-bottom: 17px;
            }

            @media screen and (max-width: 575px) {
                .ads-popup-modal .btn-close {
                    right: 0;
                    top: -50px;
                }
            }

            .ads-popup-modal .modal-content {
                background: none;
                border: none;
                text-align: center;
            }

            .ads-popup-modal .ads-popup {
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                padding: 40px 20px 20px;
            }

            .ads-popup-modal .countdown {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                gap: 12px;
                position: relative;
                z-index: 1;
            }

            @media screen and (max-width: 1199px) {
                .ads-popup-modal .countdown {
                    gap: 8px;
                }
            }

            .ads-popup-modal .countdown .countdown-item {
                background-color: hsl(var(--black)/0.02);
                border-right: 1px solid hsl(var(--white)/0.6);
                display: grid;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                gap: 0px;
                text-align: center;
                padding-right: 12px;
            }

            .ads-popup-modal .countdown .countdown-item:last-child {
                border-right: none;
            }

            .ads-popup-modal .countdown .countdown-item .countdown-value {
                font-size: 24px;
                font-weight: 600;
                color: #ffdee0;
                margin-bottom: 0;
                line-height: 33px;
            }

            .ads-popup-modal .countdown .countdown-item .countdown-label {
                font-size: 15px;
                font-weight: 400;
                color: #ffdee0;
                line-height: 1;
            }

            .ads-popup-modal .ads-info {
                text-align: center;
                margin: 30px 0;
            }

            .ads-popup-modal .ads-info__desc {
                font-size: 22px;
                font-weight: 500;
                color: #ffe8e9;
                line-height: 1;
            }

            @media screen and (max-width: 575px) {
                .ads-popup-modal .ads-info__desc {
                    font-size: 18px;
                }
            }

            .ads-popup-modal .ads-info__title {
                font-size: 36px;
                font-weight: 700;
                color: #ffeff0;
                line-height: 1;
                margin-top: 10px;
            }

            @media screen and (max-width: 575px) {
                .ads-popup-modal .ads-info__title {
                    font-size: 28px;
                }
            }

            .ads-popup-modal .grab-btn {
                font-size: 18px;
                font-weight: 600;
                color: #fff;
                line-height: 1;
                height: 55px;
                margin: 0 auto;
                border: 2px solid #fff;
                padding: 0 15px;
                border-radius: 50px;
                display: -webkit-inline-box;
                display: -ms-inline-flexbox;
                display: inline-flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                gap: 4px;
                margin-bottom: 30px;
            }

            .ads-popup-modal .grab-btn b {
                font-size: 28px;
                font-weight: 700;
            }

            .ads-popup-modal .grab-btn:hover {
                background-color: #fff;
                color: #cd0514;
            }

            .bg-img {
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .header {
                position: relative;
            }

            .banner {
                padding: 150px 0 190px;
                overflow: hidden;
            }
        </style>
    @endpush


    {{ session()->put('valentine2026', 'ok') }}
