/*
 * Selectores
 */

$mostrar_nombre_3 = $('#mostrar_nombre_3');
$nombre_3 = $('#nombre_3');
$mostrar_apellido_3 = $('#mostrar_apellido_3');
$apellido_3 = $('#apellido_3');

$bloque_genero = $("#bloque_genero");
$bloque_estado_civil = $("#bloque_estado_civil");
$bloque_apellido_casada = $('#bloque_apellido_casada');
$bloque_colegiado = $('#bloque_colegiado');
$bloque_informacion_academica = $('#bloque_informacion_academica');
$bloque_idiomas = $('#bloque_idiomas');
$bloque_cursos = $('#bloque_cursos');
$bloque_regimen = $('#bloque_regimen');

$genero = $("#genero_id");
$estado_civil = $("#estado_civil_id");
$apellido_casada = $('#apellido_casada');
$estado_titulo = $('#estado_titulo');
$nivel_academico = $('#nivel_academico');
$si_cuenta_con_estudios = $('#si_cuenta_con_estudios');
$si_idiomas = $('#si_idiomas');
$si_cursos = $('#si_cursos');

$curso = $('#curso');
$institucion = $('#institucion');
$lugar = $('#lugar');
$fecha_curso = $('#fecha_curso');


$idioma = $('#idioma');
$modal_curso = $('#modal_curso');

/*
 *  Botones
 */

$btn_guardar_curso = $('#btn_guardar_curso');


/*
 * Tablas
 */
$tbl_idiomas = $('#tbl_idiomas');
$tbl_cursos = $('#tbl_cursos');


/*
 * Variables
 */
id_fila_cursos = 0;
id_fila_idiomas = 0;
id_fila_contactos = 0;


/*
 * Eventos
 */
$mostrar_nombre_3.click(mostrarTercerNombre);
$mostrar_apellido_3.click(mostrarTercerApellido);
$genero.change(mostrarApellidoCasada);
$estado_civil.change(mostrarApellidoCasada);

$estado_titulo.change(mostrarColegiadoActivo);
$nivel_academico.change(mostrarColegiadoActivo);
$si_cuenta_con_estudios.click(mostrarDatosAcademicos);
$si_idiomas.click(mostrarIdioma);
$si_cursos.click(mostrarCurso);
$btn_guardar_curso.click(agregarCurso);
$('#renglon').change(mostrarRenglo);

$('[data-toggle="tooltip"]').tooltip();
$('.nav-tabs > li a[title]').tooltip();


/*
 * Variables
 */

function mostrarTercerNombre() {
  $nombre_3.css('display', 'block');
}

function mostrarTercerApellido() {
  $apellido_3.css('display', 'block');
}

function mostrarApellidoCasada() {
  if ($genero.val() == 2 && $estado_civil.val() == 2) {
    $bloque_apellido_casada.css('display', 'block');
    $apellido_casada.attr('required', 'true');

  } else {
    $bloque_apellido_casada.css('display', 'none')
    $apellido_casada.removeAttr('required').val('');
  }

}

function mostrarColegiadoActivo() {
  if ($('#nivel_academico option:selected').text() == 'Licenciatura' && $('#estado_titulo option:selected').text() == 'Finalizado') {
    $bloque_colegiado.css('display', 'block');
  } else {
    $bloque_colegiado.css('display', 'none');
  }
}

function mostrarDatosAcademicos() {
  if ($si_cuenta_con_estudios.prop('checked')) {
    $bloque_informacion_academica.css('display', 'block');
  } else {
    $bloque_informacion_academica.css('display', 'none');
  }
}

function mostrarIdioma() {
  if ($('#si_idiomas').prop('checked')) {
    $bloque_idiomas.css('display', 'block');
  } else {
    $bloque_idiomas.css('display', 'none');
  }
}

function mostrarCurso() {
  if ($si_cursos.prop('checked')) {
    $bloque_cursos.css('display', 'block');
  } else {
    $bloque_cursos.css('display', 'none');
  }
}

function mostrarRenglo() {
  if ($('#renglon').val() == 29) {
    $bloque_regimen.css('display', 'block');
  } else {
    $bloque_regimen.css('display', 'none');
  }
}

function agregarCurso() {
  id_fila_cursos++;
  $tbl_cursos.append(`
          <tr id="${id_fila_cursos}">
          <td>${$curso.val()}</td>
          <td>${$institucion.val()}</td>
          <td>${$lugar.val()}</td>
          <td>${$fecha_curso.val()}</td>
          <td class="text-right"><a href="#" data-curso="${$curso.val()}" data-institucion="${$institucion.val()}" data-lugar="${$lugar.val()}" data-fechaCurso="${$fecha_curso.val()}"><i class="fa fa-edit fa-lg"></i></a> <a href="#" data-idCurso="${id_fila_cursos}"><i class="fa fa-trash fa-lg"></i></a></td>
          </tr>
          `);
  $curso.val('');
  $institucion.val('');
  $lugar.val('');
  $fecha_curso.val('');
  $modal_curso.modal('toggle');
}

function agregarIdioma(id) {
  $tbl_idiomas.append(`
          <tr id="${id}">
          <td>
          <select id="idiomas" name="idiomas[]" class="form-control">
          <option value=""></option>
          <option value="1">Español</option>
          <option value="2">Inglés</option>
          <option value="3">Frances</option>
          </select>
          </td>
          <td>
          <select id="leer" name="leer[]" class="custom-select">
          <option value=""></option>
          <option value="1">Si</option>
          <option value="2">No</option>
          </select>
          </td>
          <td>
          <select id="escribe" name="escribe[]" class="custom-select">
          <option value=""></option>
          <option value="1">Si</option>
          <option value="2">No</option>
          </select>
          </td>
          <td>
          <select id="habla" name="habla[]" class="custom-select">
          <option value=""></option>
          <option value="1">Si</option>
          <option value="2">No</option>
          </select>
          </td>
          <td class="text-right"><h3><i class="fa fa-trash" name="${id}"></i></h3></td>
          </tr>
          `);
  $('.fa.fa-trash').click(function () {
    $('#' + $(this).attr('name')).remove();
  });
}

$('.fa fa-trash').click(function () {
  $('#' + $(this).attr('name')).remove();
});