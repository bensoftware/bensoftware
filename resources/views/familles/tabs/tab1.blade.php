<div class="row">
    <div class="col-md-12">
        <form class="" action="{{ url('familles/edit') }}" method="post">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col-md-12 form-group">
                    <label for="famille">{{ trans('text.famille_name') }} <span class="required_field" data-toggle="tooltip" data-placement="right" title="{{ trans('text.champ_obligatoire') }}">*</span></label>
                    <input id="famille" name="libelle" value="{{$famille->libelle}}" class="form-control">
                </div>
                <input type="hidden" value="{{ $famille->id }}" name="id">
                <div class="col-md-12 text-right">
                    <button class="btn btn-success btn-icon-split" onclick="saveform(this)" container="tab1">
                        <span class="icon text-white-50">
                            <i class="main-icon fas fa-save"></i>
                            <span class="spinner-border spinner-border-sm" style="display:none" role="status" aria-hidden="true"></span>
                            <i class="answers-well-saved text-success fa fa-check" style="display:none" aria-hidden="true"></i>
                        </span>
                        <span class="text">{{ trans('text.enregistrer') }}</span>
                    </button>
                    <div id="form-errors" class="text-left"></div>
                </div>
            </div>
        </form>
    </div>
</div>