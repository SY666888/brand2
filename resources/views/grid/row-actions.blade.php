<div class="grid-dropdown-actions dropdown">
 @foreach($custom as $action)
   {!! $action !!}
  @endforeach
  {!! $view !!} {!! $edit !!}
         
</div>
<style>
    a {
        padding: 0 4px;
    }

    .dropdown .drop-right:before {
        left: 10.2rem;
    }
</style>
