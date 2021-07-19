@extends('layout.main')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <div class="mb-7 text-center text-3xl uppercase">
            contact us
        </div>
        <form id="contact-form" action="{{ route('contact') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" maxlength="50"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500  @enderror" value="{{ old('name') }}">

                <div id="nameError" class="text-red-600 mt-1 mb-2 text-sm">
                @error('name')
                    {{ $message }}
                @enderror
                </div>

            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Name</label>
                <input type="email" name="email" id="email" placeholder="Your email" maxlength="50"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('email') border-red-500  @enderror" value="{{ old('email') }}">
            </div>
            <div id="emailError" class="text-red-600 mt-1 mb-2 text-sm">
            @error('email')
                {{ $message }}
            @enderror
            </div>


            <div class="mb-4">
                <label for="phone" class="sr-only">Name</label>
                <input type="phone" name="phone" id="phone" placeholder="Your phone"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500  @enderror" value="{{ old('phone') }}">
            </div>

            <div id="phoneError" class="text-red-600 mt-1 mb-2 text-sm">
            @error('phone')
                {{ $message }}
            @enderror
            </div>


            <div class="mb-4">
                <label for="message" class="sr-only">Name</label>
                <textarea  name="message" id="message" placeholder="Your message"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('message') border-red-500  @enderror" rows="8">{{ old('message') }}</textarea>
            </div>

            <div id="messageError" class="text-red-600 mt-1 mb-2 text-sm">
            @error('message')
                {{ $message }}
            @enderror
            </div>
            <div id="form-text" class="bg-green-700 mb-3 text-white p-1 text-center rounded hidden"></div>

            <div>
                <button type="submit" id="contact-submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full relative hover:bg-green-700     ">
                    <svg id="button-loader" class="invisible animate-spin -ml-1 mr-3 h-5 w-5 text-white absolute mx-auto  left-1/2 h-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                    <span id="text-button" >Submit</span>
                </button>
            </div>

        </form>
    </div>
</div>

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

</script>

@endsection
