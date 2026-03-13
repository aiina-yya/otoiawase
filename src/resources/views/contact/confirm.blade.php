@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__input" type="text" name="name" value="{{ $contact['last_name'] }} {{$contact['first_name'] }}" readonly />
                        <!--<input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
<input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">-->
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__input" type="radio" name="gender" value="@if($contact['gender'] == 1)男性
                        @elseif($contact['gender'] == 2)女性
                        @else その他
                        @endif" readonly />
                        <!--<input type="hidden" name="gender" value="{{ $contact['gender'] }}">-->
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__input" type="tel" name="tel" value="{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}"  readonly />
                        <!--<input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
<input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
<input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">-->
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__input" type="text" name="address" value="{{ $contact['address'] }}" readonly />
                        <!--<input type="hidden" name="address" value="{{ $contact['address'] }}-->
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input  class="confirm-table__input" type="text" name="building" value="{{ $contact['building'] }}" readonly />
                        <!--<input type="hidden" name="building" value="{{$contact['building'] }}-->
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <!--{{ $contact['contact_type'] }}-->
                        <input  class="confirm-table__input" type="text" name="contact_type" value="{{ $contact['contact_type'] }}" readonly />
                        <!--<input type="hidden" name="contact_type" value="{{$contact['contact_type'] }}-->
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input  class="confirm-table__input" type="text" name="content" value="{{ $contact['content'] }}" readonly />
                        <!--<input type="hidden" name="content" value="{{$contact['content'] }}-->
                    </td>
                </tr>
            </table>
            <button class="form__button-submit" type="submit">送信</button>
            <button class="form__button-fix" type="submit">修正</button>
        </div>
    </form>
</div>
@endsection