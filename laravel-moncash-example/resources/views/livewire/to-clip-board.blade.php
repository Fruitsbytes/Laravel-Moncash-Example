@if( $string )
    <span class="hover:text-red-600 relative inline-flex items-center justify-start cursor-grab">
        <span class="text-to-clipboard">{{ $string }}</span>
        <svg class="w-5 h-5 absolute -right-5 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                  d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
            </path>
        </svg>
    </span>
@else
    <span>-</span>
@endif




{{--@push('scripts')@endpush@push('scripts')@endpush--}}
