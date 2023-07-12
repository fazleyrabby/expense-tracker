@if (session()->get('success') || session()->get('error'))
    <div
        class="@if (session()->has('success')) bg-green-400 @endif @if (session()->has('error')) bg-red-500 text-white @endif  text-sm p-4 mb-2 border rounded-lg alert">
        {{ session()->get('success') ?? session()->get('error') }}
    </div>
@endif



@push('script')
    <script>
        window.onload = function() {
            setTimeout(function() {
                document.querySelector(".alert").style.display = "none";
            }, 3000)
        }
    </script>
@endpush
