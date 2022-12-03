@foreach($children as $subcategory)
    <ul class="list-links subcategoryTree">
        @if(count($subcategory->children))
            <li style="color: #1D00AF;font-family: 'Arial Black' ">   {{$subcategory->name}}</li>
            <ul class="list-links">
                @include('home.categorytree',['children' => $subcategory->children])
            </ul>
            <hr>
        @else
            <li><a href="{{route('category.show',['id'=>$subcategory->id])}}">{{$subcategory->name}}</a> </li>
        @endif
    </ul>
@endforeach
