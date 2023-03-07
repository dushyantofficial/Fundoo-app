<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $faqs->id }}</p>
</div>

<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    <p>{!!$faqs->question  !!}</p>
</div>


<!-- Answer Field -->
<div class="col-sm-12">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{!! $faqs->answer !!}</p>
</div>


<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $faqs->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($faqs->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($faqs->updated_at ?? ' - ')}}</p>
</div>

