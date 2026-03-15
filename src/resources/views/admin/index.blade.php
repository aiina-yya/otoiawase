extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('nav')
    <nav class="header__nav">
        @if (Auth::check())
        <form action="/logout" method="post"></form>
        <button class="header__nav-button">logout</button>
        </form>
        @endif
    </nav>
@endsection

@section('content')
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
        {{ $contact->contact_type }}
        </td>

        <td class="contact-table__item">

        <a class="detail-button" href="#modal-{{ $contact->id }}">
        詳細
        </a>
        </td>
    </tr>

<div id="modal-{{ $contact->id }}" class="modal">
    <div class="modal__content">
        <a href="#" class="modal__close"></a>
        < class="modal-table">
            <tr>
                <th>名前</th>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}
                    </td>
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
                <th>お問い合わせ内容</th>
                    <td>{{ $contact->message }}</td>
            </tr>

    <form class="modal-delete-form" action="{{ route('admin.destroy',$contact->id) }}" method="POST">
    @csrf
    @method('DELETE')
        <button class="delete-button" type="submit">削除</button>
    </form>

    </div>
</div>
@endforeach

@endsection
