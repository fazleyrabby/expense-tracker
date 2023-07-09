
@if(session()->get('success') || session()->get('error'))

<div class="@if(session()->has('success')) bg-green-400 @endif @if(session()->has('ergit adror')) bg-red-500 text-white @endif  text-sm p-4 mb-2 border rounded-lg">
    {{ session()->get('success') ?? session()->get('error') }}
</div>

@endif