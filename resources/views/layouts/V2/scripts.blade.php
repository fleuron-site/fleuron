<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!--<script src="{{ asset('js/V2/scripts.js')}}"></script>-->

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>

    AOS.init({

        disable: 'mobile',

        duration: 600,

        once: true,

    });

    $(document).on('click','.edit_userinfo',function(){

    $('.userinfo_table').hide();

    $('.form_userinfo').show();

    })

    $(document).on('click','.btn_skill',function(){

    $('.skill_info').hide();

    $('.form_skill').show();

    })

</script>