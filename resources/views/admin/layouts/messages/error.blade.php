@if ($errors->any())                    
    @foreach ($errors->all() as $item)
                            
        @php
            toast("$item",'error')->autoClose(3000);
        @endphp

    @endforeach
@endif