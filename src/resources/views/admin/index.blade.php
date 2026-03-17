@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('nav')
    <nav class="header__nav">
        @if (Auth::check())
        <form class="logout_form" action="/logout" method="post">
        @csrf
        <button class="header__nav-link" type="submit">logout</button>
        </form>
        @endif
    </nav>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <form class="search-form" action="/admin" method="get">
        <div class="search-form__item">
            <input class="search-form__input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}" />

            <select class="search-form__select" name="gender">
                <option value="">性別</option>
                <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>

            <select class="search-form__select" name="category_id">

                <option value="">お問い合わせの種類</option>

                @foreach ($categories as $category)

                <option value="{{ $category->id }}">
                {{ $category->name }}
                </option>
                @endforeach
            </select>

            <input class="search-form_date" type="date" name="date" value="{{ request('date') }}">

            <div class="form-button">
                <button class="search-form_submit" type="submit">検索</button>
            </div>

            <div class="form-reset">
                <a class="form-reset_link" href="/admin">リセット</a>
            </div>
        </div>
    </form>

    <div class="pagination">
    {{ $contacts->links() }}
</div>

<table class="contact-table">

    <tr class="contact-table__header">
        <th>名前</th>
        <th>性別</th>
        <th>メール</th>
        <th>お問い合わせ種類</th>
        <th></th>
    </tr>

@foreach($contacts as $contact)

    <tr class="contact-table__row">

        <td class="contact-table__item">
        {{ $contact->last_name }} {{ $contact->first_name }}
        </td>

        <td class="contact-table__item">
        @if($contact->gender==1) 男性
        @elseif($contact->gender==2) 女性
        @else その他
        @endif
        </td>

        <td class="contact-table__item">
        {{ $contact->email }}
        </td>

        <td class="contact-table__item">
        {{ $contact->category->name }}
        </td>

        <td>
        <a class="detail-button" href="#modal-{{ $contact->id }}">
        詳細</a>
        </td>
    </tr>

<div id="modal-{{ $contact->id }}" class="modal">
    <div class="modal__content">
        <a href="#" class="modal__close">×</a>
        <table class="modal-table">
            <tr>
                <th>名前</th>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            </tr>

            <tr>
                <th>性別</th>
                <td>
                @if($contact->gender==1) 男性
                @elseif($contact->gender==2) 女性
                @else その他
                @endif
                </td>
            </tr>

            <tr>
                <th>メール</th>
                <td>{{ $contact->email }}</td>
            </tr>

            <tr>
                <th>電話番号</th>
                <td>{{ $contact->tel }}</td>
            </tr>

            <tr>
                <th>住所</th>
                <td>{{ $contact->address }}</td>
            </tr>

            <tr>
                <th>建物名</th>
                <td>{{ $contact->building }}</td>
            </tr>

            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $contact->category->name }}</td>
            </tr>

            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $contact->detail }}</td>
            </tr>

    <form class="delete-form" action="/delete" method="POST">
    @csrf
    @method('DELETE')
        <div class="delete-form__button">
            <input type="hidden" name="id" value="{{ $contact['id'] }}">
            <button class="delete-form__button-submit" type="submit">削除</button>
        </div>
    </form>
        </table>
    </div>
</div>
@endforeach
</table>

@endsection
