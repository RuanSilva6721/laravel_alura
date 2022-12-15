@component('mail::message')
  # uma nova serie foi criada

  # {{ $nomeSerie }} criada

  A série {{ $nome }}

  Acesse aqui:
  @component('mail::button', ['url' => route('series.index')])
  ver Série
  @endcomponent
@endcomponent

