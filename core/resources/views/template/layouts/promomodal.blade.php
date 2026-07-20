@if(!session()->get('promo4'))
    <div class="modal fade" id="expiredModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="expiredModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <a href="https://unlockthemes.com/promo/?src=homePage" target="_blank"><img src="https://unlockthemes.com/promo/offer.png"></a>
                        <div class="mt-3 d-flex justify-content-between">
                            <button type="button" class="btn btn--secondary outline" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            <a href="https://unlockthemes.com/promo/?src=homePage" target="_blank" class="btn btn--base outline"> Get Flat 50% Discount <i class="fas fa-arrow-right ms-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('script')
<script>
     var myModal = new bootstrap.Modal(document.getElementById('expiredModal'), {
         keyboard: false
     });
     myModal.toggle();
</script>
@endpush
@endif

{{ session()->put('promo4','ok')}}
