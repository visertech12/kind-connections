
    <div class="viser-meeting-widget">
        <button class="viser-close-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6L6.00081 17.9992M17.9992 18L6 6.00085" />
            </svg>
        </button>

        @php
            $images = ['s01.png', 's02.png', 's03.png', 's04.png'];
            $currentMinute = (int) date('i');
            $index = floor($currentMinute / 15);
            $index = min($index, count($images) - 1);
            $currentImage = $images[$index];
        @endphp

        <a href="{{ route('book.meeting') }}" aria-label="Book a Meeting">
            <img src="{{ asset('assets/images/meeting/' . $currentImage) }}" alt="Book a Meeting" loading="lazy" width="200" height="200">
        </a>
    </div>


    @push('script')
        <script>
            $('.viser-close-btn').on('click', function() {
                const $widget = $(this).closest('.viser-meeting-widget');
                $widget.addClass('is-closing');
                setTimeout(() => {
                    $widget.remove();
                }, 500);
            });
        </script>
    @endpush
