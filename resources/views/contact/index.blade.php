@extends('layout.main')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <div class="mb-7 text-center text-3xl uppercase">
            contact us
        </div>
        <inquiries-create></inquiries-create>

    </div>
</div>

{{-- <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script> --}}

{{--
<script>
    $(document).ready(function() {
      function resetErrors(){
          $('#nameError').text('');
          $('#emailError').text('');
          $('#phoneError').text('');
          $('#messageError').text('');
      }
      function resetForm(){
          $('#name').val('');
          $('#email').val('');
          $('#phone').val('');
          $('#message').val('');
      }

      function loader(){
         $('#button-loader').toggleClass('invisible');
         $('#text-button').toggleClass('invisible');
         $('form-text').toggleClass('hidden');

      }

      var flag = 0;

      $("#contact-submit").click(function(e){
          if(flag === 1){
              return false;
          }else{
              flag = 1;
          }

          e.preventDefault();
          loader();
          $('#form-text').addClass('hidden');

          name = $('#name').val();
          email = $('#email').val();
          phone = $('#phone').val();
          message = $('#message').val();

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name="_token"]').val(),
          }
      });

          $.ajax({
              url: "{{ route('contact') }}",
              type:"POST",
              data:{
                  name:name,
                  email:email,
                  phone:phone,
                  message:message,
              },
              success:function(response) {
                  // alert(response.success);
                  resetErrors();
                  resetForm();
                  loader();
                  $('#form-text').removeClass('hidden');
                  $('#form-text').text(response.success);
                  flag = 0;
              },
              error:function (response) {
                  resetErrors();
                  loader();
                  $('#nameError').text(response.responseJSON.errors.name);
                  $('#emailError').text(response.responseJSON.errors.email);
                  $('#phoneError').text(response.responseJSON.errors.phone);
                  $('#messageError').text(response.responseJSON.errors.message);
                  flag = 0;
              }
          });
      });
  });

  </script> --}}

@endsection
