@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ作成</div>
    <form class="card-body" action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-floating">
            <textarea class="form-control" placeholder="ここにメモを入力" name="content" style="height: 100px"></textarea>
        </div>
        <button type="sbumit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
