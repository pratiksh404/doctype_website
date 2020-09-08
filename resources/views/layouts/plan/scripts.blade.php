<script>
  $(function () {
      // Datatable Initialization
    $(".datatable").DataTable({
      "responsive": true,
      "autoWidth": true,
      "ordering": true,
      "info": true,
    });

    //Intialize Summernote Text Editor
      $('.textarea').summernote()
      
    //Initialize  Color Picker
    $('.my-colorpicker1').colorpicker();

    //Dynamic Plan Service Add
    $('#add_plan_service').click(function(){
      let html = '';
      html += '<div class="plan_service">';
      html += '<div class="row">';
      html += '<div class="col-lg-11">';
      html += '<input type="text" name="plan_services[]" class="form-control" id="plan_services" placeholder="Plan Services" value="{{$service ?? ''}}">';
      html += '</div>';
      html += '<div class="col-lg-1">';
      html += '<button type="button" id="delete_plan_service" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
      html += '</div>';
      html += '</div>';
      html += '<br>';
      html += '</div>';

      $('#plan_service').append(html);
    });

    //Delete Plan Service
    $(document).on('click','#delete_plan_service',function(){
      $(this).closest('.plan_service').remove();
    });
  });
</script>