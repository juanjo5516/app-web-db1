<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Crud</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default navbar-ststic-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{route('comandos.index')}}">CodELog</a>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      {{-- ajax Form Add Post--}}
      $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Post');
      });
      $("#add").click(function() {
        $.ajax({
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type: 'POST',
          dataType: 'json',
          url: 'http://localhost/addComando',
          data: {
            'comando': $('#comando').val(),
            'descripcion': $('#descripcion').val(),
            'lenguaje_id': $('#lenguaje_id').val()
          },
          success: function(data){
            if ((data.errors)) {
              $('.error').removeClass('hidden');
              $('.error').text(data.errors.comando);
              $('.error').text(data.errors.descripcion);
            } else {
              $('.error').remove();
              $('#table').append("<tr id='" + data.id + "'>"+
                "<td>" + data.id + "</td>"+
                "<td>" + data.comando + "</td>"+
                "<td>" + data.descripcion + "</td>"+
                "<td>" + data.lenguaje_id + "</td>"+
                "<td>" +
                "<button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-comando='" + data.comando + "' data-descripcion='" + data.descripcion + "' data-lenguaje_id='" + data.lenguaje_id + "'><span class='fa fa-eye'></span></button>"+
                " <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-comando='" + data.comando + "' data-descripcion='" + data.descripcion + "' data-lenguaje_id='" + data.lenguaje_id + "'><span class='glyphicon glyphicon-pencil'></span></button>" + 
                " <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-comando='" + data.comando + "' data-descripcion='" + data.descripcion + "' data-lenguaje_id='" + data.lenguaje_id + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                "</tr>");
            }
          },
        });
        $('#form-create')[0].reset();

      });

// function Edit POST
$(document).on('click', '.edit-modal', function() {
  $('#footer_action_button').text(" Update Post");
  $('#footer_action_button').addClass('glyphicon-check');
  $('#footer_action_button').removeClass('glyphicon-trash');
  $('.actionBtn').addClass('btn-success');
  $('.actionBtn').removeClass('btn-danger');
  $('.actionBtn').addClass('edit');
  $('.modal-title').text('Post Edit');
  $('.deleteContent').hide();
  $('.form-horizontal').show();
  $('#id-edit').val($(this).data('id'));
  $('#comando-edit').val($(this).data('comando'));
  $('#descripcion-edit').val($(this).data('descripcion'));
  $('#lenguaje_id-edit').val($(this).data('lenguaje_id'));
  $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: 'POST',
    dataType: 'json',
    url: 'http://localhost/editComando',
    data: {
      'id': $("#id-edit").val(),
      'comando': $('#comando-edit').val(),
      'descripcion': $('#descripcion-edit').val(),
      'lenguaje_id': $('#lenguaje_id-edit').val(),
    },
    success: function(data) {
      $('#' + data.id).replaceWith(" "+
        "<tr id='" + data.id + "'>"+
        "<td>" + data.id + "</td>"+
        "<td>" + data.comando + "</td>"+
        "<td>" + data.descripcion + "</td>"+
        "<td>" + data.lenguaje_id + "</td>"+
        "<td>"+
        "<button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-comando='" + data.comando + "' data-descripcion='" + data.descripcion + "' data-lenguaje_id='" + data.lenguaje_id + "'><span class='fa fa-eye'></span></button>"+
        " <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-comando='" + data.comando + "' data-descripcion='" + data.descripcion + "' data-lenguaje_id='" + data.lenguaje_id + "'><span class='glyphicon glyphicon-pencil'></span></button>"+
        " <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-comando='" + data.comando + "' data-descripcion='" + data.descripcion + "' data-lenguaje_id='" + data.lenguaje_id + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
        "</tr>");
    }
  });
});

// form Delete function
$(document).on('click', '.delete-modal', function() {
  $('#footer_action_button').text(" Delete");
  $('#footer_action_button').removeClass('glyphicon-check');
  $('#footer_action_button').addClass('glyphicon-trash');
  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Delete Post');
  $('#id-edit').val($(this).data('id'));
  $('.deleteContent').show();
  //$('.form-horizontal').hide();
  $('.id').html($(this).data('id'));
  $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: 'POST',
    dataType: 'json',
    url: 'http://localhost/deleteComando',
    data: {
      'id': $('#id-edit').val()
    },
    success: function(data){
      alert(data.id);
     $('#' + data.id).hide();
   }
 });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('.id').text($(this).data('id'));
    $('.comando').text($(this).data('comando'));
    $('.descripcion').text($(this).data('descripcion'));
    $('.lenguaje_id').text($(this).data('lenguaje_id'));
    $('.modal-title').text('Mostrar comando');
  });
</script>
</body>
</html>