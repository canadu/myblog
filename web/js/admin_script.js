let header = document.querySelector('.header');

const menu_btn = document.querySelector('#menu-btn')
if (menu_btn) {
    menu_btn.addEventListener('click', () => {
        header.classList.toggle('active');
    })
}

window.onscroll = () => {
    if (header != null) {
        if (header.classList.contains('active')) {
            header.classList.remove('active');
        }
    }
}

document.querySelectorAll('.posts-content').forEach(content => {
    if (content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 100);
});

// カスタムファイル ファイル選択時にファイル名を表示する
$('.custom-file-input').on('change', function () {
    $(this).next('.custom-file-label').html($(this)[0].files[0].name);
})
//ファイルの取消
$('.reset').click(function () {
    $(this).parent().prev().children('.custom-file-label').html('画像ファイルを選択...');
    $('.custom-file-input').val('');
})
