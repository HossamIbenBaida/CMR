// interação do botão de autoriazação do formulário

function activeBox()
{
    if ( $('.form label .box').hasClass('active') )
    {
        $('.form label .box').removeClass('active')
    }
    else
    {
        $('.form label .box').addClass('active')
    }
}

$('.form label .box').on('click', function(){
    activeBox();
})

$('.form label sup').on('click', function(){
    activeBox();
})

// interação do botão de autoriazação do formulário FIM