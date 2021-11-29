@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        メモ編集
        <form class="card-body" action="{{route('destroy')}}" method="POST">
            @csrf
            <button type="submit">削除</button>
            <input type='hidden' name='memo_id' value='{{$edit_memo[0]["id"]}}' />
        </form>
    </div>
    <form class="card-body" action="{{route('update')}}" method="POST">
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
            {{-- 3項演算子 → if文を1行で書く方法 {{ 条件 ? trueだったら : falseだったら }}--}}
            {{-- もし$include_tagsにループで回っているタグのidが含まれれば、ckeckedを書く --}}
          <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id'] }}" value="{{ $t['id'] }}" {{ in_array($t['id'], $include_tags) ? 'checked' : '' }}>
          <label class="form-check-label" for="{{ $t['id'] }}">{{ $t['name']}}</label>
        </div>
        @endforeach
    
        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="new tag" />
        <button type="sbumit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
