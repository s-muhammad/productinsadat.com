@foreach($categories as $cat)
    <li class="list-item-children">
        <a href="{{route('product.category',$cat->id)}}" class="list-item-children-category">
            <img src="{{$cat->image}}">
            {{$cat->name}}
        </a>
        <ul class="megamenu-level-3" {{ $loop->first ? 'style=display:block' : '' }}>
{{--            <a href="#" class="list-category-megamenu">همه دسته بندی های فرش و تابلو فرش</a>--}}
            @if($cat->child)
                @foreach($cat->child as $child)
                <div class="level-three-menu">
                    <a class="mega-menu-sublist-title" href="{{route('product.category',$child->id)}}">{{$child->name}}
                        <i class="fa fa-angle-left"></i>
                    </a>
                    @if($child->child)
                    @foreach($child->child as $ch)
                    <li class="megamenu-list-item">
                        <a href="{{route('product.category',$ch->id)}}" class="megamenu-category">{{$ch->name}}</a>
                    </li>
                    @endforeach
                    @endif
                </div>
                @endforeach
            @endif
            <div class="images-menu-list">
                <a href="#">
                    <img src="/assets/images/menu/ryan-christodoulou-789566-unsplash.jpg">
                    <div class="box-shadow"></div>
                </a>
            </div>
        </ul>
    </li>
@endforeach
