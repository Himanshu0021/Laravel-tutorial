<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

{{--
** @include is used to get the blade files just under views folder
** @yeild directive is used to display the content of any section.
** @section is used to define a section of content
** @extends is used to specify which layout the child view should inherit
** @stack is used to render the complete stack contents by passing the name of stack inside it
** @push and @endpush is used to push the data into the stack
--}}
    <h1>Welcome {{$name ?? "User"}}</h1>
    <h1>Hello {!!$entity_data!!}</h1>
<!--- If/else statements -->
    @if($name == "")
        {{"name is empty"}}
        @elseif($name !== "Himanshu")
        {{"name is not correct"}}
    @else
        {{"name is correct"}}
    @endif
<!--- unless statement -->
    @unless($name == "hello")
        {{"page is not hello"}}
    @endunless

<!--- isset statement -->
    @isset($name)
    <h2>Page name is set</h2>
    @endisset
<!-- for loop -->
    @for($i = 0; $i < 3; $i++)
            <h6>{{$i}}</h6>
    @endfor

<!-- while loop --->
    @php
        $j = 4;
    @endphp
    @while($j < 6)
        <p>{{$j}}</p>
        @php $j++; @endphp
    @endwhile

<!-- foreach --->
    @php $countries = ['US', 'CA', 'UK']; @endphp
    @foreach($countries as $country)
        {{$country}}
    @endforeach

<!-- break and continue -->
    {{-- this is the way to add comment in laravel --}}
    @for($k = 0; $k < 10; $k++)
        @if($k == 5)
            @continue
            @elseif($k == 7)
            @break
        @endif
        {{$k}}
    @endfor
</body>
</html>
