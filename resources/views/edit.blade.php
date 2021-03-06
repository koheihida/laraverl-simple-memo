@extends('layouts.app')
@section('javascript')
<script src="/js/confirm.js"></script>
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        メモ編集
        <form  id="delete-form" action="{{route('destroy')}}" method="POST">
            @csrf
            <i class="far fa-trash-alt mr-5" onclick="deleteHandle(event);"></i>
            <input type='hidden' name='memo_id' value='{{$edit_memo[0]["id"]}}' />
        </form>
    </div>
    <form class="card-body  my-card-body" action="{{route('update')}}" method="POST">
        @csrf
        <input type='hidden' name='memo_id' value='{{ $edit_memo[0]["id"] }}' />
        <div class="form-floating">
            <textarea class="form-control" placeholder="ここにメモを入力" rows="3" name="content" style="height: 100px">{{$edit_memo[0]['content']}}</textarea>
        </div>
        @error('content')
            <div class='alert alert-danger'>no content error!!</div>
        @enderror
        @foreach($tags as $t)
        <div class="form-check form-check-inline mb-3">
          <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id'] }}" value="{{ $t['id'] }}" {{ in_array($t['id'], $include_tags) ? 'checked' : '' }}>
          <label class="form-check-label" for="{{ $t['id'] }}">{{ $t['name']}}</label>
        </div>
        @endforeach
    
        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="new tag" />
        <button type="sbumit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
