@extends('main')

@section('title', '/ Change the order of the questions')

@section('content')
    <h1 class="title m-b-md text-center">
        Change the order of the questions
    </h1>

    <div class="row">
        {!! Helper::openForm('question.store_change_order', [$survey->uuid]) !!}
        <div class="col-xs-12">
            <table class="table table-bordered table-hover survey-change-order-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>
                        <div class="pull-right">
                            {{ Html::link('#', 'Up', ['class' => 'btn btn-default survey-change-order-move-up btn-xs']) }}
                            {{ Html::link('#', 'Down', ['class' => 'btn btn-default survey-change-order-move-down btn-xs']) }}
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $index => $question)
                    <tr>
                        <td>{{ $question->order }}</td>
                        <td>
                            {{ $question->description }}
                            {{ Form::hidden('questions[][id]', $question->id) }}
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        {{ Form::submit('Update', ['class' => 'btn-block btn btn-success']) }}
                    </div>
                    <div class="col-xs-6">
                        {{ Html::linkRoute('survey.edit', 'Back', [$survey->uuid], ['class' => 'btn-block btn btn-default']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Helper::closeForm() !!}
    </div>

    <script type="text/javascript" src="{{ Helper::route('manage-survey') }}"></script>
@endsection
