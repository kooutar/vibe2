@if(session()->has('message'))
    <div class="bg-green-200 flex justify-center p-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif