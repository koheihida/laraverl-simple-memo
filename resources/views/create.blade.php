@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header ">新規メモ作成</div>
    <form class="card-body my-card-body" action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-floating">
            <textarea class="form-control" placeholder="ここにメモを入力" name="content" style="height: 100px"></textarea>
        </div>
        @error('content')
            <div class='alert alert-danger'>no content error!!</div>
        @enderror
    @foreach($tags as $t)
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="checkbox" name="tags[]" id="{{$t['id']}}" value="{{$t['id']}}">
            <label class="form-check-label" for="{{$t['id']}}">{{$t['name']}}</label>
        </div>
    @endforeach
        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="new tag" />
        <button type="sbumit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
