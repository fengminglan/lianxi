
<div class="form-group row">
    <label for="AppId" class="col-md-4 col-form-label text-md-right">{{ __('AppId') }}</label>

    <div class="col-md-6">
        <input id="AppId" type="AppId" class="form-control @error('AppId') is-invalid @enderror" name="AppId" value="{{ old('AppId') }}" required autocomplete="AppId" autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="PushKey" class="col-md-4 col-form-label text-md-right">{{ __('PushKey') }}</label>

    <div class="col-md-6">
        <input id="PushKey" type="PushKey" class="form-control @error('PushKey') is-invalid @enderror" name="PushKey" value="{{ old('PushKey') }}" required autocomplete="PushKey" autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="UrlStr" class="col-md-4 col-form-label text-md-right">{{ __('UrlStr') }}</label>

    <div class="col-md-6">
        <input id="UrlStr" type="UrlStr" class="form-control @error('UrlStr') is-invalid @enderror" name="UrlStr" value="{{ old('UrlStr') }}" required autocomplete="UrlStr" autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="UpdateUrl" class="col-md-4 col-form-label text-md-right">{{ __('UpdateUrl') }}</label>

    <div class="col-md-6">
        <input id="UpdateUrl" type="UpdateUrl" class="form-control @error('UpdateUrl') is-invalid @enderror" name="UpdateUrl" value="{{ old('UpdateUrl') }}" required autocomplete="UpdateUrl" autofocus>
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button name="add" class="btn btn-primary">
            {{ __('添加') }}
        </button>

        <button name="update" class="btn btn-primary">
            {{ __('修改') }}
        </button>
    </div>
</div>

