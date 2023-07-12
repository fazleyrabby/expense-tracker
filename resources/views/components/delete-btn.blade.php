@props(['route'])
<form method="post" action="{{$route}}"
onsubmit="return confirm('Do you really want delete?');"
>
    @method('delete')
    @csrf
    <button type="submit" class="text-gray-900 bg-white border border-red-400 font-medium rounded-lg text-sm px-3 py-2 mr-2 hover:bg-red-500 hover:text-white transition-all duration-200"
    >Delete</button>
</form>