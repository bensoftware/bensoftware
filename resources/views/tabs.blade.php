<div class="modal-header">
    <h4 class="modal-title">{!! $modal_title !!}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <nav>
        <div class="nav nav-tabs main-tabs" id="nav-tab" role="tablist">
            @foreach($tabs as $tab_title => $tab_link)
            <a link="{{$tab_link}}" href="#tab{{$loop->iteration}}" @if($loop->first) aria-selected="true" class="nav-item nav-link active" @else class="nav-item nav-link" aria-selected="false" @endif id="link{{$loop->iteration}}" aria-controls="tab{{$loop->iteration}}" role="tab" data-toggle="tab"> {!!$tab_title!!} </a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content">
        @foreach($tabs as $tab)
        <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif" aria-labelledby="link{{$loop->iteration}}" id="tab{{$loop->iteration}}"></div>
        @endforeach
    </div>
</div>
