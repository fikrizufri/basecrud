@foreach ($menus as $menu)
        @if (count($menu->child) > 0)
            @can('view-'.$menu->slug)
            <li class="nav-item {{ request()->is($menu->url) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$menu->id}}" aria-expanded="true" aria-controls="collapse{{$menu->id}}">
                <i class="fa fa-{{ $menu->class }}"></i>
                <span>{{$menu->name}}</span>
                </a>
                <div id="collapse{{$menu->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    @can('view-'.$menu->slug)
                    <a class="collapse-item" href="{{$menu->url}}" target="{{$menu->target}}">{{$menu->name}}</a>
                    @endcan
                    @foreach ($menu->child as $children)   
                        @can('view-'.$children->slug)
                        <a class="collapse-item" href="{{$children->url}}" target="{{$children->target}}">{{$children->name}}</a>
                        @endcan
                    @endforeach
                    {{-- {{-- @endforeach --}}
                    </div>
                </div>
            </li>
            @endcan
                <!-- Divider -->
                {{-- <hr class="sidebar-divider d-none d-md-block">  --}}
        
        @elseif (count($menu->child) == 0)
            @can('view-'.$menu->slug)           
            
            <li class="nav-item {{ request()->is($menu->url) ? 'active' : '' }}">
                <a class="nav-link" href="{{url($menu->url)}}" target="{{$menu->target}}">
                <i class="{{$menu->class}}"></i>
                <span>{{$menu->name}}</span></a>
            </li>
            {{-- <hr class="sidebar-divider d-none d-md-block"> --}}
            @endcan            
        @endif
    @endforeach
